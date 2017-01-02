<?php
	session_start();
	require 'connect.php';
	$login = $_POST['email'];
	$password = $_POST['password'];
	function reporting($message)
	{
		unset($_SESSION['login_message']);
		$_SESSION['login_message'] = $message;
		header("Location: ../index.php");
		exit();
	}
	if (!isset($login) || !isset($password)) {
		reporting("Enter login and password!!!");
	}
	$sql = "SELECT count, name, email, type, pass FROM users WHERE email = '$login' LIMIT 1;";
	$sql_result = mysqli_query($link, $sql);
	if (!$sql_result) {
		reporting("DB error!!! Try again!!!");
	}
	if (($row = mysqli_fetch_assoc($sql_result)) == NULL) {
		reporting("User doesn't exist!!!");
	}
	$verify_password = $row['pass'];
	if (!password_verify($password, $verify_password)) {
		reporting("Incorrect password!!!");
	}
	session_start();
	$date = date("Y-m-d H:i:s");
	$sql = "UPDATE users SET time_last_activity = '{$date}' WHERE email = '{$login}';";
	$result = mysqli_query($link, $sql);
	if ($result === FALSE) {
		reporting("DB error!!! Try again!!!");
	}
	unset($_SESSION['type']);
	unset($_SESSION['login_message']);
	unset($_SESSION['login_success']);
	unset($_SESSION['email']);
	unset($_SESSION['user_id']);
	unset($_SESSION['username']);
	if ($row['type']) $_SESSION['type'] = true;
	else $_SESSION['type'] = false;
	$_SESSION['user_id'] = $row['count'];
	$_SESSION['login_success'] = true;
	$_SESSION['username'] = $row['name'];
	$_SESSION['email'] = $row['email'];
	mysqli_free_result($sql_result);
	header("Location: ../users.php");
	exit();
?>