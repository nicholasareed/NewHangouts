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
						Signed in as
							<a class="dropdown-toggle" data-toggle="dropdown">[first-name] [last-name]</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dlabel">
								<li><a href="http://localhost/Hangouts/[username]" title="Click to view your profile">View Profile</a></li>
								<li><a href="sign-out.php">Sign Out</a></li>
							</ul>
						<!-- </p> -->
					</div>
					<!-- <div class="navbar-text pull-right">
						<span class="icon-bell"></span>
						<div class="notifications">
							<?php # echo num_notifications($user_data['username']); ?>		
						</div>
					</div> -->
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
		<div class="tabbable tabs-left" data-step="9" data-intro="Switch between mulltiple tabs for the main view">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab1" data-toggle="tab">Your Dashboard</a></li>
				<li><a href="#tab2" data-toggle="tab">Upload New Profile Image</a></li>
				<li><a href="#tab3" data-toggle="tab">Online Users</a></li>
				<!-- <li><a href="#tab4" data-toggle="tab"></a></li> -->
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab1">
					<!-- <div class="well"> -->
						

					<!-- </div> -->
				</div>
				<div class="tab-pane" id="tab2">
					<!-- <div class="well"> -->
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
								?><script type="text/javascript" charset="utf-8" async defer>window.location.replace("dashboard.php");</script><?php
							} else{
								echo alert_message('Incorrect file type. Allowed file types are: '.implode(', ', $allowed), 'error');
							}
							
						}
					}
					 ?>
				 <form action="" method="post" enctype="multipart/form-data" >
				 	<p>Upload a profile image</p>
				 	<!-- <div id="drop">
				 		Drop Here


				 		<a>Browse</a> -->
				 		<input type="file" name="profile" required><br>
				 	<!-- </div> -->
				 	<!-- <ul>
				 		
				 	</ul> -->
					<button type="submit" class="btn btn-primary btn-small">Update</button>
				</form>
				<p>You can see your profile picture at the bottom of the quickbar</p>
			</div>
			<!-- </div> -->
				</div>
				<div class="tab-pane" id="tab3">
					<!-- <div class="well"> -->
						<h3>Online Users</h3>
						<?php online_users(); ?>
					<!-- </div> -->	
				</div>
				<div class="tab-pane" id="tab4">
					
				</div>
			</div>
			
		</div>	
	</div>
	<div class="span2 sidebar-nav">
		<!-- <small>Quick Bar</small> -->
		<h3>Hello, [first-name]</h3>
		<!-- <p>Links</p> -->
		<p>Quick Actions</p>
		<nav>
			<ul class="quick-links nav nav-list">
				<li><a href="#myModal" data-toggle="modal" data-step="1" data-intro="Share a message quickly and easily" data-position="left"><span class="icon-comment"></span> InstaShare</a></li>
				<?php require('instashare.php'); ?>
				<li><a data-step="2" data-intro="Change your user settings" data-position="left" href="settings.php"><span class="icon-cog"></span> Settings</a></li>
				<li><a data-step="3" data-intro="Change your password if you think your account might be hacked" data-position="left"  href="change-password.php"><span class="icon-lock"></span> Change Password</a></li>
				<li>
					Messages
					<ul>
						<li data-step="4" data-intro="Check your inbox for any messages" data-position="left"><span class="icon-inbox"></span><a href="inbox.php">Inbox </a> ([inbox])</li>
						<li data-step="5" data-intro="Send a private message to one other user" data-position="left"><span class="icon-plus"></span><a href="new_conversation.php">New Message</a></li>
					</ul>
				</li>
				<li>
					Debate
					<ul>
						<li data-step="6" data-intro="Start a two-sided debate. Other users can support a side" data-position="left"><span class="icon-plus"></span><a href="new_debate.php">Start a debate</a></li>
						<li data-step="7" data-intro="Vote on a debate. One vote can make all the difference" data-position="left"><span class="icon-thumbs-up"></span><a href="debates.php">Vote on debates</a></li>
					</ul>
				</li>
				<li data-step="8" data-intro="When you're done checking your account, sign out" data-position="left"><a href="sign-out.php">Sign Out</a></li>
			</ul>
			<a href="#" class="btn btn-primary btn-block tour-start">Tour?</a>
		</nav>
		<hr>
		<h4>My profile picture</h4>
		<!-- <h6>[profile]</h6> -->
		<div class="side-corner-tag">
			<img src=[profile] data-step="10" data-intro="If you want, you can change your profile pic :)" data-position="left">
			<p><span>Profile</span></p>
		</div>
		<hr>
		<!-- <a href="report.php" class="btn-warning"></a> -->
	</div>
</div>