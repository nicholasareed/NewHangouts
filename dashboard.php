<?php include('includes/overall/headers/header.php'); ?>
<?php 
if (empty($_POST) === false) {
	// If we have data to work with, we want to make sure it is safe to pass it into our database
	$username	= clean($_POST['username']);
	$password	= clean($_POST['password']);

	// Checks to make sure that the person is good to sign in
	if (empty($username) or empty($password)) {
		$errors[]	= "You need to enter a username and a password.";
	} else if (user_exists($username) == false) {
		$errors[]	= "We can't find that username, have you registered?";
	} else if (user_banned($username)) {
		$errors[]	= "That user has been banned.";
	} else if (user_active($username) === false){
		$errors[]	= "You haven't activated your account yet. Check your email. The activation code might be in your spam or junk folder.";
	} else{
		// We know that the user can be signed in, so let's sign them in
		$login 		= login($username, $password);
		if ($login === false) {
			$errors[]	= "That username/password combination is incorrect.";
		} else{
			$_SESSION['user_id']	= $login;
			header('Location: index.php');
		}
	}
} else if(signed_in() == false){
	$errors[]	= "Go to the sign in page first before coming here";
}
 ?>
<?php output_errors($errors); ?>
<?php 
if (empty($errors)) {
	
	if (isset($_GET['first-time'])) {
		echo "Loading...Please Wait";
		?>
		<script type="text/javascript">
			window.location.replace("http://localhost/Hangouts/dashboard.php");
		</script>
		<?php
	} else{
		include('widgets/signed-in.php');
	}
}
?>
<?php include('includes/overall/footers/footer.php'); ?>