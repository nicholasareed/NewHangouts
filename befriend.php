<?php require('includes/overall/headers/header.php'); ?>
<?php 
if (isset($_GET['friend'])) {
	$friend = clean($_GET['friend']);
	$user = $user_data['username'];

	if ($friend == $user) {
		$errors[] = "User can not befriend oneself, does not comply with the 'Friends: Regulations and Rules' handbook ";
	}
	if (empty($errors)) {
		$request_data = array(
		"user_initiated" 	=> $user,
		"user_poss_friend" 	=> $friend,
		"status"		=> "pending"
		);
		request_friend($request_data);
	} else {
		output_errors($errors);
	}
	
}
 ?>
<?php require('includes/overall/footers/footer.php'); ?>