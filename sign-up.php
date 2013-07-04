<?php include('includes/overall/headers/header.php'); ?>
	<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<!-- <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<i class="icon-th-list"></i>
					</button> -->
					<a href="index.php" class="brand">Hangouts</a>
					<!-- <div class="nav-collapse collapse"> -->
						<!-- <p class="navbar-text pull-right">
							Signed in as <a href="" class="navbar-link">Ashwin</a>
						</p> -->
					<ul class="nav pull-left">
						<li><a href="index.php">Home</a></li>
						<li><a href="sign-in.php">Sign In</a></li>
						<li class="active"><a href="sign-up.php">Sign Up</a></li>
						<li><a href="apps.php">Applications</a></li>
					</ul>
						<form class="navbar-search pull-right">
  							<input required type="text" class="search-query" placeholder="Search">
						</form>
					</div>
				</div>
			</div>
	</div>
	<?php 
		if (empty($_POST) === false) {
			$required_fields = array("username","email", "first-name", "password");
			foreach ($_POST as $key => $value) {
				clean($value);
				// If a value is empty and we say that it is required
				if (empty($value) and in_array($value, $required_fields) == true) {
					$errors[] 	= "All fields are required";
					break 1;	
				}
			}

			if (empty($errors)) {
				if (user_exists($_POST['username']) == 1) {
					$errors[]	= "Sorry, that username has already been taken";
				}
				if (preg_match("/\\s/", $_POST['username']) == true) {
					$errors[]	= "Your username can not contain any spaces";
				}
				if (strlen($_POST['password']) < 6) {
					$errors[] 	= "Your password must be at least six characters";
				}
				if (email_exists($_POST['email']) == true) {
					$errors[] 	= "That email has already been used";
				}

			}
		}
 	?>
	<br><br>
	<div class="row-fluid">
		<div class="span10  offset2">
			<?php 
			if (empty($_POST) === false && empty($errors) === true ) {
				$register_data = array(
					'username' 		=> $_POST['username'],
					'password' 		=> encrypt($_POST['password']),
					'first_name' 		=> $_POST['first-name'],
					'last_name' 		=> $_POST['last-name'],
					'email' 			=> $_POST['email'],
					"email_code"		=> md5($_POST['username'] + microtime() + uniqid()),
					"timestamp"		=> time()
					);
				register($register_data);
				header('Location: index.php');
				echo alert_message("<strong>Great!</strong> You've been registered successfully. Please check your mail for the activation code :)", 'success');
				exit();
			}else if(empty($errors) == false){
				echo output_errors($errors);
			}
			  ?>
			<form action="sign-up.php" method="post" class="form-horizontal">
				<fieldset>
					<legend>Sign Up for an Account</legend>
					<div class="control-group">
						<div class="control-label"><label for="">Username:</label></div>
						<div class="controls">
							<input value="<?php if (isset($_POST['username'])) {echo $_POST['username'];}?>" required type="text" name="username" maxlength="32" pattern="^[a-zA-Z0-9_]*$" title="Only uppercase, lowercase, numbers and underscores" min="1">
						</div>
					</div>
					<div class="control-group">
						<div class="control-label"><label for="">Email:</label></div>
						<div class="controls">
							<input value="<?php if (isset($_POST['email'])) {echo $_POST['email'];}?>" required type="email" name="email" maxlength="1024">
						</div>
					</div>
					<div class="control-group">
						<div class="control-label"><label for="">First Name:</label></div>
						<div class="controls">
							<input value="<?php if (isset($_POST['first-name'])) {echo $_POST['first-name'];}?>" required type="text" name="first-name" maxlength="32">
						</div>
					</div>
					<div class="control-group">
						<div class="control-label"><label for="">Last Name:</label></div>
						<div class="controls">
							<input value="<?php if (isset($_POST['last-name'])) {echo $_POST['last-name'];}?>" type="text" name="last-name" maxlength="32">
						</div>
					</div>
					<div class="control-group">
						<div class="control-label"><label for="">Password:</label></div>
						<div class="controls">
							<input value="<?php if (isset($_POST['password'])) {echo $_POST['password'];}?>" required type="password" name="password" id="password" min="6">
						</div>
					</div>
					<span class="help-block">By signing up, you agree to the <?php include('terms.php'); ?></span><br>
				</fieldset>
					<button type="submit" class="btn btn-primary">Sign Up</button>
			</form>
		</div>
	</div>
<?php include('includes/overall/footers/footer-register.php'); ?>