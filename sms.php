<?php include('includes/overall/headers/header.php'); ?>
<?php 
if (isset($_POST)) {
	$phone_addr = $_POST['phone'];
	$phone_addr .= $_POST['service'];
	mail($Phone, '', $_POST['message']);
}
 ?>
<form action="sms.php" method="post" class="form form-horizontal">
	<fieldset>
		<legend>Send an SMS Message (May not work, charges apply)</legend>
		<div class="control-group">
			<div class="control-label">Phone #:</div>
			<div class="controls">
				<input type="tel" name="phone">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">Service Provider:</div>
			<div class="controls">
				<select name="service" id="">
					<option value="@txt.att.net">AT&amp;T</option>
					<option value="@vtext.com">Verizon</option>
				</select>
				<span class="help-block">If you are sending a message to a friend, <br> you will need to know their service provider</span>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">Message:</div>
			<div class="controls">
				<textarea name="message"></textarea>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Send Message</button>
	</fieldset>
</form>
<?php include('includes/overall/footers/footer.php'); ?>