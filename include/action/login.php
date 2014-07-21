<?php

include('../db.php');

session_start();
$_SESSION['nickname'] = $_POST['nickname'];
if (preg_match('/^@/', $_POST['twitter'])) {
  $_SESSION['twitter'] = $_POST['twitter'];
}
if (preg_match('/^http:\/\//', $_POST['website'])) {
  $_SESSION['website'] = $_POST['website'];
}

header('location: ./#crowdsource');