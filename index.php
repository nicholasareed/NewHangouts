<?php include('includes/overall/headers/header.php'); ?>
	<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<!-- <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<i class="icon-th-list"></i>
					</button> -->
					<a href="index.php" class="brand">Hangouts</a>
					<!-- <div class="nav-collapse collapse"> -->
					<?php 
						// add the "signed in" text widget
						if (signed_in() == true) {include('includes/navbars/index/signed_in.php');} else {include('includes/navbars/index/normal.php');}
					 ?>
				</div>
			</div>
	</div>
	<div class="row-fluid">
		<div class="span2">
			<br><br><br>
			<div class="well sidebar-nav">
				<ul class="nav nav-list">
					<li class="nav-header">Sidebar</li>
					<li><a href="about.php">About Us</a></li>
				</ul><br>
			</div>
			<?php if (signed_in() == false) {
			?>
			<div class="well sidebar-nav">
				<?php include('widgets/total-users.php'); ?>
			</div>
			<div class="well sidebar-nav">
				<a href="#myModal" data-toggle="modal">Quick 	Sign In</a>
				<?php include('quick-sign-in.php'); ?>
			</div>
			<?php
			} ?>
		</div>
		<div class="span10">
			<br><br><br>
			<div class="hero-unit">
				<h1>Welcome to Hangouts!</h1>
				<p class="lead">Hangouts is a social network web app that takes some of the best technologies the web has to offer</p>
				<a href="#myModal" data-toggle="modal" class="btn btn-info btn-large">Sign In</a>
				<?php include('quick-sign-in.php'); ?>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span10 offset2">
			<!-- <blockquote>
				<p>The world keep on getting more and more open. There’s going to be more information available about everything</p>
				<small><cite>Mark Zuckerberg</cite></small>
			</blockquote> -->
			<blockquote>
				<p>Reloaded. Thats what this is. We wanted a cleaner, faster, better site. Why? Because there's always room for improvement. Because coding never ends. There is never an end goal. You can always go further, above and beyond</p>
				<small>
					<cite>Hangouts Team</cite>
				</small>
			</blockquote>
		</div>
	</div>

<?php include('includes/overall/footers/footer.php'); ?>