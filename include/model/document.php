<?php

require_once(__DIR__.'/../db.php');

$noms = array("Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député");
$images = array("img/eckert-christian-di-gouvernement-mask-0_1.jpg","img/eckert-christian-di-gouvernement-mask-1_1.jpg","img/eckert-christian-di-gouvernement-mask-1_2.jpg","img/eckert-christian-di-gouvernement-mask-2_1.jpg","img/eckert-christian-di-gouvernement-mask-2_2.jpg","img/eckert-christian-di-gouvernement-mask-3_1.jpg","img/eckert-christian-di-gouvernement-mask-3_2.jpg","img/eckert-christian-di-gouvernement-mask-4_1.jpg","img/eckert-christian-di-gouvernement-mask-4_2.jpg","img/eckert-christian-di-gouvernement-mask-5_1.jpg","img/eckert-christian-di-gouvernement-mask-5_2.jpg","img/DIA_janvier_2014-mask-1_1.jpg","img/DIA_janvier_2014-mask-1_2.jpg","img/DIA_janvier_2014-mask-1_3.jpg","img/DIA_janvier_2014-mask-2_1.jpg","img/DIA_janvier_2014-mask-2_2.jpg","img/DIA_janvier_2014-mask-3_1.jpg","img/DIA_janvier_2014-mask-3_2.jpg","img/DIA_janvier_2014-mask-3_3.jpg","img/DIA_janvier_2014-mask-4_1.jpg","img/DIA_janvier_2014-mask-4_2.jpg","img/DIA_janvier_2014-mask-4_3.jpg","img/DIA_janvier_2014-mask-5_1.jpg");
$forms = array("form0.php","form1.php","form2.php","form3.php","form4.php","form5.php","form6.php","form7.php","form8.php","form9.php","form12.php","form1.php","form2.php","form3.php","form4.php","form5.php","form6.php","form7.php","form8.php","form9.php","form10.php","form11.php","form12.php");

$sections = array("informations générales", "renseignements personnels", "activités professionnelles présentes", "activités professionnelles passées", "activités de consultant", "participations à des organes dirigeants", "participations financières", "activités du conjoint", "fonctions bénévoles", "fonctions et mandats électifs", "collaborateurs", "activités conservées", "observations");

function get_rand_document() {
  global $bdd;
  if (!$bdd) {
    $id = rand(0, 22);
    return get_document_from_id($id);
  }
  $req = $bdd->prepare("SELECT parlementaire, type, img, parlementaire_avatarurl, id, ips, tries FROM documents WHERE enabled = 1 AND done = 0 AND ips NOT LIKE :ip ORDER BY rand() LIMIT 1 ");
  $req->execute(array('ip' => '%,'.$_SERVER['REMOTE_ADDR'].',%'));
  return get_document_from_req($req);
}

function get_document_from_id($id) {
  global $bdd;
  if (!$bdd) {
    return array();
  }
  $req = $bdd->prepare("SELECT parlementaire, type, img, parlementaire_avatarurl, id, ips, tries FROM documents WHERE id = :id");
  $req->execute(array('id' => $id));
  return get_document_from_req($req);
}

function get_document_from_req($req) {
  global $sections;
  $data = $req->fetch();
  $doc['nom'] = $data['parlementaire'];
  $doc['section'] = $sections[$data['type']];
  $doc['img'] = $data['img'];
  $doc['form'] = 'form'.$data['type'].'.php';
  $doc['avatar'] = $data['parlementaire_avatarurl'];
  $doc['partie'] = $data['type'] + 1;
  $doc['id'] = $data['id'];
  $doc['ips'] = $data['ips'];
  $doc['tries'] = $data['tries'];
  return $doc;
}

function get_document_from_name_and_formid($name, $id) {
  global $bdd;
  if (!$bdd) {
    return get_document_from_staticid($id);
  }
  $req = $bdd->prepare("SELECT parlementaire, type, img, parlementaire_avatarurl, id, ips, tries FROM documents WHERE parlementaire = :parlementaire AND type = :type");
  $req->execute(array('parlementaire' => $name, 'type' => $id));
  return get_document_from_req($req);
}

function get_document_from_staticid($id) {
  global $noms, $sections, $images, $forms;
  $doc = array();
  $doc['nom'] = $noms[$id];
  $doc['section'] = $sections[$id];
  $doc['img'] = $images[$id];
  $doc['form'] = $forms[$id];
  $doc['avatar'] = ($doc['nom'] == "Christian Eckert") ? "http://www.nosdeputes.fr/depute/photo/christian-eckert/80" : "http://www.nosdeputes.fr/depute/photo/catherine-pen/80";
  $doc['id'] = $id;
  $doc['partie'] = $id + 1;
  return $doc;
}

function get_pc_done() {
  global $bdd;
  if (!$bdd) {
    return 0;
  }

  $total = get_nb_documents();

  $req = $bdd->prepare("SELECT count(*) as ok FROM tasks");
  $req->execute();
  $data = $req->fetch();
  $done = $data['ok'] / 4;
  
  return $done * 100 / $total;
}

function get_nb_documents() {
  global $bdd;
  if (!$bdd) {
    return 0;
  }

  $req = $bdd->prepare("SELECT count(*) as total FROM documents");
  $req->execute();
  $data = $req->fetch();
  return $data['total'];
}