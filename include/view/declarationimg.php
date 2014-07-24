            <div class="well">
            <div class="media text-center">
              <a title="<?php echo $nom; ?>" href="<?php echo preg_replace('#(depute|senateur)/photo/(.*)/\d+#', '$2', $avatar);?>" target="_blank"><img class="img-circle pull-left" src="<?php echo $avatar; ?>"/></a>
              <div class="media-body">
               <h3 class="page-header text-muted">Déclaration de <?php echo $nom; ?> <small><a class="text-muted" href="<?php echo $source; ?>"><span class="glyphicon glyphicon-link"></span></a></small></h3>
              <h4><small>Partie <?php echo $partie; ?> / 12</small></h4><h4><?php echo ucfirst($section); ?></h4>
              </div>
             </div>
             <div class="declaration"><img width="100%" src="<?php echo $img; ?>" class="zoom"/></div>
             <p id="permalink-img" class="text-center"><a target="_blank" href="./declaration.php?partie=<?php echo $partie; ?>&nom=<?php echo $nom; ?>"><span class="glyphicon glyphicon-link"></span> Lien permanent vers cet extrait de déclaration</a></p>
          </div>
