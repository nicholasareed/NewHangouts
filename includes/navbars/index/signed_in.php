<div class="navbar-text dropdown pull-right">
						<!-- <p class="navbar-text pull-right">						 -->
						Signed in as
							<a class="dropdown-toogle" data-toggle="dropdown"><?php echo $user_data['first_name'].' '.$user_data['last_name']; ?></a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dlabel">
								<li><a href="http://localhost/Hangouts/[username]" title="Click to view your profile">View Profile</a></li>
								<li><a href="sign-out.php">Sign Out</a></li>
							</ul>
						<!-- </p> -->
					</div>
<nav>
	<ul class="nav">
		<li class="active"><a href="index.php">Home</a></li>
		<li><a href="dashboard.php">Dashboard</a></li>
		<li><a href="apps.php">Applications</a></li>
		<?php 
		if ($user_data['type'] == 4) { ?>
		<li><a href="admin.php">Admin</a></li>
		<?php
		}
		 ?>
	</ul>
</nav>