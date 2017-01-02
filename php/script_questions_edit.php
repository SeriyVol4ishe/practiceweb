<?php
	session_start();
	require_once 'connect.php';
	require_once "reporting.php";
	$email = $_SESSION['email'];
	$user_id = $_SESSION['user_id'];
	$question_id = $_POST['question_id'];
	$question = $_POST['question'];
	$answer = $_POST['answer'];
	$subject = $_POST['subject'];
	$complexity = $_POST['complexity'];
	if (!isset($question_id, $question, $answer, $subject, $complexity)) {		
		mysqli_close($link);
		reporting("error entering");
	}
	$date = date("Y-m-d H:i:s");
	$sql = "UPDATE questions SET question = '{$question}', answer = '{$answer}', subject = '{$subject}', complexity = '{$complexity}', date = '{$date}' WHERE count = '{$question_id}' LIMIT 1;";
	$result = mysqli_query($link, $sql);
	if (!$result) {
		mysqli_close($link);
		reporting("error with DB");
	}
	else {
		mysqli_close($link);
		reporting("success");
	}
?>