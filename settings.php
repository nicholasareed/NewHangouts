<?php include('includes/overall/headers/header.php');
protect_page_backup();
 ?>
 <?php 
if (isset($_GET['success']) == true) {
	echo alert_message('Your details have been updated. <a href="dashboard.php">Dashboard</a>?', 'info');
} else {

  ?>
 <?php 
if (empty($_POST) == false) {
	$required_fields = array('first_name', 'email');
	foreach ($_POST as $field => $user_value) {
		if (empty($user_value) and in_array($field, $required_fields)) {
			$errors[]	= "All fields are required";
			break 1;
		}
	}

	if (empty($errors) == true) {
		if (email_exists($_POST['email']) == true and $user_data['email'] != $_POST['email']) {
			$errors[]	= "Sorry that email address is already in use";
		}
	}

}
  ?>
<?php 
if (empty($_POST) == false and empty($errors) == true) {
	if ($_POST['allow_email'] == 'on') {
		$allow_email = 1;
	} else {
		$allow_email = 0;
	}
	$update_data		= array(
		"first_name"	=> $_POST['first_name'],
		"last_name"	=> $_POST['last_name'],
		"email"		=> $_POST['email'],
		"allow_email"	=> $allow_email,
		"theme"	=> $_POST['theme'],
		"bio"		=> $_POST['bio']		
		);

	update_user($update_data);
	?><script>window.location.replace("settings.php?success");</script><?php
	header('Location: settings.php?success');
} else if(empty($errors) == false){
	output_errors($errors);
}

 ?>
<form action="settings.php" method="post" class="form-horizontal">
	<fieldset>
		<legend>Change your user settings</legend>
		<div class="control-group">
			<div class="control-label">Username:</div>
			<div class="controls">
				<input type="text" disabled="disabled" name="username" value="<?php echo $user_data['username']?>" maxlength="32"> 
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">First Name:</div>
			<div class="controls">
				<input type="text" name="first_name" value="<?php echo $user_data['first_name']?>" maxlength="32"> 
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">Last Name:</div>
			<div class="controls">
				<input type="text" name="last_name" value="<?php echo $user_data['last_name']?>" maxlength="32">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">Email:</div>
			<div class="controls">
				<input type="email" name="email" value="<?php echo $user_data['email']?>" maxlength="1024">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">Theme:</div>
			<div class="controls">
				<select name="theme" id="theme">
					<?php 
						foreach ($themes as $theme) {
							if ($user_data['theme'] == $theme) {
								echo '<option value="'.$theme.'" selected>'.$theme.'</option>';	
							} else {
								echo '<option value="'.$theme.'">'.$theme.'</option>';	
							}
						}
					 ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">Bio:</div>
			<div class="controls">
				<textarea name="bio"><?php echo $user_data['bio']; ?></textarea>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<label for="" class="checkbox">
					<input type="checkbox" name="allow_email" <?php if ($user_data['allow_email'] == 1) {echo 'checked=checked';} ?>> I would like to receive announcements and updates from Hangouts
				</label>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Update</button>
	</fieldset>
</form>
<?php include('includes/overall/footers/footer.php'); ?>
<?php } ?>