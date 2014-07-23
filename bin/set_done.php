<?php

include(__DIR__.'/../include/model/document.php');

function simplifystring($str) {
  return preg_replace('/\\\[nr]/', '', preg_replace('/[ ,\.]/', '', strtolower($str)));
}


$req = $bdd->prepare("SELECT id FROM documents WHERE done = 0 AND tries > 2");
$req->execute();
while($doc = $req->fetch()) {
  $req2 = $bdd->prepare("SELECT data FROM tasks WHERE document_id = :id");
  $req2->execute(array('id' => $doc['id']));
  $data = array();
  while($task = $req2->fetch()) {
    array_push($data, $task['data']);
  }
  $eguals = 0;
  $done = 0;
  for($i = 0 ; $i < count($data) ; $i++) {
    for($y = $i + 1 ; $y < count($data); $y++) {
      if (simplifystring($data[$i]) == simplifystring($data[$y])) {
	$eguals++;
      }
      if ($eguals > 2) {
	$done = 1;
	break 2;
      }
    }
  }
  if ($done) {
    $req3 = $bdd->prepare("UPDATE documents SET done = 1 WHERE id = :id");
    $req3->execute(array('id' => $doc['id']));
  }
}