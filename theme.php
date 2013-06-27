<?php 
// See what the user's current theme is
if (signed_in() == true) {
	$user_theme = strtolower($user_data['theme']);
	if ($user_theme == "bootstrap") {
		add_stylesheet("//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css");
	} else {
		// add_stylesheet('assets/css/bootswatch/'.$user_theme.'.css');
		if ($user_theme == "nightwing") {
			add_stylesheet("assets/css/bootswatch/nightwing.css");
		}
		add_stylesheet("//netdna.bootstrapcdn.com/bootswatch/2.3.2/".$user_theme."/bootstrap.min.css");
	}
} else{
	// add_stylesheet("assets/css/bootstrap.min.css");
	add_stylesheet("//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css");
}
 ?>