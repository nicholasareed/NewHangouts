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
					<?php 
						if (signed_in() == true) {
							include('includes/navbars/apps/signed_in.php');
						} else {
							include('includes/navbars/apps/normal.php');
						}
					 ?>
					</div>
				</div>
			</div><br><br>
			<div class="row-fluid">
				<div class="span12">
					<ul class="thumbnails">			  			
			  			<li class="span3">
			  				<div class="thumbnail">
			  					<h3></h3>
			  					<p></p>
			  					<a href=""></a>
			  				</div>
			  			</li>
					</ul>
				</div>
			</div>
<?php include('includes/overall/footers/footer.php'); ?>