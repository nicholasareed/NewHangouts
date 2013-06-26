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
						<li class="active"><a href="sign-in.php">Sign In</a></li>
						<li><a href="sign-up.php">Sign Up</a></li>
						<li><a href="apps.php">Applications</a></li>
					</ul>
						<form class="navbar-search pull-right">
  							<input type="text" class="search-query" placeholder="Search">
						</form>
					</div>
				</div>
			</div>
	</div>
	<div class="row-fluid"><br><br>
		<div class="span10  offset2">
			<form action="dashboard.php?first-time=yes" method="post" class="form-horizontal">
				<fieldset>
					<legend>Sign In </legend>
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
		</div>
	</div>

<?php include('includes/overall/footers/footer.php'); ?>