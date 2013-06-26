<?php include('includes/overall/headers/header.php');  signed_in_redirect_backup();
if (isset($_GET['success']) == true) {
	echo alert_message("Thanks! We've sent you an email. Be sure to check your spam and junk folders if you can't find it", 'info');
	} else {
	$mode_allowed 	= array('username', 'password');
	if (isset($_GET['mode']) == true and in_array($_GET['mode'], $mode_allowed) == true) {
		if (isset($_POST['email']) == true and empty($_POST['email']) == false) {
			if (email_exists($_POST['email']) == true) {
				recover($_GET['mode'], $_POST['email']);
				?> <script>window.location.replace("recover.php?success");</script> <?php
				header('Location: recover.php?success');
			} else {
				echo alert_message("Oops, we couldn't find that email address!",'error');
			}
		}
	?>
	<form action="" method="post" class="form-horizontal">
		<fieldset>
			<legend>Recover</legend>
			<div class="control-group">
				<div class="control-label">Please enter your email address</div>
				<div class="controls">
					<input type="email" name="email">
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Recover</button>
		</fieldset>
	</form>
	<?php
	} else {
		header('Location: index.php');
		exit();
	}
	
}
 ?>
<?php include('includes/overall/footers/footer.php');  ?>

