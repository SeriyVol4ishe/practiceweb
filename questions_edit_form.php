<?php
	session_start();
	require './php/connect.php';
	require './php/head.php';
	if ($_SESSION['login_success'] != true) {
		header("Location: ../index.php");
                                exit;
	}
	require './php/body_questions_edit.php';
?>
<!--<div class="container margin-block">
	<div class="">
	  <h1>Привет, мир!</h1>
	  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	  <p><a class="btn btn-primary btn-lg" role="button">Узнать больше</a></p>
	  <div class="progress progress-striped active">
		  <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
		    <span class="">45% Complete</span>
		  </div>
		</div>
	</div>
</div>-->
<?php
	require './php/foot.php';
?>