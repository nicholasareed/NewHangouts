	<form action="dashboard.php?first-time=yes" method="post" class="form-horizontal" autocomplete="on">
		<fieldset>
			<!-- <legend>Sign In </legend> -->
			<div class="control-group">
				<div class="control-label"><label for="">Username:</label></div>
				<div class="controls">
					<input type="text" name="username" required autofocus>
				</div>
			</div>
			<div class="control-group">
				<div class="control-label"><label for="">Password:</label></div>
				<div class="controls">
					<input type="password" name="password" required>
				</div>
			</div>
			<!-- <div class="control-group">
				<div class="controls">
					<label for="" class="checkbox">
						Alpha Feature! 
						<input type="checkbox" name="remember-me"> Remember Me
					</label>
				</div>
			</div> -->
		</fieldset>
		<button type="submit" class="btn btn-primary">Sign In</button>
	</form>
<p>Forgot <a href="recover.php?mode=username">username</a> or <a href="recover.php?mode=password">password</a>?</p>
<script>
			$.jCookies({
				name: 'Cookie',
				value : {
					'Cookie' : 'object?',
					'Test' : 'no worky'
				}
			});
		</script>