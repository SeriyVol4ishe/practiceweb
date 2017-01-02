<?php
	session_start();
	require 'connect.php';
	require_once "reporting.php";
	//lab1/php/questions_reg.php?question=awdawd&answer=vyvytv&subject=12&complexity=1
	$email = $_SESSION['email'];
	$user_id = $_SESSION['user_id'];
	$question = $_POST['question'];
	$answer = $_POST['answer'];
	$subject = $_POST['subject'];
	$complexity = $_POST['complexity'];
	if (!isset($question, $answer, $subject, $complexity)) {
		mysqli_close($link);
		reporting("error entering");
	}
	$date = date("Y-m-d H:i:s");
	$sql = "INSERT INTO questions (email, question, answer, subject, complexity, date)" .
			"VALUES('{$email}', '{$question}', '{$answer}', '{$subject}', '{$complexity}', '{$date}');";
	$result = mysqli_query($link, $sql);
	if (!$result) {
		mysqli_close($link);
		reporting("error with DB");
	}
	/*
	if (file_exists('../xml/questions.xml')) {
		$xml_questions = simplexml_load_file('../xml/questions.xml');
		$xml_question = $xml_questions->addChild('question');
			$xml_question->addAttribute('complexity', $complexity);
			$xml_question->addAttribute('subject', $subject);
		$xml_question_text = $xml_question->addChild('questionText');
			$xml_question_text->addChild('p',$question);
		$xml_question_answer = $xml_question->addChild('correctAnswer');
			$xml_question_answer->addChild('value', $answer);
		$xml_questions->asXML('../xml/questions.xml');
	}*/
	mysqli_close($link);
	reporting("success");
?>