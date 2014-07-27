      <div id="crowdsource">
      <?php if ($sent_ok) : ?>
        <div class="alert alert-info text-center" role="alert">
<?php
	 if (!isset($_SESSION['nickname'])) {
	 echo "N'hésitez pas à <a href=\"#signin\" data-toggle=\"modal\" data-target=\"#signin\">vous enregistrer</a> pour apparaitre parmi les contributeurs de ce projet. ";
	 }
     echo "Si vous souhaitez partager la section que vous venez de saisir, elle est <a href=\"".$_SESSION['lastpage']."\">consultable ici</a>.";
     $_SESSION['lastpage'] = null;
?>
</div>
       <?php endif; ?>
       <div class="row">
         <div class="col-md-6">
	   <?php
	   if (!$nodoc) {
	     include(__DIR__.'/declarationimg.php');
	   }
?>         </div>
         <div class="numerise col-md-6">
           <div class="well">
              <h3 class="page-header text-center">
              Saisir les informations</small>
              </h3>
 	      <?php if (isset($sent_ok) && $sent_ok) : ?>
                <div class="alert alert-success text-center" role="alert">
                  Merci ! Votre saisie a bien été enregistrée.
                </div>
              <?php endif; ?>
	   <?php if (!$nodoc) : ?>
               <form class="form-horizontal" role="form" action="save.php" method="POST">
                 <input type="hidden" name="token" value="<?php echo $token; ?>"/>
                 <?php include("../include/view/forms/".$form); ?>
                 <div class="row">
                  <div class="col-xs-4 form-inline">
	   <div class="btn-group control"><button type="button" class="form-control btn btn-danger dropdown-toggle" data-toggle="dropdown">Signaler un problème <span class="caret"></span></button><ul class="dropdown-menu" role="menu"><li><a href="./save.php?token=<?php echo $token; ?>&pb=1">Les informations remplies sont illisibles</a></li><li><a href="./save.php?token=<?php echo $token; ?>&pb=2">Le scan semble mal découpé</a></li><li><a href="./save.php?token=<?php echo $token; ?>&pb=3">Les informations déclarées semblent incomplètes</a></li></ul></div>
                  </div>
                  <div class="col-xs-8"><div class="pull-right"><button id="validate" type="submit" class="btn btn-success"><span class="libelle">Valider le formulaire vide</span>&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></button></div></div>
                <a style="margin: 10px 25px 0" href="./next.php" class="pull-right btn-link">Changer de déclaration</a>
                 </div>
                 <p class="text-muted" style="margin-top: 20px;">Si vous avez le sentiment que nous avons mal détecté cette partie ou qu'il manque des informations, merci de nous l'indiquer en cliquant sur «&nbsp;Signaler un problème&nbsp;», nous vous proposerons un autre extrait de déclaration à saisir.</p>
                 <p class="text-muted"><a href="#faq">Un doute ou une question ? cliquez ici pour lire les Questions Fréquentes.</a></p>
               </form>
	   <?php else : ?>
	   <p class="text-center">Nous n'avons plus de document à vous faire numériser !! </p>
           <?php endif; ?>
            </div>
         </div>
       </div>
