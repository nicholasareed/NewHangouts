<?php 
if (isset($_GET['success'])) {
	echo alert_message('The mail has been sent successfully','success');
} else {
if (empty($_POST) == false) {
	if (empty($_POST['subject']) == true) {
		$errors[]	= "The subject field is required";
	}
	if (empty($_POST['body']) == true) {
		$errors[]	= "The body field is required";
	}
	if (empty($errors) == false) {
		output_errors($errors);
	} else {
		mail_users($_POST['subject'], $_POST['body']);
		?><script>window.location.replace("mail.php?success");</script><?php
		header('Location: mail.php?success');
		exit();
	}
}
 ?>
<form action="" method="post" class="form-horizontal">
	<fieldset>
		<legend>Email subscribed users </legend>
		<div class="control-group">
			<div class="control-label">Email Subject:</div>
			<div class="controls">
				<input required type="text" name="subject">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">Email Body:</div>
			<div class="controls">
				<textarea required name="body" cols="8" rows="6"></textarea>
			</div>
		</div>
	</fieldset>
	<button type="submit" class="btn btn-primary">Send Email</button>
</form>

<?php 
}
 ?>