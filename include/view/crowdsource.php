      <div id="crowdsource">
      <?php if ($sent_ok) : ?>
        <div class="alert alert-info" role="alert">N'hésitez pas à <a href="#signin" data-toggle="modal" data-target="#signin">vous enregistrer</a> pour apparaitre parmi les contributeurs de ce projet. Si vous souhaitez partager la section que vous venez de saisir, elle est <a href="#">consultable ici</a>.</div>
       <?php endif; ?>
       <div class="row">
         <div class="col-md-6">
            <?php include(__DIR__.'/declarationimg.php'); ?>
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
              
               <form class="form-horizontal" role="form" action="save.php" method="POST">
                 <input type="hidden" name="token" value="<?php echo $token; ?>"/>
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
