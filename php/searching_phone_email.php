<?php
	require 'connect.php';
	$email = $_GET['email'];
	$phone = $_GET['phone'];
	if ($email != "") {
		$sql = "SELECT name, email, phone, prof, userimg FROM users WHERE email = '$email' LIMIT 1;";
	}
	elseif ($phone != "") {
		$sql = "SELECT name, email, phone, prof, userimg FROM users WHERE phone = '$phone' LIMIT 1;";
	}
	else {
		echo "Shit!!!";
		exit();
	}
	$sql_result = mysqli_query($link, $sql);
	if (!$sql_result) {
		echo "Email or phone is not found in DB";
		exit();
	}
	$count = mysqli_num_rows($sql_result);
	if ($count) {
		echo "Congratulations, user exist!!!";
		exit();
	}
	echo "Email or phone is not found in DB";
?>