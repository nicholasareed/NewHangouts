<?php include('includes/overall/headers/header.php'); 
protect_page_backup();
?>
<?php 
output_messages($user_data['username']);
 ?>

 <?php 
if (isset($_GET['read'])) {
	foreach ($_POST['read'] as $index => $value) {
		mark_as_read($value);
	}
	?><script>window.location.replace("inbox.php");</script><?
}

  ?>
<?php include('includes/overall/footers/footer.php'); ?>