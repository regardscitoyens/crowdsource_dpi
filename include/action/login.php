<?php

require_once(__DIR__.'/../model/user.php');

$_SESSION['nickname'] = str_replace(';', '', strip_tags($_POST['nickname']));
if (preg_match('/^@/', $_POST['twitter'])) {
  $_SESSION['twitter'] = str_replace(';', '', preg_replace('/".*/', '', strip_tags($_POST['twitter'])));
}
if (preg_match('/^http:\/\//', $_POST['website'])) {
  $_SESSION['website'] = str_replace(';', '', preg_replace('/".*/', '', strip_tags($_POST['website'])));
}

save_usersession();

header('location: ./#crowdsource');