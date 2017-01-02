<?php
	session_start();
	require_once "connect.php";
	require_once "reporting.php";
	$user_id = $_POST['user'];
	if (!isset($user_id)) {
		mysqli_close($link);
		reporting("error deleting");
	}
	$pre_sql = "SELECT email FROM users WHERE count = '{$user_id}' LIMIT 1;";
	$pre_result = mysqli_query($link, $pre_sql);
	if (!$pre_result) {
		mysqli_close($link);
		reporting("error with DB");
		//reporting(mysqli_errno($link));
	}
	if (($row = mysqli_fetch_assoc($pre_result)) == NULL) {
		mysqli_close($link);
		reporting("error with DB");
		//reporting(mysqli_errno($link));
	}
	if ($row['email'] == $_SESSION['email']) {
		mysqli_close($link);
		reporting("you can't delete yourself");
	}
	$sql = "DELETE FROM users WHERE count = '{$user_id}' && email <> '{$_SESSION["email"]}';";
	$result = mysqli_query($link, $sql);
	if (!$result) {
		mysqli_close($link);
		reporting("error with DB");
		//reporting(mysqli_errno($link));
	}
	mysqli_close($link);
	reporting("success");
?>