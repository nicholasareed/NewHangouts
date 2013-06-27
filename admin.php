<?php include('includes/overall/headers/header.php'); 
protect_page_backup();
admin_protect();
?>
<h1>Admininstrator Control Panel</h1>
<?php 
if (isset($_GET['promote_to']) and isset($_GET['name'])) {
	array_walk($_GET, clean_array());
	promote($_GET['promote_to'], $_GET['name']);
	?><script>window.location.replace("admin.php");</script><?
}
 ?>
    <div class="tabbable tabs-left">
    	<ul class="nav nav-tabs">
    		<li class="active"><a href="#tab1" data-toggle="tab"><span class="icon-user"></span>Users</a></li>
    		<li><a href="#tab2" data-toggle="tab"><span class="icon-flag"></span>Flagged Comments</a></li>
    		<li><a href="#tab3" data-toggle="tab"><span class="icon-bullhorn"></span>Email Users</a></li>
    	</ul>
    	<div class="tab-content">
    		<div class="tab-pane active" id="tab1">
    			<h3>Users</h3>
			<?php grab_users(); ?>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
    		</div>
    		<div class="tab-pane" id="tab2">
    			<h3>Flagged Comments</h3>
			<?php 
				$query = mysql_query("SELECT * FROM `public-posts` WHERE `flagged` = 1");
				while ($flagged = mysql_fetch_assoc($query)) {
					echo '<div>Posted By: '.$flagged['name'].'<br> Message:'.$flagged['message'].'</div>';
				}
 			?>
    		</div>
    		<div class="tab-pane" id="tab3">
    			<?php require('mass-email.php'); ?>
    		</div>
    	</div>
    </div>
<?php  include('includes/overall/footers/footer.php'); ?>