<?php

include(__DIR__.'/../include/model/user.php');

$req = $bdd->prepare('SELECT id, nickname, twitter FROM users WHERE twitter <> "" ORDER BY nickname, twitter');
$req->execute();
$lastnick = '';
$lasttwit = '';
$lastusid = '';
while($doc = $req->fetch()) {
  $nick = strtolower($doc['nickname']);
  $twit = strtolower($doc['twitter']);
  $usid = $doc['id'];
  if ($lastusid != '' && $lastnick == $nick && $lasttwit == $twit) {
    $req2 = $bdd->prepare("SELECT count(*) AS total FROM tasks WHERE userid = :lastid");
    $req2->execute(array('lastid' => $lastusid));
    $contribs = $req2->fetch();
    $req3 = $bdd->prepare("UPDATE tasks SET userid = :id WHERE userid = :lastid");
    $req3->execute(array('id' => $usid, 'lastid' => $lastusid));
    echo $contribs['total']." contributions reattached to $nick $twit\n";
  }

  $lastnick = $nick;
  $lasttwit = $twit;
  $lastusid = $usid;
}
