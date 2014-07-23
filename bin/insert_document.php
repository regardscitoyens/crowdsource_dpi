<?php

include(__DIR__.'/../include/db.php');

if (count($argv) < 4) {
  print "$argv[0] <img> <type> <parlementaire name> <parl avatar url>\n";
  exit(1);
}

if (!is_numeric($argv[2])) {
  die("Second argument should be an integer (type of document != $argv[2])\n");
}

$req = $bdd->prepare("INSERT INTO documents (img, type, parlementaire, parlementaire_avatarurl) VALUES (:img, :type, :parlementaire, :parlementaire_avatarurl)");
$data = array('img' => $argv[1], 'type' => $argv[2], 'parlementaire' => $argv[3], 'parlementaire_avatarurl' => $argv[4]);
if (!$req->execute($data)) {
  print "unable to insert this tupple : \n";
  print_r($data);print_r($req->errorInfo());
  print "\n";
  exit(2);
}

