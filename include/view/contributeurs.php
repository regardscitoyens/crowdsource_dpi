<?php include(__DIR__.'/../model/user.php');?>
<div class='row' style="margin-top: 60px;">
<div class="col-md-6 col-md-offset-3 well">
<h1>Top des contributeurs</h1>
<ol>
<?php foreach (users_top(50) as $user ) {
  echo '<li>';
  $link = 0;
  echo $user['nickname'];
  if ($user['twitter']) { $link = 1 ;echo ' ( <a href="http://twitter.com/'.$user['twitter'].'">twitter</a>';}
if ($user['website']) { if ($link) {echo ' | ';} else { echo ' ( ';} echo '<a href="'.$user['website'].'">site web</a>';$link = 1;}
if ($link) {echo ' ) '; }
echo ' : '.$user['nb'].' contributions';
  echo'</li>'; 
} ?>
</ol>
</div>
</div>