<?php include('includes/overall/headers/header.php'); 
protect_page_backup();
?>
<?php 
if (empty($_POST) == false) {
	$new_convo_data = array(
		"from" => $user_data['username'],
		"to" => $_POST['to'],
		"subject" => $_POST['subject'],
		"message" => $_POST['message']
		);
	new_convo($new_convo_data);
} else {
	$errors[] = "All fields are required";
}
 ?>
<form action="new_conversation.php" method="post">
	<fieldset>
		<legend>Start a new conversation</legend>
		<div class="control-group">
			<div class="control-label"><label for="">To: </label></div>
			<div class="controls">
				<input type="text" required name="to" list="usernames">
				<!-- <select name="to" id="">
					<?php 
					grab_users2();
					 ?>
				</select> -->
			</div>
		</div>
		<div class="control-group">
			<div class="control-label"><label for="">Subject: </label></div>
			<div class="controls">
				<input type="text" required name="subject">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label"><label for="">Message: </label></div>
			<textarea required name="message" id="" cols="30" rows="10" maxlength="1000"></textarea>
		</div>
	</fieldset>
	<button type="submit" class="btn btn-primary">Send Message</button>
</form>
<?php include('includes/overall/footers/footer.php'); ?>