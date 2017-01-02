<?php
	session_start();
	echo "<div class='container margin-block'> <table class='table_blur' id='question-table'>";
	if ($_SESSION['type']) {
		$sql = "SELECT count, email, question, answer, subject, complexity FROM questions;";
	}
	else {
		$sql = "SELECT count, email, question, answer, subject, complexity FROM questions WHERE email = '{$_SESSION['email']}';";
	}
	$result = mysqli_query($link, $sql) or die(mysqli_error());
	echo "<tr id='main-row'>
				<td>Question</td>
				<td>Answer</td>
				<td>Subject</td>
				<td>Complexity</td>
				<td>Author's email</td>
				<td></td>
			</tr>";
	if (mysqli_num_rows($result) == 0) {
		echo "<tr><td>No questions</td></tr>";
	}
	else{
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr value='{$row["count"]}'><td>";
			echo $row['question'],"</td><td>";
			echo $row['answer'],"</td><td>";
			echo $row['subject'],"</td><td>";
			echo $row['complexity'],"</td><td>";
			echo $row['email'],"</td><td>";
			echo "<div class='input-group input-group-sm'>
						<!--<div class='input-group-btn'>-->
							<button class='row-remove' type='button' onclick='remove_question_ajax(this)'>Delete</button>
						<!--</div>-->
					</div></td>";
			echo "</tr>";
		}
	}
	echo "</table></div>";
?>