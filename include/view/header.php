<!DOCTYPE html>
<html lang="FR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Numérisons les déclarations d'intérêts des parlementaires</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/jquery.fs.zoomer.css" rel="stylesheet">
<link href="css/datepicker.css" rel="stylesheet">
<link href="data:text/css;charset=utf-8," data-href="css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet">
<style>
.declaration{background: gray; padding: 10px;}
.middlecenter {display:table-cell; vertical-align:middle !important; float:none;}
.msg {padding: 15px; text-align: center;}
.media {margin-top: 0px;}
.media img {margin-top: 5px;}
body: {padding-left: 10px; padding-right: 10px;}
#stats h3 {margin-top: 0px;}
#crowdsource {padding-top: 50px;}
.jumbotron p {font-size: 14px;}
h1 {margin-bottom: 20px;}
#crowdtable { margin-top: 22px;}
.consigne { font-size: 15px }
</style>
</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Numérisons les déclarations d'intérêts</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li<?php if($menu_home) echo ' class="active" '; ?>><a href="./#crowdsource">Participer</a></li>
            <li><a href="./contributeurs.php">Les contributeurs</a></li>
            <li<?php if($menu_declaration) echo ' class="active"'; ?>><a href="http://www.hatvp.fr/consulter-les-declarations-rechercher.html">Consulter les déclarations</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#signin" data-toggle="modal" data-target="#signin"><span class="glyphicon glyphicon-user"></span> S'enregistrer</a></li>
          </ul>
        </div>
      </div>
    </div>
