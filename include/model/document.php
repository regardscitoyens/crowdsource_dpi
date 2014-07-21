<?php

include(__DIR__.'/../db.php');

$noms = array("Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député");
$sections = array("informations générales", "renseignements personnels", "activités professionnelles présentes", "activités professionnelles passées", "activités de consultant", "participations à des organes dirigeants", "participations financières", "activités du conjoint", "fonctions bénévoles", "fonctions et mandats électifs", "observations","renseignements personnels", "activités professionnelles présentes", "activités professionnelles passées", "activités de consultant", "participations à des organes dirigeants", "participations financières", "activités du conjoint", "fonctions bénévoles", "fonctions et mandats électifs", "collaborateurs", "activités conservées", "observations");
$images = array("img/eckert-christian-di-gouvernement-mask-0_1.jpg","img/eckert-christian-di-gouvernement-mask-1_1.jpg","img/eckert-christian-di-gouvernement-mask-1_2.jpg","img/eckert-christian-di-gouvernement-mask-2_1.jpg","img/eckert-christian-di-gouvernement-mask-2_2.jpg","img/eckert-christian-di-gouvernement-mask-3_1.jpg","img/eckert-christian-di-gouvernement-mask-3_2.jpg","img/eckert-christian-di-gouvernement-mask-4_1.jpg","img/eckert-christian-di-gouvernement-mask-4_2.jpg","img/eckert-christian-di-gouvernement-mask-5_1.jpg","img/eckert-christian-di-gouvernement-mask-5_2.jpg","img/DIA_janvier_2014-mask-1_1.jpg","img/DIA_janvier_2014-mask-1_2.jpg","img/DIA_janvier_2014-mask-1_3.jpg","img/DIA_janvier_2014-mask-2_1.jpg","img/DIA_janvier_2014-mask-2_2.jpg","img/DIA_janvier_2014-mask-3_1.jpg","img/DIA_janvier_2014-mask-3_2.jpg","img/DIA_janvier_2014-mask-3_3.jpg","img/DIA_janvier_2014-mask-4_1.jpg","img/DIA_janvier_2014-mask-4_2.jpg","img/DIA_janvier_2014-mask-4_3.jpg","img/DIA_janvier_2014-mask-5_1.jpg");
$forms = array("form0.php","form1.php","form2.php","form3.php","form4.php","form5.php","form6.php","form7.php","form8.php","form9.php","form12.php","form1.php","form2.php","form3.php","form4.php","form5.php","form6.php","form7.php","form8.php","form9.php","form10.php","form11.php","form12.php");

function get_rand_document() {
  global $noms, $sections, $images, $forms;
  $doc = array();
  $id = rand(0, 22);
  $doc['nom'] = $noms[$id];
  $doc['section'] = $sections[$id];
  $doc['img'] = $images[$id];
  $doc['form'] = $forms[$id];
  $doc['avatar'] = ($nom == "Christian Eckert") ? "http://www.nosdeputes.fr/depute/photo/christian-eckert/80" : "http://www.nosdeputes.fr/depute/photo/catherine-pen/80";
  $doc['id'] = $id;
  return $doc;
}