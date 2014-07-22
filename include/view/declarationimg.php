            <div class="well">
            <div class="media text-center">
              <img class="img-circle pull-left" src="<?php echo $avatar; ?>"/>
              <div class="media-body">
               <h3 class="page-header text-muted">Déclaration de <?php echo $nom; ?></h3>
              <h4><small>Partie <?php echo $id; ?> / 12</small></h4><h4><?php echo ucfirst($section); ?></h4>
              </div>
             </div>
             <div class="declaration"><img width="100%" src="<?php echo $img; ?>" class="zoom"/></div>
               <?php if (!$donotshare) : ?>
             <p id="permalink-img" class="text-center"><a href="./declaration.php?id=<?php echo $id; ?>&name=<?php echo $nom; ?>"><span class="glyphicon glyphicon-link"></span> Lien permanent vers cet extrait de déclaration</a></p>
               <?php endif; ?>
          </div>
