<?php

$bdd = null;
if (file_exists(__DIR__.'/config.php')) {
    include(__DIR__."/config.php");
    try { $bdd = new PDO('mysql:host=localhost;dbname='.$DBNAME, $DBUSER, $DBPASS);
      $bdd->exec('SET NAMES utf8');
    }
    catch (Exception $error) { die('Erreur : '.$error->getMessage()); }
}