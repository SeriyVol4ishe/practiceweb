<?php
	session_start();
	if ($_SESSION['reg_ok']===true) {echo "<script>alert('Successful registration!!!');</script>"; unset($_SESSION['reg_ok']);}
        else if ($_SESSION['reg_ok']===false) {echo "<script>alert('Error in registration!!!');</script>"; unset($_SESSION['reg_ok']);}
	
	include './php/head.php';
	include './php/body_def.php';
	include './php/foot.php';
?>