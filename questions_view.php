<?php
	session_start();
	require './php/connect.php';
	require './php/head.php';
	if ($_SESSION['login_success'] != true) {
		header("Location: ../index.php");
                                exit;
	}
	require './php/body_questions_view.php';
	require './php/foot.php';
?>