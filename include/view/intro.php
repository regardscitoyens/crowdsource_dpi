    <div class="container-fluid" role="main">
      <div class="jumbotron"><div class="row">
        <div class="col-md-12"><h1 class="text-center">Numérisons les intérêts des parlementaires</h1> </div>
        <div class="col-md-8 ">
        <p>Depuis la promulgation de la <a target="_blank" href="http://www.regardscitoyens.org/adoption-des-projets-de-lois-sur-la-transparence-une-premiere-etape-vivement-la-suite/">loi sur la transparence de la vie publique</a>, les parlementaires doivent déclarer leurs intérêts à la <a target="_blank" href="http://www.hatvp.fr/">Haute Autorité pour la Transparence de la Vie Publique</a> en charge de les contrôler et de les rendre publics afin que chaque citoyen puisse évaluer les possibles risques de confilts d'intérêts de ses représentants.</p>
        <p>Afin de permettre au plus grand nombre de prendre connaissance de leur contenu, la loi prévoit que les déclarations d'intérêts soient mises à disposition du citoyen en Open Data. Si <a target="_blank" href="http://www.hatvp.fr/open-data.html">la Haute Autorité pour la Transparence met à disposition un jeu de données</a> recensant les élus et les déclarations qu'elle contrôle, les informations contenues dans les déclarations d'intérêts ne sont en revanche pas à proprement parler en <a target="_blank" href="http://www.regardscitoyens.org/open-data-en-france/">Open Data</a>&nbsp;: elles n'ont pu être publiées par la HATVP que scannées sous la forme de PDF images rendant l'exploitation de ces informations malaisée au vu du grand nombre d'informations mises en ligne.</p>
        <p>Afin de réaliser effectivement le souhait du législateur et permettre la réutilisation par tous des informations qu'elle contiennent en Open Data, <a target="_blank" href="http://RegardsCitoyens.org">Regards&nbps;Citoyens</a> ouvre cette plateforme collaborative invitant tout un chacun à participer à l'effort de numérisation de ces informations d'importance démocratique cruciale.</p>
        <p id="start-num" class="text-right" style="margin-right: 50px"><a href="#crowdsource" class="btn btn-primary btn-lg" role="button">Participer à la numérisation &raquo;</a></p>
        </div>
        <div id="stats" class="col-md-4 well well-lg">
          <h3 class="text-center page-header">Statistiques</h3>
          <div class="row">
            <div class="col-xs-6">
               <div id="statpie" style="height: 200px;"></div>
            </div>
            <div class="col-xs-6">
	<?php require_once(__DIR__.'/../model/user.php');?>
               <h4>Top des contributeurs</h1>
               <ol>
		<?php foreach (users_top() as $user ) {
                    echo '<li title="'.$user['nickname'].' - '.$user['nb'].' contributions">';
                    $link = 0;
                    if ($user['twitter']) { $link = 1 ;echo '<a target="_blank" href="http://twitter.com/'.$user['twitter'].'">';}
                    else if ($user['website']) { $link = 1 ;echo '<a target="_blank" href="'.$user['website'].'">';}
                    echo str_replace('anonyme ', '', $user['nickname']);
                    if ($link) echo '</a>';
                    echo '<small class="text-muted"> ('.$user['nb'].')</small>';
                    echo'</li>';
                } ?>
               </ol>
               <span><a href="contributeurs.php">Consulter le top 50</a></span>
              </div>
	        <div class="col-xs-12 text-center">
              <span class="text-muted text-center">Un total de <?php echo preg_replace('/([0-9][0-9][0-9])$/', '&nbsp;\1', get_nb_documents()); ?> éléments à numériser<br/>
              <?php echo get_nb_users(); ?> citoyens ont déjà contribué au total <?php echo preg_replace('/([0-9][0-9][0-9])$/', '&nbsp;\1', get_nb_contribs()); ?> fois</span>
            </div>
          </div>
         </div>
        </div>
      </div>
