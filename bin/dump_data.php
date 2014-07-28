<?php

include(__DIR__.'/../include/model/document.php');

$req = $bdd->prepare("SELECT DISTINCT parlementaire FROM documents");
$req->execute();
$parlementaires = array();
while ($res = $req->fetch()) {
  $parlementaires[$res['parlementaire']] = 0;
}

$req = $bdd->prepare("SELECT parlementaire, data FROM tasks, documents WHERE documents.selected_task = tasks.id AND done = 1 AND type = :type");
$req->execute(array('type' => $argv[1]));
$lignes = array();
while($res = $req->fetch()) {
  $data = json_decode($res['data']);
  if (!is_array($data)) {
    continue;
  }
  $parlementaires[$res['parlementaire']] = 1;
  foreach($data as $d) {
    $l = '';
    $l .= $res['parlementaire'].";";
    foreach ($d as $f) {
      $l .= preg_replace('/néant/i', 'NÉANT', preg_replace('/;/', ',', preg_replace('/[\n\r]+/', ' ', $f))).';';
    }
    array_push($lignes, $l);
  }
}
foreach(array_keys($parlementaires) as $p) {
  if (!$parlementaires[$p]) {
    array_push($lignes, $p.";NÉANT");
  }
}

sort($lignes);
foreach($lignes as $l) {
  print "$l\n";
}