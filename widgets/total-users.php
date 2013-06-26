<h4>Users:</h4>
<?php 
$user_count	= user_count();
if ($user_count > 1) {$suffix = 's';} else if ($user_count = 1) {$suffix = '';}
 ?>
<p>We currently have <strong><?php echo convertNumber(user_count()); ?> </strong> registered user<?php echo $suffix; ?>. <br><a href="sign-up.php">Sign Up!</a></p>