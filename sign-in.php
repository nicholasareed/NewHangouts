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
					</div>
				</div>
			</div>
	</div>
	<div class="row-fluid"><br><br>
		<div class="span10  offset2">
			<?php require('sign-in-form.php'); ?>
		</div>
	</div>

<?php include('includes/overall/footers/footer.php'); ?>