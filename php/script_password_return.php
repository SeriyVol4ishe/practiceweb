<?php
	require 'connect.php';
	$email = $_GET['email'];
	if ($email != "") {
		$sql = "SELECT name, email, phone, prof, userimg FROM users WHERE email = '$email' LIMIT 1;";
	}
	else {
		echo "Shit!!!";
		exit();
	}
	$sql_result = mysqli_query($link, $sql);
	if (!$sql_result) {
		echo "Error in DB!!!";
		exit();
	}
	$count = mysqli_num_rows($sql_result);
	if (!$count) {
		echo "User not found in DB!!!";
		exit();
	}
	$chars_for_random_password = "qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
	$length_chars_for_random_password = strlen($chars_for_random_password);
	$length_random_password = 10;
	$result_random_password = "";
	for ($i=0; $i < $length_random_password; $i++) { 
		$result_random_password .= substr($chars_for_random_password, random_int(0, $length_chars_for_random_password-1), 1);
	}
	/*Sending letter with new password to user's mail*/
	$result_sending = mail($email, "New password", $result_random_password);
	if (!$result_sending) {
		echo "Error sending new password";
		exit();
	}
	$random_password_hashed = password_hash($result_random_password, PASSWORD_BCRYPT);
	$sql = "UPDATE users SET pass = '{$random_password_hashed}' WHERE email = '{$email}' LIMIT 1;";
	$result = mysqli_query($link, $sql);
	if (!$result) {
		echo "Error in DB";
		//echo mysqli_errno($link);
		exit();
	}
	else {
		echo "Successful generate new password. Check your email. ";
		exit();
	}

?>