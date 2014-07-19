<?php
$id = $_GET['id'];
if (!$id) $id = '0';
if ($id == 11) {header("location: interface.php?id=0\n");exit;}
$nom = "Chritian Eckert";
$sections = array("informations générales", "renseignements personnels", "activités professionnelles présentes", "activités professionnelles passées", "activités de consultant", "participations à des organes dirigeants", "participations financières", "activités du conjoint", "fonctions bénévoles", "fonctions et mandats électifs", "observations");
$images = array("img/eckert-christian-di-gouvernement-mask-0_1.jpg","img/eckert-christian-di-gouvernement-mask-1_1.jpg","img/eckert-christian-di-gouvernement-mask-1_2.jpg","img/eckert-christian-di-gouvernement-mask-2_1.jpg","img/eckert-christian-di-gouvernement-mask-2_2.jpg","img/eckert-christian-di-gouvernement-mask-3_1.jpg","img/eckert-christian-di-gouvernement-mask-3_2.jpg","img/eckert-christian-di-gouvernement-mask-4_1.jpg","img/eckert-christian-di-gouvernement-mask-4_2.jpg","img/eckert-christian-di-gouvernement-mask-5_1.jpg","img/eckert-christian-di-gouvernement-mask-5_2.jpg");

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
.msg {padding: 15px; text-align: center; margin-bottom: 15px; }
body: {padding-left: 10px; padding-right: 10px;}
#stats h3 {margin-top: 0px;}
.jumbotron p {font-size: 14px;}
h1 {margin-top: 0px; margin-bottom: 20px;}
</style>
</head>
<body>
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
          <h3 class="text-center page-header">Stastiques</h3>
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
        <div class="row">
          <div class="msg bg-info col-md-10 col-md-offset-1">
            <p>N'hésitez pas à <a href="#signin">vous enregistrer</a> pour apparaitre parmi les contributeurs de ce projet. Si vous souhaitez partager la section que vous venez de saisir, elle est <a href="#">consultable ici</a>.</p>
          </div>
        </div>
      <?php endif; ?>
      <div class="media">
        <img class="img-circle pull-left" src="http://www.nosdeputes.fr/depute/photo/christian-eckert/160"/>
        <div class="media-body">
	  <h2 class="page-header">Déclaration de <?php echo $nom; ?> : <?php echo $sections[$id]; ?></h2>
	  <p><a href="#"><span class="glyphicon glyphicon-share"></span> Partager cette partie de la déclaration</a></p>
	  <p>Dans la partie gauche de l'écran ci-dessous, la section «&nbsp;<?php echo $sections[$id]; ?>&nbsp;» de <?php echo $nom; ?> est reproduite. Nous vous invitons à la saisir en suivant les instructions proposées dans la partie droite de l'application. Si vous avez le sentiment que nous avons mal détecté cette partie ou qu'il manque des informations, merci de nous l'indiquer en cliquant sur « Signaler un problème », nous vous proposerons la section d'une autre déclaration à saisir.</p>
        </div>
      </div>
      <div class="well">
       <div class="row">
       <div class="col-md-6">
        <div class="declaration"><img width="100%" src="<?php echo $images[$id]; ?>" class="zoom"/></div>
        <p class="text-center"><a href="#"><span class="glyphicon glyphicon-link"></span> Lien permanent vers cette partie de la déclaration</a></p>
       </div>
       <div class="numerise col-md-6">
         <?php if ($id) : ?>
           <div class="row">
             <div class="msg bg-success col-md-10 col-md-offset-1">
               <p>Votre saisie a bien été enregistrée.</p>
             </div>
           </div>
         <?php endif; ?>
         <form class="form-horizontal" role="form" action="interface.php#crowdsource">
           <input type="hidden" name="id" value="<?php echo $id + 1; ?>"/>
           <?php include("forms/form".$id.".php"); ?>
           <div class="row">
            <div class="col-xs-6 form-inline">
              <div class="btn-group control"><button type="button" class="form-control btn btn-danger dropdown-toggle" data-toggle="dropdown">Signaler un problème <span class="caret"></span></button><ul class="dropdown-menu" role="menu"><li><a href="#">Formulaire vide ou à «&nbsp;néant&nbsp;» </a></li><li><a href="#">Le formulaire n'est pas lisible</a></li><li><a href="#">Le formulaire ne correspond pas à la section «&nbsp;fonctions et mandats&nbsp;» </a></li> <li><a href="#">Les informations déclarées semblent incomplêtes</a></li></ul></div>
            </div>
            <div class="col-xs-offset-3 col-xs-3"><input id="validate" type="submit" class="form-control btn btn-success" value="Valider le formulaire vide"/></div>
           </div>
         </form>
       </div>
       </div>
      </div>
      <p>Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
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
          var tr = '<tr class="row userline">'+$(this).html()+"</tr>";
	  var id = tr.match(/\[([0-9]*),/)[1]*1+1;
	  tr = tr.replace(/\[[0-9]*,/g, '['+id+',');
	  tr = tr.replace(/n°[0-9]/g, 'n°'+(id+1));
	  $(this).after(tr);});updatetableevents();
    }
    function updatesubmit() {var str = ''; $("textarea").each(function(){str += $(this).val();});if(str){$("#validate").val('Valider');}else{$("#validate").val('Valider le formulaire vide');}}
    function updatetableevents() {
	  updatesubmit();
       $("#crowdtable tr:last td.buttons").html('<span class="add"><button class="form-control btn-primary"><span class="glyphicon glyphicon-plus"></span></button></span>');
       $("#crowdtable tr:not(:last) td.buttons").html('<span class="remove"><button class="form-control btn-danger"><span class="glyphicon glyphicon-remove"></span></button></span>');
       var trid = 0;
       $("#crowdtable tr:not(:first)").each(function(){$(this).find("textarea").each(function(){$(this).attr('id', $(this).attr('id').replace(/\[[0-9]*\,/, '['+trid+','));$(this).attr('placeholder', $(this).attr('placeholder').replace(/n°[0-9]*/, 'n°'+(trid+1)));}); trid++;});
       $(".remove button").click(removerow);
       $(".add button").click(addrow);
       $("textarea").change(updatesubmit);
    }
    updatetableevents();
data = [ { label: "Fait",  data: 75, color: '#5CB85C'}, { label: "A faire",  data: 25, color: '#FFF'} ];
$.plot("#statpie", data , {series: { pie: { show: true,  label: { radius: 0.33, threshold: 0.1, show: true, formatter: function(data, serie){ return serie.label+'<br/>'+Math.round(10*serie.percent)/10+'%';}}}},legend:{show: false}, grid:{hoverable: true}});
    </script>
  </body>
</html>
