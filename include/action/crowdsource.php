<?php
include('../db.php');

session_start();

$id = rand(0, 22);

$noms = array("Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député");
$sections = array("informations générales", "renseignements personnels", "activités professionnelles présentes", "activités professionnelles passées", "activités de consultant", "participations à des organes dirigeants", "participations financières", "activités du conjoint", "fonctions bénévoles", "fonctions et mandats électifs", "observations","renseignements personnels", "activités professionnelles présentes", "activités professionnelles passées", "activités de consultant", "participations à des organes dirigeants", "participations financières", "activités du conjoint", "fonctions bénévoles", "fonctions et mandats électifs", "collaborateurs", "activités conservées", "observations");
$images = array("img/eckert-christian-di-gouvernement-mask-0_1.jpg","img/eckert-christian-di-gouvernement-mask-1_1.jpg","img/eckert-christian-di-gouvernement-mask-1_2.jpg","img/eckert-christian-di-gouvernement-mask-2_1.jpg","img/eckert-christian-di-gouvernement-mask-2_2.jpg","img/eckert-christian-di-gouvernement-mask-3_1.jpg","img/eckert-christian-di-gouvernement-mask-3_2.jpg","img/eckert-christian-di-gouvernement-mask-4_1.jpg","img/eckert-christian-di-gouvernement-mask-4_2.jpg","img/eckert-christian-di-gouvernement-mask-5_1.jpg","img/eckert-christian-di-gouvernement-mask-5_2.jpg","img/DIA_janvier_2014-mask-1_1.jpg","img/DIA_janvier_2014-mask-1_2.jpg","img/DIA_janvier_2014-mask-1_3.jpg","img/DIA_janvier_2014-mask-2_1.jpg","img/DIA_janvier_2014-mask-2_2.jpg","img/DIA_janvier_2014-mask-3_1.jpg","img/DIA_janvier_2014-mask-3_2.jpg","img/DIA_janvier_2014-mask-3_3.jpg","img/DIA_janvier_2014-mask-4_1.jpg","img/DIA_janvier_2014-mask-4_2.jpg","img/DIA_janvier_2014-mask-4_3.jpg","img/DIA_janvier_2014-mask-5_1.jpg");
$forms = array("form0.php","form1.php","form2.php","form3.php","form4.php","form5.php","form6.php","form7.php","form8.php","form9.php","form12.php","form1.php","form2.php","form3.php","form4.php","form5.php","form6.php","form7.php","form8.php","form9.php","form10.php","form11.php","form12.php");

$_SESSION['token'] = md5(rand());
$token = $_SESSION['token'];

$sent_ok = $_SESSION['sent_ok'];
$_SESSION['sent_ok'] = null;

$nom = $noms[$id];
$img = $images[$id];
$form = $forms[$id];
$section = $sections[$id];
$avatar = ($nom == "Christian Eckert") ? "http://www.nosdeputes.fr/depute/photo/christian-eckert/80" : "http://www.nosdeputes.fr/depute/photo/catherine-pen/80";

$nickname = $_SESSION['nickname'];
$twitter = $_SESSION['twitter'];
$website = $_SESSION['website'];

