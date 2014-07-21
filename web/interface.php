<?php
$id = $_GET['id'];
if (!$id) $id = '0';
if ($id == 23) {header("location: interface.php?id=0\n");exit;}
$noms = array("Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Christian Eckert","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député","Un député");
$sections = array("informations générales", "renseignements personnels", "activités professionnelles présentes", "activités professionnelles passées", "activités de consultant", "participations à des organes dirigeants", "participations financières", "activités du conjoint", "fonctions bénévoles", "fonctions et mandats électifs", "observations","renseignements personnels", "activités professionnelles présentes", "activités professionnelles passées", "activités de consultant", "participations à des organes dirigeants", "participations financières", "activités du conjoint", "fonctions bénévoles", "fonctions et mandats électifs", "collaborateurs", "activités conservées", "observations");
$images = array("img/eckert-christian-di-gouvernement-mask-0_1.jpg","img/eckert-christian-di-gouvernement-mask-1_1.jpg","img/eckert-christian-di-gouvernement-mask-1_2.jpg","img/eckert-christian-di-gouvernement-mask-2_1.jpg","img/eckert-christian-di-gouvernement-mask-2_2.jpg","img/eckert-christian-di-gouvernement-mask-3_1.jpg","img/eckert-christian-di-gouvernement-mask-3_2.jpg","img/eckert-christian-di-gouvernement-mask-4_1.jpg","img/eckert-christian-di-gouvernement-mask-4_2.jpg","img/eckert-christian-di-gouvernement-mask-5_1.jpg","img/eckert-christian-di-gouvernement-mask-5_2.jpg","img/DIA_janvier_2014-mask-1_1.jpg","img/DIA_janvier_2014-mask-1_2.jpg","img/DIA_janvier_2014-mask-1_3.jpg","img/DIA_janvier_2014-mask-2_1.jpg","img/DIA_janvier_2014-mask-2_2.jpg","img/DIA_janvier_2014-mask-3_1.jpg","img/DIA_janvier_2014-mask-3_2.jpg","img/DIA_janvier_2014-mask-3_3.jpg","img/DIA_janvier_2014-mask-4_1.jpg","img/DIA_janvier_2014-mask-4_2.jpg","img/DIA_janvier_2014-mask-4_3.jpg","img/DIA_janvier_2014-mask-5_1.jpg");
$forms = array("form0.php","form1.php","form2.php","form3.php","form4.php","form5.php","form6.php","form7.php","form8.php","form9.php","form12.php","form1.php","form2.php","form3.php","form4.php","form5.php","form6.php","form7.php","form8.php","form9.php","form10.php","form11.php","form12.php");

