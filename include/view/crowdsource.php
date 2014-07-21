      <div id="crowdsource">
      <?php if ($sent_ok) : ?>
        <div class="alert alert-info" role="alert">N'hésitez pas à <a href="#signin" data-toggle="modal" data-target="#signin">vous enregistrer</a> pour apparaitre parmi les contributeurs de ce projet. Si vous souhaitez partager la section que vous venez de saisir, elle est <a href="#">consultable ici</a>.</div>
       <?php endif; ?>
       <div class="row">
         <div class="col-md-6">
            <div class="well">
            <div class="media">
              <img class="img-circle pull-left" src="<?php echo $avatar; ?>"/>
              <a href="#" class="small pull-right"><span class="glyphicon glyphicon-share"></span> Partager cette partie de la déclaration</a>
              <div class="media-body">
            <h3 class="page-header text-muted">Déclaration de <?php echo $nom; ?></h3>
        </div>
       </div>
                <h3 class="text-center"><?php echo ucfirst($section); ?> <small>Partie <?php echo $id; ?>/12</small></h3>
                <div class="declaration"><img width="100%" src="<?php echo $img; ?>" class="zoom"/></div>
                <p class="text-center"><a href="#"><span class="glyphicon glyphicon-link"></span> Lien permanent vers cette partie de la déclaration</a></p>
          </div>
         </div>
         <div class="numerise col-md-6">
              <h3 class="page-header text-center" style="padding-top: 20px">
              Saisie du document</small>
              </h3>
              <?php if ($sent_ok) : ?>
                <div class="alert alert-success" role="alert">
                  Votre saisie a bien été enregistrée.
                </div>
              <?php endif; ?>
              
               <form class="form-horizontal" role="form" action="/#crowdsource">
                 <input type="hidden" name="id" value="<?php echo $id +1; ?>"/>
                 <?php include("../include/view/forms/".$form); ?>
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