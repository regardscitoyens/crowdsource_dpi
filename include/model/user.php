<?php

include(__DIR__.'/../db.php');

function retrieve_user_or_create_it() {
  global $bdd;
  if (isset($_SESSION['user_id'])) {
    return $_SESSION['user_id'];
  }
  if (isset($_COOKIE['crowdsource_user_auth'])) {
    return set_usersession_from_auth($_COOKIE['crowdsource_user_auth']);
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
  $req = $bdd->prepare("SELECT id, nickname, twitter, website, auth FROM user WHERE auth = :auth");
  $req->execute(array('auth' => $auth));
  return set_usersession_from_req($req);
}

function set_usersession_from_id($id) {
  global $bdd;
  if (!$bdd) {
    return 0;
  }
  $req = $bdd->prepare("SELECT id, nickname, twitter, website, auth FROM user WHERE id = :id");
  $req->execute(array('id' => $id));
  return set_usersession_from_req($req);
}

function set_usersession_from_req($req) {
  $data = $req->fetch();
  $_SESSION['user_id'] = $data['id'];
  $_SESSION['user_auth'] = $data['auth'];
  if (!isset($_SESSION['nickname']))
    $_SESSION['nickname'] = $data['nickname'];
  if (!isset($_SESSION['twitter']))
    $_SESSION['twitter'] = $data['twitter'];
  if (!isset($_SESSION['website']))
    $_SESSION['website'] = $data['website'];
  return $_SESSION['user_id'];
}

function save_usersession() {
  global $bdd;
  if (!$bdd) {
    return false;
  }
  retrieve_user_or_create_it();
  $req = $bdd->prepare("UPDATE user SET nickname = :nickname, twitter = :twitter, website = :website WHERE id = :user_id");
  $data = array('user_id' => $_SESSION['user_id'], 'nickname' => $_SESSION['nickname'], 'twitter' => $_SESSION['twitter'], 'website' => $_SESSION['website']);
  $req->execute($data);
  if (!isset($_SESSION['user_auth'])) {
    set_usersession_from_id($_SESSION['user_id']);
  }
  setcookie("crowdsource_user_auth", $_SESSION['user_auth'], strtotime( '+7 days' ));
  return true;
}