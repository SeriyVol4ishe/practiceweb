<?php 
	session_start();
	require_once 'connect.php';
	$name = $_POST['name_surname'];
	$email = $_POST['email'];
	$sql = "SELECT email FROM users WHERE email = '$email' LIMIT 1;";
	$sql_result = mysqli_query($link, $sql); 
	if (!$sql_result) {
					session_start();
					unset($_SESSION['reg_message']);
					$_SESSION['reg_message'] = "Error!!! Try again!!!";
					mysqli_free_result($sql_result);
					header("Location: ../register.php");
	                                exit;
	}
	$count = mysqli_num_rows($sql_result);
	if ($count) {
					session_start();
					unset($_SESSION['reg_message']);
					$_SESSION['reg_message'] = "User exist!!!";
					mysqli_free_result($sql_result);
					header("Location: ../register.php");
	                                exit;
	}
	mysqli_free_result($sql_result);
	$password = $_POST['password_first'];
	$phone = $_POST['phone_number'];
	$prof = $_POST['especialidad'];
	switch( $prof ){
	    case 'Opcional':
	      $prof = $_POST['especialidad_opcional'];
	    break;
	}
	if(!empty($_FILES['userimg']['size'])) {
		if($_FILES['userimg']['size'] > (5 * 1024 * 1024)) {
					session_start();
					unset($_SESSION['reg_message']);
					$_SESSION['reg_message'] = "Size more than 5Mb";
					mysqli_free_result($sql_result);
					header("Location: ../register.php");
	                                exit;
		}
		$imageinfo = $_FILES['userimg']['type'];
		$arr = array('image/jpeg','image/gif','image/png', 'image/jpg');

		if(array_search($imageinfo,$arr)===FALSE) {
					session_start();
					unset($_SESSION['reg_message']);
					$_SESSION['reg_message'] = "File must be jpeg, gif, png or jpg!!!";
					mysqli_free_result($sql_result);
					header("Location: ../register.php");
	                                exit;
		}
		else {
			$upload_dir = '../userimages/';
			$imgname = $imgname.date('YmdHis').basename($_FILES['userimg']['name']);
			$imgname = htmlentities(stripslashes(strip_tags(trim($imgname))),ENT_QUOTES,'UTF-8');
			$upload_dir = $upload_dir.basename($imgname);
			$mov = move_uploaded_file($_FILES['userimg']['tmp_name'], $upload_dir);
			if($mov) {
				$password_hashed = password_hash($password, PASSWORD_BCRYPT);
				if ($password_hashed === FALSE) {
					session_start();
					unset($_SESSION['reg_ok']);
					$_SESSION['reg_ok'] = false;
					header("Location: ../index.php");
	                                exit;
				}
				$insert_sql = "INSERT INTO users (name, email, pass, phone, prof, userimg)" .
				"VALUES('{$name}', '{$email}', '{$password_hashed}', '{$phone}', '{$prof}', '{$imgname}');";
				$result = mysqli_query($link, $insert_sql);
				if ($result) {
					session_start();
					unset($_SESSION['reg_ok']);
					$_SESSION['reg_ok'] = true;
					header("Location: ../index.php");
	                                exit;
				}
				else {
					session_start();
					unset($_SESSION['reg_ok']);
					$_SESSION['reg_ok'] = false;
					header("Location: ../index.php");
	                                exit;
				} 
			}
			else {
				session_start();
				unset($_SESSION['reg_message']);
				$_SESSION['reg_message'] = "Image load error!!!";
				mysqli_free_result($sql_result);
				header("Location: ../register.php");
	                              exit;
			}
		}
	}
	else {
		$password_hashed = password_hash($password, PASSWORD_BCRYPT);
				if ($password_hashed === FALSE) {
					session_start();
					unset($_SESSION['reg_ok']);
					$_SESSION['reg_ok'] = false;
					header("Location: ../index.php");
	                                exit;
				}
		/*if (file_exists('../xml/users.xml')) {
			$xml_users = simplexml_load_file('../xml/users.xml');
			$xml_user = $xml_users->addChild('user');
			$xml_user_name = $xml_user->addChild('name', $name);
			$xml_user_email = $xml_user->addChild('email', $email);
			$xml_user_phone = $xml_user->addChild('phone', $phone);
			$xml_user_prof = $xml_user->addChild('prof', $prof);
			$xml_users->asXML('../xml/users.xml');
		}*/
		$date = date("Y-m-d H:i:s");
		$insert_sql = "INSERT INTO users (name, email, pass, time_last_activity, phone, prof)" .
		"VALUES('{$name}', '{$email}', '{$password_hashed}', '{$date}', '{$phone}', '{$prof}');";
		$result = mysqli_query($link, $insert_sql);
		if ($result) {
			session_start();
			unset($_SESSION['reg_ok']);
			$_SESSION['reg_ok'] = true;
			header("Location: ../index.php");
	                exit;
		}
		else {
			session_start();
			unset($_SESSION['reg_ok']);
			$_SESSION['reg_ok'] = false;
			header("Location: ../index.php");
	                exit;
		}
	}
?>	