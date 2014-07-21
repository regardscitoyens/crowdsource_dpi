<?php


if (file_exists('config.php')) {
    include("config.php");

    try { $bdd = new PDO('mysql:host=localhost;dbname='.$DBNAME, $DBUSER, $DBPASS);
      $bdd->exec('SET NAMES utf8');
    }
    catch (Exception $error) { die('Erreur : '.$error->getMessage()); }
}