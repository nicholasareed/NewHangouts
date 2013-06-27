	<form action="dashboard.php?first-time=yes" method="post" class="form-horizontal">
		<fieldset>
			<!-- <legend>Sign In </legend> -->
			<div class="control-group">
				<div class="control-label"><label for="">Username:</label></div>
				<div class="controls">
					<input type="text" name="username" required>
				</div>
			</div>
			<div class="control-group">
				<div class="control-label"><label for="">Password:</label></div>
				<div class="controls">
					<input type="password" name="password" required>
				</div>
			</div>
		</fieldset>
		<button type="submit" class="btn btn-primary">Sign In</button>
	</form>
<p>Forgot <a href="recover.php?mode=username">username</a> or <a href="recover.php?mode=password">password</a>?</p>