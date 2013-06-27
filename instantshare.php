<?php include('includes/overall/headers/header.php'); 
protect_page_backup();
?>
<?php 
if (isset($_POST['message'])) {
	if (empty($_POST['message']) == true) {
		$errors[] = "You can't have an empty message";
	}
	if (empty($errors)) {
		$instashare_data = array(
		"name" 		=> $user_data['username'],
		"email"			=> $user_data['email'],	
		"message" 		=> censor(clean($_POST['message'])),
		"timestamp"		=> time()
		);
		instashare($instashare_data);
	} else{
		output_errors($errors);
	}
}

output_instashared('timestamp', 'name', 'email', 'message');


 ?>
<?php include('includes/overall/footers/footer-app.php'); ?>
