<?php

include(__DIR__.'/../model/document.php');

$doc = get_document_from_name_and_formid($_GET['name'], $_GET['id']);
$id = $doc['id'];
$nom = $doc['nom'];
$avatar = $doc['avatar'];
$img = $doc['img'];
$section = $doc['section'];
$donotshare = 1;
$menu_declaration = 1;