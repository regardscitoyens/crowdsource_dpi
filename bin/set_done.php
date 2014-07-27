<?php

include(__DIR__.'/../include/model/document.php');

function simplifystring($str) {
  return preg_replace('/\\'.'.00e0/', 'a', 
	preg_replace('/\\'.'.00e7/', 'c', 
	preg_replace('/\\'.'.00e[89ba]/', 'e', 
	preg_replace('/euros?/i', '€', 
	preg_replace('/\\\[nr]/', '', 
	preg_replace('/[\(\) ,\.-\/]/', '', 
		strtolower($str)))))));
}

$req = $bdd->prepare("SELECT id FROM documents WHERE done = 0 AND tries > 2");
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
  $selected = null;
  for($i = 0 ; $i < count($data) ; $i++) {
    for($y = $i + 1 ; $y < count($data); $y++) {
      if (preg_match('/"(PB #[13]|CORRECTED)"/', $data[$y]['data'])) {
	continue;
      }
      if (simplifystring($data[$i]['data']) == simplifystring($data[$y]['data'])) {
	$eguals++;
      }
      if ($eguals > 2) {
	$done = 1;
	$selected = $data[$i]['id'];
	break 2;
      }
    }
  }
  if ($done) {
    $req3 = $bdd->prepare("UPDATE documents SET done = 1, selected_task = :task_id WHERE id = :id");
    $req3->execute(array('id' => $doc['id'], 'task_id' => $selected));
  }
}
