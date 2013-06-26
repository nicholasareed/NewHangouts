<?php 
// See what the user's current theme is
if (signed_in() == true) {
	$user_theme = strtolower($user_data['theme']);
	add_stylesheet('assets/css/bootswatch/'.$user_theme.'.css');
	
} else{
	add_stylesheet("assets/css/bootstrap.min.css");
}
 ?>