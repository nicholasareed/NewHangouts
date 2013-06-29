<?php include('includes/overall/headers/header.php'); 
protect_page_backup();
?>
<?php 
if (isset($_POST['message'])) {
	if (empty($_POST['message']) == true) {
		$errors[] = "You can't have an empty message";
	}
	if (empty($errors)) {
		$message = nl2br(censor(clean($_POST['message'])));
		$instashare_data = array(
		"name" 		=> $user_data['username'],
		"email"			=> $user_data['email'],	
		"message" 		=> $message,
		"timestamp"		=> time()
		// "tags" 			=> $tags
		);
		instashare($instashare_data);
		?>
		<!-- Stop Form Spamming -->
		<script type="text/javascript" charset="utf-8" async defer>window.location.replace("instantshare.php");</script><?php
	} else{
		output_errors($errors);
	}
}

output_instashared('timestamp', 'name', 'email', 'message');


 ?>
<?php include('includes/overall/footers/footer-app.php'); ?>
