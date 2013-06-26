<?php include('includes/overall/headers/header.php'); ?>
<form action="share.php" method="post" class="form-horizontal">
	<div class="control-group">
		<div class="control-label">Name:</div>
		<div class="controls">
			<input type="text" name="name">
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">Email:</div>
		<div class="controls">
			<input type="email" name="email">
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">Message:</div>
		<div class="controls">
			<textarea name="message" id="" cols="3" rows="3"></textarea>
		</div>
	</div>
	<button type="submit" class="btn btn-info">Post Comment</button>	
</form>
<?php include('includes/overall/footers/footer.php'); ?>