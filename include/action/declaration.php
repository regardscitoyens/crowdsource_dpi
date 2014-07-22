<?php

include(__DIR__.'/../model/document.php');

$doc = get_document_from_name_and_formid($_GET['name'], $_GET['partie']);
$type = $doc['type'];
$nom = $doc['nom'];
$avatar = $doc['avatar'];
$img = $doc['img'];
$section = $doc['section'];
$partie = $doc['partie'];

$menu_declaration = 1;