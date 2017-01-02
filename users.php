<?php
	session_start();
	require './php/connect.php';
	require './php/head.php';
	if ($_SESSION['login_success'] != true) {
		header("Location: ../index.php");
                                exit;
	}
	echo "<div class='container margin-block'> <table class='table_blur'>";
	echo "<tr id='main-row'>
				<td>Name</td>
				<td>Email</td>
				<td>Phone</td>
				<td>Speciality</td>
				<td>Image</td>
				<td></td>
			</tr>";
	$sql = "SELECT count, name, email, phone, prof, userimg FROM users;";
	$result = mysqli_query($link, $sql) or die(mysqli_error());
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr value = '{$row["count"]}'><td>";
		echo $row['name'],"</td><td>";
		echo $row['email'],"</td><td>";
		echo $row['phone'],"</td><td>";
		echo $row['prof'],"</td>";
		if ($row['userimg'] != NULL) {echo "<td><img class='userimg' src='userimages/{$row['userimg']}'></td>";}
		else {echo "<td>Image None</td>";}
		if ($_SESSION['type']) {
			echo "<td><div class='input-group input-group-sm'>
						<!--<div class='input-group-btn'>-->
							<button class='row-remove' type='button' onclick='remove_user_ajax(this)'>Delete</button>
						<!--</div>-->
					</div></td>";
		}
		echo "</tr>";
	}
	echo "</table> </div>";
	require './php/foot.php';
?>