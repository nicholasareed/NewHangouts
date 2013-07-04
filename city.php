<?php include('includes/overall/headers/header.php'); ?>
<?php 
if (isset($_GET) and empty($_GET) == false) {
	$info = file_get_contents('http://openweathermap.org/data/2.5/forecast?q='.$_GET['city'].'&mode=json&units=imperial&lang=en&cnt=10');
	$info_array = json_decode($info, true);
	echo "<pre>";
	print_r($info_array);
	echo "</pre>";
}
 ?>

<form action="" method="get" class="form-horizontal">
	<div class="control-group">
		<div class="control-label">City Name:</div>
		<div class="controls">
			<input type="text" name="city">
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Forecast!</button>
</form>
<?php include('includes/overall/footers/footer.php'); ?>