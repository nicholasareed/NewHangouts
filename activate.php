<?php include('includes/overall/headers/header.php'); 
signed_in_redirect_backup();
if (isset($_GET['success'])) {
	alert_message('You are free to use the site :D','success');
} else {


if (isset($_GET['email']) and isset($_GET['email_code'])) {
	$email 		= trim($_GET['email']);
	$email_code	= trim($_GET['email_code']);

	if (email_exists($email) == false) {
		$errors[] 	= "Oops! Something went wrong. We couldn't find that email address";
	} else if(activate($email, $email_code) == false) {
		$errors[] = "We had problems activating your account";
	}

} else {
	header();
	exit();
}
}
 include('includes/overall/footers/footer.php'); 
 ?>