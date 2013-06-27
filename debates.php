<?php include('includes/overall/headers/header.php'); 
protect_page_backup();
?>
<?php 
if (isset($_POST)) {
	$value = 'something from somewhere';
	foreach ($_POST as $id => $side) {
		$like = like_debate($id, $side);
	}
}
 ?>

<?php 
output_debates();
 ?>
<?php include('includes/overall/footers/footer-app.php'); ?>