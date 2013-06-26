<?php include('includes/overall/headers/header.php');protect_page_backup(); ?>
<?php 
if (empty($_POST) == false) {
	$required_fields	= array('current-passwd', 'new-passwd', 'confirm-passwd');
	foreach ($_POST as $key => $value) {
		clean($value);
		// If a value is empty and we say that it is required
		if (empty($value) and in_array($value, $required_fields) == true) {
			$errors[] 	= "All fields are required";
			break 1;	
		}
	}

	if (empty($errors)) {
		if (encrypt($_POST['current-passwd']) != $user_data['password']) {
			$errors[]	= "Your current password and the password you provided do not match";
		}
		if ($_POST['new-passwd'] != $_POST['confirm-passwd']) {
			$errors[]	= "Your new and repeat passwords do not match";
		}
		if (strlen($_POST['new-passwd']) < 6) {
			$errors[]	= "Your new password must be at least six characters";
		}
	}
}
 ?>
 <?php 
	if (empty($_POST) === false && empty($errors) === true ) {
		change_password($session_user_id, $_POST['new-passwd']);
		header('Location: changepassword.php?success');
	} else if (empty($errors) == false) {
		output_errors($errors);
	}
?>
<?php 
if (isset($_GET['success'])) {
	echo alert_message('Your password has been changed succesfully', 'success');
	header('Location: dashboard.php');
}else {
?>
<form action="change-password.php" method="post" class="form-horizontal">
	<fieldset>
		<legend><h3>Change Your Password</h3></legend>
		
		<div class="control-group">
			<div class="control-label">Current Password:</div>	
			<div class="controls">
				<input required type="text" name="current-passwd">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">New Password:</div>
			<div class="controls">
				<input required type="text" name="new-passwd">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">Confirm New Password:</div>
			<div class="controls">
				<input required type="text" name="confirm-passwd">
			</div>
		</div>
		<button class="btn btn-primary">Change Password</button>
	</fieldset>
</form>
<?php
}
 ?>
<?php
 include('includes/overall/footers/footer.php'); ?>