<?php

$bdd = null;
if (file_exists(__DIR__.'/config.php')) {
    include(__DIR__."/config.php");
    try { $bdd = new PDO('mysql:host=localhost;dbname='.$DBNAME, $DBUSER, $DBPASS);
      $bdd->exec('SET NAMES utf8');
    }
    catch (Exception $error) { die('Erreur : '.$error->getMessage()); }
}
session_start();
if (isset($_COOKIE['crowdsource_user_auth'])) {
  require_once(__DIR__.'/model/user.php');
  retrieve_user_or_create_it();
}