?>
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
            <li class="active"><a href="#">Introduction</a></li>
            <li><a href="#crowdsource">Participer</a></li>
            <li><a href="#contributeurs">Les contributeurs</a></li>
            <li><a href="http://www.hatvp.fr/consulter-les-declarations-rechercher.html">Consulter les déclarations</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#signin" data-toggle="modal" data-target="#signin"><span class="glyphicon glyphicon-user"></span> S'enregistrer</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid" role="main">
      <div class="jumbotron"><div class="row">
        <div class="col-md-12"><h1 class="text-center">Numérisons les intérêts des parlementaires</h1> </div>
        <div class="col-md-8 ">
	<p>Depuis la promulgation de la loi sur la transprence de la vie publique, les parlemenaires doivent déclarer leurs intérêts à la haute autorité pour la transparence de la vie publique afin qu'elle puisse les rendre public et que chaque citoyen puisse juger sur ses représentants sont en situation ou non de conflit d'intérêts</p>
        <p>Afin de permettre au plus grand nombre de prendre connaissance de leur contenu, la loi prévoit que les déclarations d'intérêts soient mises à disposition du citoyen en Open Data. C'est pour cette raison que la Haute Autorité de transparence met à disposition des données relatives aux élus qu'elle controle.</p>
        <p>En revance, les informations contenues dans les déclarations d'intérêts ne sont pas à proprement parlé en Open Data : elles n'ont pu être publiée par la HATVP que sous la forme de PDF image qui rend l'exploitation de ces informations malaisée au vu du grand nombre de déclarations mises en ligne</p>
        <p>Afin de rendre effectif le souhait du législateur et permettre ainsi une diffusion des informations qu'elle contiennent en Open Data, Regards Citoyens invite tout à chacun à l'aider à numériser ces infomrations dont l'importance démocratique est crutiale.</p>
        <p class="text-right" style="margin-right: 50px"><a href="#crowdsource" class="btn btn-primary btn-lg" role="button">Participer à la numérisation &raquo;</a></p>
        </div>
        <div id="stats" class="col-md-4 well well-lg">
          <h3 class="text-center page-header">Statistiques</h3>
          <div class="row">
            <div class="col-xs-6">
               <div id="statpie" style="height: 200px;"></div>
            </div>
            <div class="col-xs-6">
               <h4>Top des contributeurs</h1>
               <ol>
                <li>Truc</li>
                <li>Bidule</li>
                <li>Machin</li>
                <li>Chose</li>
                <li>Muche</li>
               </ul>  
               <span><a href="#">Consulter le top 50</a></span>
              </div>
              <div class="col-xs-12 text-center"><span class="text-muted text-center">11 000 éléments restent à numériser</span></div>
          </div>
         </div>
        </div>
      </div>
      <div id="crowdsource">
      <?php if ($id) : ?>
        <div class="alert alert-info" role="alert">N'hésitez pas à <a href="#signin" data-toggle="modal" data-target="#signin">vous enregistrer</a> pour apparaitre parmi les contributeurs de ce projet. Si vous souhaitez partager la section que vous venez de saisir, elle est <a href="#">consultable ici</a>.</div>
       <?php endif; ?>
       <div class="row">
         <div class="col-md-6">
            <div class="well">
            <div class="media">
              <img class="img-circle pull-left" src="http://www.nosdeputes.fr/depute/photo/christian-eckert/80"/>
              <a href="#" class="small pull-right"><span class="glyphicon glyphicon-share"></span> Partager cette partie de la déclaration</a>
              <div class="media-body">
            <h3 class="page-header text-muted">Déclaration de <?php echo $noms[$id]; ?></h3>
        </div>
      </div>
                <h3 class="text-center"><?php echo ucfirst($sections[$id]); ?> <small>Partie <?php echo $id; ?>/12</small></h3>
                <div class="declaration"><img width="100%" src="<?php echo $images[$id]; ?>" class="zoom"/></div>
                <p class="text-center"><a href="#"><span class="glyphicon glyphicon-link"></span> Lien permanent vers cette partie de la déclaration</a></p>
          </div>
         </div>
         <div class="numerise col-md-6">
              <h3 class="page-header text-center" style="padding-top: 20px">
              Saisie du document</small>
              </h3>
              <?php if ($id) : ?>
                <div class="alert alert-success" role="alert">
                  Votre saisie a bien été enregistrée.
                </div>
              <?php endif; ?>
              
               <form class="form-horizontal" role="form" action="interface.php#crowdsource">
                 <input type="hidden" name="id" value="<?php echo $id + 1; ?>"/>
                 <?php include("forms/".$forms[$id]); ?>
                 <div class="row">
                  <div class="col-xs-6 form-inline">
                    <div class="btn-group control"><button type="button" class="form-control btn btn-danger dropdown-toggle" data-toggle="dropdown">Signaler un problème <span class="caret"></span></button><ul class="dropdown-menu" role="menu"><li><a href="#">Formulaire vide ou à «&nbsp;néant&nbsp;» </a></li><li><a href="#">Le formulaire n'est pas lisible</a></li><li><a href="#">Le formulaire ne correspond pas à la section «&nbsp;fonctions et mandats&nbsp;» </a></li> <li><a href="#">Les informations déclarées semblent incomplêtes</a></li></ul></div>
                  </div>
                  <div class="col-xs-6"><button id="validate" type="submit" class="btn btn-success pull-right"><span class="libelle">Valider le formulaire vide</span>&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></button></div>
                 </div>
                 <p class="text-muted" style="margin-top: 20px;"><small>Si vous avez le sentiment que nous avons mal détecté cette partie ou qu'il manque des informations, merci de nous l'indiquer en cliquant sur « Signaler un problème », nous vous proposerons la section d'une autre déclaration à saisir.</small></p>
               </form>
         </div>
       </div>
      <p>Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
      <div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="signinLabel" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
            <h4 class="modal-title" id="signinLabel">S'enregistrer</h4>
          </div>
          <form class="form-horizontal" role="form">
          <div class="modal-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-5 control-label">Nom/Pseudo</label>
              <div class="col-sm-7">
                <input type="email" class="form-control" id="pseudo" placeholder="Mon pseudo">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-5 control-label">Utilisateur Twitter/Identica</label>
              <div class="col-sm-7">
                 <input type="text" class="form-control" id="twitter" placeholder="@utilisateur">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-4 col-sm-8">
                <div class="checkbox">
                  <label><input type="checkbox" checked> Publier mon nom comme contributeur du projet</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Abandonner</button>
           <button type="button" class="btn btn-primary">Valider</button>
          </form>
         </div>
        </div>
      </div>
    </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.elevatezoom.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/bootstrap-datepicker.fr.js"></script>
    <script type="text/javascript" src="js/jquery.flot.min.js"></script>
    <script type="text/javascript" src="js/jquery.flot.pie.min.js"></script>
    <script>
    $("img.zoom").elevateZoom({ zoomType: "lens", lensShape : "round", lensSize    : 300});
    $(".date").datepicker({language: 'fr', 'format': 'mm/yyyy', viewMode: "months", minViewMode: "months"});
    $(".addrow").click(function(){$("#crowdtable").append('<tr class="row">'+$("#crowdtable tr.userline").html()+'</tr>'); });
    function removerow() {$(this).parent().parent().parent().remove();updatetableevents();}
    function addrow() {
       $(this).parent().parent().parent().each(function() {
          var tr = '<tr class="row userline ">'+$(this).html()+"</tr>";
	  var id = tr.match(/\[([0-9]*),/)[1]*1+1;
	  tr = tr.replace(/\[[0-9]*,/g, '['+id+',');
	  tr = tr.replace(/n°[0-9]/g, 'n°'+(id+1));
	  $(this).after(tr);});updatetableevents();
    }
function updatesubmit() {var str = ''; $(".numerise textarea").each(function(){str += $(this).val();});$(".numerise input[type='text']").each(function(){str += $(this).val();});if(str){$("#validate span.libelle").html('Valider');}else{$("#validate span.libelle").html('Valider le formulaire vide');}}
    function updatetableevents() {
  	  updatesubmit();
       $("#crowdtable tr:last td.buttons").html('<span class="add"><button class="form-control btn-primary" ><span class="glyphicon glyphicon-plus"></span></button></span>');
       $("#crowdtable tr:not(:last) td.buttons").html('<span class="remove"><button class="form-control btn-danger"><span class="glyphicon glyphicon-remove"></span></button></span>');
       var trid = 0;
       $("#crowdtable tr:not(:first)").each(function(){$(this).find("textarea").each(function(){$(this).attr('id', $(this).attr('id').replace(/\[[0-9]*\,/, '['+trid+','));$(this).attr('placeholder', $(this).attr('placeholder').replace(/n°[0-9]*/, 'n°'+(trid+1)));}); trid++;});
       $(".remove button").click(removerow);
       $(".add button").click(addrow);
       $(".numerise textarea").change(updatesubmit);
       $(".numerise input[type='text']").change(updatesubmit);
    }
    updatetableevents();
data = [ { label: "Fait",  data: 75, color: '#5CB85C'}, { label: "A faire",  data: 25, color: '#FFF'} ];
$.plot("#statpie", data , {series: { pie: { show: true,  label: { radius: 0.33, threshold: 0.1, show: true, formatter: function(data, serie){ return serie.label+'<br/>'+Math.round(10*serie.percent)/10+'%';}}}},legend:{show: false}, grid:{hoverable: true}});
    </script>
  </body>
</html>
