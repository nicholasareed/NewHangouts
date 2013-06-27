<?php include('includes/overall/headers/header.php'); 
protect_page_backup();
?>
<?php 
if (isset($_POST)) {
	if (empty($_POST)) {
		$errors[] = "All fields are required";
	} 

	if (empty($errors)) {
		$data = array(
			"side1" => clean($_POST['side1']),
			"side2" => clean($_POST['side2']), 
			"name" => $user_data['username']
		);
		start_debate($data);
	}
	
}
 ?>
<form action="new_debate.php" method="post" class="form form-horizontal">
	<fieldset>
		<legend>Start a new debate</legend>
		<div class="control-group">
			<div class="control-label">Side One:</div>
			<div class="controls">
				<input required type="text" name="side1">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">Side Two:</div>
			<div class="controls">
				<input required type="text" name="side2">
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Start Debate!</button>
	</fieldset>
</form>
<?php include('includes/overall/footers/footer.php'); ?>