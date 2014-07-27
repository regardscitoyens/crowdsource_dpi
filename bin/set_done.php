<?php

include(__DIR__.'/../include/model/document.php');

function simplifystring($str) {
  return preg_replace('/u00e0/', 'a',
	preg_replace('/u00ef/', 'i',
	preg_replace('/u00e7/', 'c',
	preg_replace('/u00e[89ba]/', 'e',
	preg_replace('/u20ac/i', 'euros',
	preg_replace('/euros?/i', 'euros',
	preg_replace('/\\\\/', '',
	preg_replace('/\\\[nr]/', '',
	preg_replace('/[\(\), \.\-\/:\']/', '',
		     strtolower($str))))))))));
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
    array_push($data, array('data' => $task['data'], 'id' => $task['id']));
  }
  $eguals = 0;
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
	$eguals++;
	$selected = $data[$i]['id'];
      }
      if ($pc > 98) {
	$eguals += 0.5;
	$select_pc = 1;
      }
      if ($eguals > 2 && $selected) {
	$done = 1;
	break 2;
      }
    }
  }
  if ($done) {
    $req3 = $bdd->prepare("UPDATE documents SET done = 1, selected_task = :task_id WHERE id = :id");
    $req3->execute(array('id' => $doc['id'], 'task_id' => $selected));
  }
}
