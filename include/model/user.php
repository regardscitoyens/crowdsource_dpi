<?php

include(__DIR__.'/../db.php');

function retrieve_user_or_create_it() {
  global $bdd;
  if (isset($_SESSION['user_id'])) {
    return $_SESSION['user_id'];
  }
  if (!$bdd) {
    return 0;
  }
  $req = $bdd->prepare("INSERT INTO user (auth) VALUES (:auth)");
  $auth = md5(rand());
  $req->execute(array('auth' => $auth));
  set_usersession_from_auth($auth);
  return $_SESSION['user_id'];
}

function set_usersession_from_auth($auth) {
  global $bdd;
  if (!$bdd) {
    return 0;
  }
  $req = $bdd->prepare("SELECT id, nickname, twitter, website FROM user WHERE auth = :auth");
  $req->execute(array('auth' => $auth));
  $data = $req->fetch();
  print_r($data);
  $_SESSION['user_id'] = $data['id'];
  $_SESSION['user_auth'] = $data['auth'];
  $_SESSION['nickname'] = $data['nickname'];
  $_SESSION['twitter'] = $data['twitter'];
  $_SESSION['website'] = $data['website'];
  return $_SESSION['user_id'];
}

function save_usersession($auth) {
  global $bdd;
  if (!$bdd) {
    return false;
  }
  $req = $bdd->prepare("UPDATE user SET nickname = :nickname, twitter = :twitter, website = :website WHERE id = :user_id");
  $data = array('user_id' => $_SESSION['user_id'], 'nickname' => $_SESSION['nickname'], 'twitter' => $_SESSION['twitter'], 'website' => $_SESSION['website']);
  $req->execute($data);
  return true;
}