<?php

include(__DIR__.'/../model/document.php');

$doc = get_document_from_name_and_formid($_GET['nom'], $_GET['partie']);
if (!$doc) {
  $cururl = "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];
  $baseurl = preg_replace("#/[^/]*$#", "/", $cururl);
echo $baseurl;
  header('Location: '.$baseurl, true, 301);
  die();
}
$type = $doc['type'];
$nom = $doc['nom'];
$avatar = $doc['avatar'];
$img = $doc['img'];
$section = $doc['section'];
$partie = $doc['partie'];
$source = $doc['source'];

$menu_declaration = 1;
