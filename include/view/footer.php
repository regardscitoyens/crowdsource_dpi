      <div id="a-propos" class="col-md-12">
        <h2 class="text-center page-header">À propos</h2>
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <p>Ce site est une création de <a href="http://regardscitoyens.org" target="_blank">Regards Citoyens</a>. Il vise à assurer de manière collaborative et transparente l'accès en Open Data pour l'ensemble des citoyens aux déclarations d'intérêts des élus publiées par la Haute Autorité pour la Transparence de la Vie Publique comme le prévoit le IV à l'<a href="http://legifrance.gouv.fr/affichCodeArticle.do?cidTexte=LEGITEXT000006070239&idArticle=LEGIARTI000028059568&dateTexte=">article LO135-2 du Code électoral</a> tel que modifié par la <a href="http://www.lafabriquedelaloi.fr/articles.html?loi=pjl12-688">loi organique n° 2013-906 du 11 octobre 2013 relative à la transparence de la vie publique</a>.</p>
          <p>Les déclarations remplies par les 577 députés et 348 sénateurs comportent chacune 13 parties, soit un total de plus de 11&nbsp;000 extraits de formulaires renseignés à la main à numériser. Pour éviter d'intégrer toute erreur de saisie ou tentative de vandalisme, chaque extrait de formulaire est présenté au hasard aux utilisateurs et n'est considéré comme valablement numérisé que lorsque 4 utilisateurs différents auront saisi les mêmes informations.</p>
          <p>Le logiciel permettant de réaliser et publier cette interface est un logiciel libre diffusé sous <a href="http://www.gnu.org/licenses/agpl-3.0.html">licence Affero GPL v3</a> et dont le code source est disponible en ligne sur <a href="https://github.com/regardscitoyens/crowdsource_dpi/" target="_blank">GitHub</a>.</p>
          <p>Toutes les données collaborativement reconstruites grâce à cette interface seront publiées en Open Data sous <a href="http://wiki.data.gouv.fr/wiki/Licence_Ouverte_/_Open_Licence">Licence Ouverte</a> sur <a href="http://nosdonnees.fr">NosDonnées.fr</a> et <a href="http://data.gouv.fr">data.gouv.fr</a>.</p>
          <p>Les <a href="http://regardscitoyens.org/mentions-legales/">mentions légales</a> usuelles des sites de Regards Citoyens s'appliquent.</p>
        </div>
        <div class="col-md-3"></div>
      </div>
      <div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="signinLabel" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
            <h4 class="modal-title" id="signinLabel">S'enregistrer</h4>
          </div>
          <form class="form-horizontal" role="form" action="login.php" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="nickname" class="col-sm-5 control-label">Nom/Pseudo</label>
              <div class="col-sm-7">
                <input class="form-control" name="nickname" required='true' value="<?php if (isset($nickname))echo $nickname; ?>" placeholder="Mon pseudo">
              </div>
            </div>
            <div class="form-group">
              <label for="twitter" class="col-sm-5 control-label">Utilisateur Twitter/Identica</label>
              <div class="col-sm-7">
                 <input type="text" class="form-control" name="twitter" value="<?php if (isset($twitter)) echo $twitter; ?>" placeholder="@utilisateur">
              </div>
            </div>
            <div class="form-group">
              <label for="website" class="col-sm-5 control-label">Site web</label>
              <div class="col-sm-7">
                 <input type="text" class="form-control" name="website" value="<?php if (isset($website)) echo $website; ?>" placeholder="http://....">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <div class="checkbox">
  	          <small>En fournissant ces informations, vous acceptez qu'elles soient publiées dans la liste des contributeurs</small>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Abandonner</button>
           <input type="submit" class="btn btn-primary" value="Valider"/>
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
       $("#crowdtable tr:not(:first)").each(function(){$(this).find("textarea").each(function(){$(this).attr('name', $(this).attr('name').replace(/\[[0-9]*\,/, '['+trid+','));$(this).attr('placeholder', $(this).attr('placeholder').replace(/n°[0-9]*/, 'n°'+(trid+1)));}); trid++;});
       $(".remove button").click(removerow);
       $(".add button").click(addrow);
       $(".numerise textarea").keyup(updatesubmit);
       $(".numerise input[type='text']").keyup(updatesubmit);
    }
    $(".numerise form").submit(function() {if ($("#validate span.libelle").html() == 'Valider'){return true;}else{return confirm("La déclaration présentée est-elle bien vide ou indiquée « néant » ?");}});
    updatetableevents();
<?php
/****************
/* STATISTIQUES
/***************/

$fait = get_pc_done();
?>
data = [ { label: "Fait",  data: <?php echo $fait; ?>, color: '#5CB85C'}, { label: "A faire",  data: <?php echo 100 - $fait; ?>, color: '#FFF'} ];
$.plot("#statpie", data , {series: { pie: { show: true,  label: { radius: 0.33, threshold: 0.1, show: true, formatter: function(data, serie){ return serie.label+'<br/>'+Math.round(10*serie.percent)/10+'%';}}}},legend:{show: false}, grid:{hoverable: true}});
    </script>
      <p></p>
  </body>
</html>
