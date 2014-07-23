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
.logo{float:right;height:50px;margin-right:6px;margin-top:2px;}
.declaration{background: gray; padding: 10px;}
.middlecenter {display:table-cell; vertical-align:middle !important; float:none;}
.msg {padding: 15px; text-align: center;}
.media {margin-top: 0px;}
.media img {margin-top: 5px;}
body: {padding-left: 10px; padding-right: 10px;}
#stats h3 {margin-top: 0px;}
#crowdsource {padding-top: 50px;}
#a-propos {padding-top: 50px; height: 600px}
#a-propos p {margin: 28px;}
.numerise .well {background-color: #fBfBdb}
.numerise .text-muted {font-size: 85%}
.jumbotron p {font-size: 14px; margin: 16px;}
.jumbotron h1 {font-size: 44px}
h1 {margin-bottom: 20px}
#crowdtable { margin-top: 22px;}
.consigne { font-size: 15px }
.page-header {margin: 8px!important}
#permalink-img, #start-num{padding-top:12px;}
</style>
</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="logo"><a target="_blank" href="http://RegardsCitoyens.org" title="Une initiative de Regards Citoyens"><img alt="Regards Citoyens" src="img/logo_regardscitoyens.png" height="50" /></a></div>
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">Numérisons les déclarations d'intérêts</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li<?php if(isset($menu_home) && $menu_home) echo ' class="active" '; ?>><a href="./#crowdsource">Participer</a></li>
            <li<?php if(!isset($menu_home) && !isset($menu_declaration)) echo ' class="active" '; ?>><a href="./contributeurs.php">Les contributeurs</a></li>
            <li<?php if(isset($menu_declaration) && $menu_declaration) echo ' class="active"'; ?>><a target="_blank" href="http://www.hatvp.fr/consulter-les-declarations-rechercher.html">Consulter les déclarations</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
   <li><a href="#signin" data-toggle="modal" data-target="#signin"><span class="glyphicon glyphicon-user"></span> <?php if (isset($_SESSION['nickname'])) {echo $_SESSION['nickname']; } else {echo "S'enregistrer"; }?></a></li>
          </ul>
        </div>
      </div>
    </div>
