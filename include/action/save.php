<?php
include('../db.php');

session_start();

if ($_POST['token'] != $_SESSION['token']) {
  $_SESSION['sent_ok'] = false;
  $_SESSION['token'] = null;
  header("Location: ./#crowdsource\n");
  exit;
}
$_SESSION['sent_ok'] = true;
$_SESSION['token'] = null;

$data = array();
print_r($_POST);
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

header("Location: ./#crowdsource\n");
exit;
