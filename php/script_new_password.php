<?php
	session_start();
	unset($response_message['status']);
	require_once 'connect.php';
	require_once "reporting.php";
	$email = $_SESSION['email'];
	$new_password = $_POST['password_first'];
	$new_password_valid = $_POST['password_second'];
	if (!isset($new_password) || $new_password != $new_password_valid) {
		mysqli_close($link);
		reporting("error entering");
	}
	$new_password_hashed = password_hash($new_password, PASSWORD_BCRYPT);
	$sql = "UPDATE users SET pass = '{$new_password_hashed}' WHERE email = '{$email}' LIMIT 1;";
	$result = mysqli_query($link, $sql);
	if (!$result) {
		mysqli_close($link);
		reporting("error in DB");
	}
	else {
		mysqli_close($link);
		reporting("success");
	}
?>