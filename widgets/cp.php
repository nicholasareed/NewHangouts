 <div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<!-- <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<i class="icon-th-list"></i>
					</button> -->
					<a href="index.php" class="brand">Hangouts</a>
					<!-- <div class="nav-collapse collapse"> -->
					<div class="navbar-text dropdown pull-right">
						<!-- <p class="navbar-text pull-right">						 -->
							<a class="dropdown-toogle" data-toggle="dropdown">[first-name] [last-name]</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dlabel">
								<li><a href="http://localhost/Hangouts/[username]" title="Click to view your profile">View Profile</a></li>
								<li><a href="sign-out.php">Sign Out</a></li>
							</ul>
						<!-- </p> -->
					</div>
					<ul class="nav pull-left">
						<li><a href="index.php">Home</a></li>
						<li class="active"><a href="dashboard.php">Dashboard</a></li>
						<li><a href="apps.php">Applications</a></li>
					</ul>
					<!-- </div> -->
				</div>
			</div>
	</div><br><br>
 <div class="row-fluid">
	<div class="span10">
		<div class="well">
			<h3>Your Dashboard</h3>
			<p class="inline"></p>
		</div>
		<div class="span4">
			<div class="well">
				<div class="profile">
					<?php 
					if (isset($_FILES['profile']) == true) {
						if (empty($_FILES['profile']['name']) == true) {
							echo "Please Choose A file";
						} else{
							$allowed = array('jpg', 'jpeg', 'gif', 'png');

							$file_name 	= $_FILES['profile']['name'];
							$file_temp	= $_FILES['profile']['tmp_name'];
							$file_extn 	= strtolower(end(explode('.', $file_name)));
							if (in_array($file_extn, $allowed) == true) {
								$id = "[id]";
								change_profile_image($id, $file_temp, $file_extn);
							} else{
								echo alert_message('Incorrect file type. Allowed file types are: '.implode(', ', $allowed), 'error');
							}
							
						}
					}
					 ?>
				 <form action="" method="post" enctype="multipart/form-data">
				 	<p>Upload a profile image</p>
				 	<input type="file" name="profile" required><br>
					<button type="submit" class="btn btn-primary btn-small">Update</button>
				</form>
			</div>
			</div>
		</div>
		<div class="span6">
			<div class="well">
				
			</div>
		</div>
	</div>
	<div class="span2 sidebar-nav">
		<small>Quick Bar</small>
		<h3>Hello, [first-name]</h3>
		<p>Quick Links</p>
		<nav>
			<ul class="quick-links">
				<li><a href="#myModal" data-toggle="modal">InstaShare</a></li>
				<?php require('instashare.php'); ?>
				<li><a href="settings.php">User Settings</a></li>
				<li><a href="change-password.php">Change Password</a></li>
				<li><a href="sign-out.php">Sign Out</a></li>
				<li>
					Messages
					<ul>
						<li><a href="inbox.php">Inbox</a></li>
						<li><a href="new_conversation.php">New Message</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<hr>
		<h4>My profile picture</h4>
		<!-- <h6>[profile]</h6> -->
		<img src=[profile]>
		<hr>
		<!-- <a href="report.php" class="btn-warning"></a> -->
	</div>
</div>