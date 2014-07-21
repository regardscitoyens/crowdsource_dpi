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
                <input class="form-control" name="nickname" required='true' value="<?php echo $nickname; ?>" placeholder="Mon pseudo">
              </div>
            </div>
            <div class="form-group">
              <label for="twitter" class="col-sm-5 control-label">Utilisateur Twitter/Identica</label>
              <div class="col-sm-7">
                 <input type="text" class="form-control" name="twitter" value="<?php echo $twitter; ?>" placeholder="@utilisateur">
              </div>
            </div>
            <div class="form-group">
              <label for="website" class="col-sm-5 control-label">Site web</label>
              <div class="col-sm-7">
                 <input type="text" class="form-control" name="website" value="<?php echo $website; ?>" placeholder="http://....">
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
       $(".numerise textarea").change(updatesubmit);
       $(".numerise input[type='text']").change(updatesubmit);
    }
    updatetableevents();
data = [ { label: "Fait",  data: 75, color: '#5CB85C'}, { label: "A faire",  data: 25, color: '#FFF'} ];
$.plot("#statpie", data , {series: { pie: { show: true,  label: { radius: 0.33, threshold: 0.1, show: true, formatter: function(data, serie){ return serie.label+'<br/>'+Math.round(10*serie.percent)/10+'%';}}}},legend:{show: false}, grid:{hoverable: true}});
    </script>
      <p>Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
  </body>
</html>
