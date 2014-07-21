<?php
include('../db.php');

session_start();

if ($_POST['token'] == $_SESSION['token']) {
  $_SESSION['sent_ok'] = true;
}
$_SESSION['token'];

header("Location: ./?ok=".$_SESSION['sent_ok']."#crowdsource\n");
exit;