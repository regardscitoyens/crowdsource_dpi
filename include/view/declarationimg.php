            <div class="well">
            <div class="media">
              <img class="img-circle pull-left" src="<?php echo $avatar; ?>"/>
	       <?php if (!$donotshare) : ?>
              <a href="./declaration.php?id=<?php echo $id; ?>&name=<?php echo $nom; ?>" class="small pull-right"><span class="glyphicon glyphicon-share"></span> Partager cette partie de la déclaration</a>
               <?php endif; ?>
              <div class="media-body">
               <h3 class="page-header text-muted">Déclaration de <?php echo $nom; ?></h3>
              </div>
             </div>
             <h3 class="text-center"><?php echo ucfirst($section); ?> <small>Partie <?php echo $id; ?>/12</small></h3>
             <div class="declaration"><img width="100%" src="<?php echo $img; ?>" class="zoom"/></div>
             <p class="text-center"><a href="./declaration.php?id=<?php echo $id; ?>&name=<?php echo $nom; ?>"><span class="glyphicon glyphicon-link"></span> Lien permanent vers cette partie de la déclaration</a></p>
          </div>
