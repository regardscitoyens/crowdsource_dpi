<?php

include(__DIR__.'/../include/model/document.php');

function simplifystring($str) {
  return preg_replace('/u00e0/', 'a',
	preg_replace('/u00ef/', 'i',
	preg_replace('/u00e7/', 'c',
	preg_replace('/u00f4/', 'o',
	preg_replace('/neant/', '',
	preg_replace('/u00e[89ba]/', 'e',
	preg_replace('/u20ac/i', 'euros',
	preg_replace('/euros?/i', 'euros',
	preg_replace('/\\\\/', '',
	preg_replace('/\\\[nr]/', '',
	preg_replace('/[\(\), \.\-\/:\']/', '',
		     strtolower($str))))))))))));
}
$sql = "SELECT id FROM documents WHERE done = 0 AND tries > 2";
if (isset($argv[1])) {
  $sql .= " AND id = ".$argv[1];
}
$req = $bdd->prepare($sql);
$req->execute();
while($doc = $req->fetch()) {
  $req2 = $bdd->prepare("SELECT id, data FROM tasks WHERE document_id = :id AND data != '\"PB #1\"' AND data != '\"PB #3\"' AND data != '\"CORRECTED\"'");
  $req2->execute(array('id' => $doc['id']));
  $data = array();
  while($task = $req2->fetch()) {
    array_push($data, array('data' => $task['data'], 'id' => $task['id'], 'subdata' => explode('],[', $task['data'])));
  }
  $equals = 0;
  $done = 0;
  for($i = 0 ; $i < count($data) ; $i++) {
    $selected = null;
    $select_pc = 0;
    for($y = $i + 1 ; $y < count($data); $y++) {
      if (preg_match('/"(PB #[13]|CORRECTED)"/', $data[$y]['data'])) {
	continue;
      }
      $sim = similar_text(simplifystring($data[$i]['data']), simplifystring($data[$y]['data']), $pc);
      if (isset($argv[1]) && $pc > 90) {
	print preg_replace('/\n/', '', $data[$i]['data'])." - \n".preg_replace('/\n/', '', $data[$y]['data'])."\n";
	print simplifystring($data[$i]['data'])." - \n".simplifystring($data[$y]['data'])."\n";
	print $sim." - $pc\n";
      }
      if (simplifystring($data[$i]['data']) == simplifystring($data[$y]['data'])) {
	$equals++;
	$selected = $data[$i]['id'];
      }
      if ($pc > 98) {
	$equals += 0.5;
	$select_pc = 1;
      }
      if ($equals > 2 && $selected) {
	$done = 1;
	break 2;
      }
    }
  }
  //Si pas de résultat, on découpe par ligne du tableau et qualifie les lignes une à une
  if (!$done) {
    $rows = array();
    //Le nombre de ligne est le nombre de lignes le plus populaire
    for($i = 0 ; $i < count($data) ; $i++) {
      $nb = count($data[$i]['subdata']);
      if (!isset($rows[$nb])) {
	$rows[$nb] = 1;
      }else{
	$rows[$nb]++;
      }
    }
    arsort($rows);
    $nbrows = array_shift(array_keys($rows));
    $selected_data = array();
    //Parcours chacune des lignes et conserve celles qui sont qualifiées dans selected_data;
    for($s = 0 ; $s < $nbrows ; $s++) {
      $equals = 0;
      $done = 0;
      for($i = 0 ; $i < count($data) ; $i++) {
	if (!isset($data[$i]['subdata'][$s])) {
	  continue;
	}
	$selected = null;
	$select_pc = 0;
	for($y = $i + 1 ; $y < count($data); $y++) {
	  if (!isset($data[$y]['subdata'][$s])) {
	    continue;
	  }
	  if (preg_match('/"(PB #[13]|CORRECTED)"/', $data[$y]['subdata'][$s])) {
	    continue;
	  }
	  $sim = similar_text(simplifystring($data[$i]['subdata'][$s]), simplifystring($data[$y]['subdata'][$s]), $pc);
	  if (isset($argv[1]) && $pc > 90) {
	    print preg_replace('/\n/', '', $data[$i]['subdata'][$s])." - \n".preg_replace('/\n/', '', $data[$y]['subdata'][$s])."\n";
	    print simplifystring($data[$i]['subdata'][$s])." - \n".simplifystring($data[$y]['subdata'][$s])."\n";
	    print $sim." - $pc\n";
	  }
	  if (simplifystring($data[$i]['subdata'][$s]) == simplifystring($data[$y]['subdata'][$s])) {
	    $equals++;
	    $selected = $data[$i]['subdata'][$s];
	  }
	  if ($pc > 98) {
	    $equals += 0.5;
	    $select_pc = 1;
	  }
	  if ($equals > 2 && $selected) {
	    array_push($selected_data, $selected);
	    break 2;
	  }
	}
      }
    }
    //Si on obtient bien le nombre de ligne voulu, on crée une tache virtuelle qui contiendra cet ensemble de lignes
    if ($nbrows && count($selected_data) == $nbrows) {
      $json = implode('],[', $selected_data);
      $reqv = $bdd->prepare('INSERT INTO tasks (ip, document_id, data, created_at) VALUES (:ip, :document_id, :json, NOW());');
      $reqv->execute(array('ip' => 'VIRTUAL', 'document_id' => $doc['id'], 'json' => $json));
      $reqv = $bdd->prepare('SELECT id FROM tasks WHERE ip = "VIRTUAL" AND document_id = :id');
      $reqv->execute(array('id' => $doc['id']));
      $task = $reqv->fetch();
      $selected = $task['id'];
      $done = 1;
    }
  }
  if ($done) {
    if (isset($argv[1])) echo "Done !\n";
    $req3 = $bdd->prepare("UPDATE documents SET done = 1, selected_task = :task_id WHERE id = :id");
    //    $req3->execute(array('id' => $doc['id'], 'task_id' => $selected));
  }
}
