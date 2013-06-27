<?php include('includes/overall/headers/header.php'); 
protect_page_backup();
?>
<?php 
if (isset($_GET['id'])) {
	$_GET['id'] = clean($_GET['id']);
	like_post($_GET['id']);
	echo "Likin' it up";
	?><script>window.location.replace("instantshare.php");</script><?
}
 ?>
<?php include('includes/overall/footers/footer.php'); ?>