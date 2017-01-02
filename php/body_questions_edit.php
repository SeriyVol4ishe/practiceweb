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
			echo "<tr value='{$row["count"]}'>",'<form enctype="multipart/form-data" method="post" id="question_form" name="question_form" onSubmit="if (validate_question_form(this)) question_edit_ajax(this);" action="javascript:void(null);"',"><td>";
			echo '<div class = "form-group"><textarea rows="2" type="text" class="form-control" placeholder="" name="question" onkeyup="validate_question(this)" onchange="validate_question(this)" onblur="validate_question(this)"  data-toggle="tooltip" data-placement="right" title="Write a question correct" onmouseover="_tooltip_over(this)" onmouseover="_tooltip_out(this)">',$row['question'],'</textarea></div></td><td>';
			echo '<div class = "form-group"><input type="text" class="form-control" value="',$row['answer'],'" name="answer" onkeyup="validate_answer(this)" onchange="validate_answer(this)" onblur="validate_answer(this)" data-toggle="tooltip" data-placement="right" title="Write an answer" onmouseover="_tooltip_over(this)" onmouseover="_tooltip_out(this)"></div></td><td>';
			echo '<select class="form-control" name="subject">
					 <option value="',$row['subject'],'">',$row['subject'],'</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select></td><td>';
         echo '<select class="form-control" name="complexity">
					 <option value="',$row['complexity'],'">',$row['complexity'],'</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select></td><td>';
			echo $row['email'],"</td><td>";
			echo "<div class='input-group input-group-sm'>
						<!--<div class='input-group-btn'>-->
							<button class='row-remove' type='submit'>Edit</button>
						<!--</div>-->
					</div></td>";
			echo "</form></tr>";
		}
	}
	echo "</table></div>";
?>