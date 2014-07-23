<?php
include(__DIR__.'/../model/document.php');
include(__DIR__.'/../model/user.php');

if ($_POST['token'] != $_SESSION['token'] || !$bdd) {
  $_SESSION['sent_ok'] = true;
  $_SESSION['token'] = null;
  header("Location: ./#crowdsource\n");
  exit;
}
$data = array();
$champ = $_POST['champ'];
for($x = 0 ; $x < 100 ; $x++) {
  $subdata = array();
  for($y = 0 ; $y < 100 ; $y++) {
    if (!isset($champ[$x.','.$y]))
      break;
    array_push($subdata, $champ[$x.','.$y]);
  }
  if (count($subdata)) {
    array_push($data, $subdata) ;
  }
  if (!$y) break;
}
$json = json_encode($data);


retrieve_user_or_create_it();
$req = $bdd->prepare('INSERT INTO tasks (ip, userid, document_id, data, created_at) VALUES (:ip, :user_id, :document_id, :json, NOW());');
$req->execute(array('ip' => $_SERVER['REMOTE_ADDR'], 'user_id' => $_SESSION['user_id'], 'document_id' => $_SESSION['document_id'], 'json' => $json));
$doc = get_document_from_id($_SESSION['document_id']);
$req = $bdd->prepare('UPDATE documents SET ips = :ips, tries = :tries WHERE id = :document_id');
$req->execute(array('ips' => $doc['ips'].','.$_SERVER['REMOTE_ADDR'].',', 'tries' => $doc['tries'] + 1, 'document_id' => $_SESSION['document_id']));

$_SESSION['sent_ok'] = true;
$_SESSION['token'] = null;
$_SESSION['document_id'] = null;

header("Location: ./#crowdsource\n");
exit;
