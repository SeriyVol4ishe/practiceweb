<?php
	session_start();
	require_once "connect.php";
	require_once "reporting.php";
	$question_id = $_POST['question'];
	if (!isset($question_id)) {
		mysqli_close($link);
		reporting("error deleting");
	}
	unset($response_message['status']);
	$sql = "DELETE FROM questions WHERE count = '{$question_id}';";
	$result = mysqli_query($link, $sql);
	if (!$result) {
		mysqli_close($link);
		reporting("error with DB");
		//reporting(mysqli_errno($link));
	}
	reporting("success");
?>