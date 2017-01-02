<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="shortcut icon" href="../icons/favicon.png" type="image/png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
						<script type="text/javascript" src="./js/code.js"></script>
	<script src="../js/time.js"></script>
</head>
<body onload="startTime()">	
			<div class="navbar navbar-inverse navbar-fixed-top row" role="navigation">
				<div class="container">
					<!---->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="./index.php">Quiz</a>
					</div>
					<!---->
					<div class="navbar-collapse collapse">
						<!--Menu left-->
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<?php
										if ($_SESSION['login_success'] == true) {
											echo '<li><a href="../new_password.php">Change new password</a></li>';
											echo '<li><a href="../users.php">Users</a></li>';
											echo '<li><a href="../questions_enter_form.php">Questions enter</a></li>';
											echo '<li><a href="../questions_view.php">Questions view</a></li>';
											echo '<li><a href="../questions_edit_form.php">Questions edit</a></li>';
										}
										else {
											echo '<li><a href="#">You are guest, so login</a></li>';
										}
									?>
								</ul>
							</li>
							<li><a href="#about">About</a></li>
							<li><a href="#contact">Contacts</a></li>
						</ul>

						<!--Time marker-->
						<form class="navbar-form navbar-left">
							<p class="lead" id="txt"> </p>
						</form>

					<?php
					//session_start();
					if ($_SESSION['login_success'] == true){
							echo 	
							'<form class="navbar-form navbar-right" role="form" enctype="multipart/form-data" method="post" name="outlogin_form" action="php/outlogin.php">
								
								<div class="form-group">
									<p class="text-center lead">Hello, '; echo $_SESSION['username']; echo'</p>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-success">Get out</button>
								</div>

							</form>';
						}
						else {
							echo 	
								'<form class="navbar-form navbar-right" role="form" enctype="multipart/form-data" method="post" name="login_form" onSubmit="return validate_login()" action="php/login.php">
									<div class="form-group">
										<input type="text" placeholder="Email" class="form-control" name="email" onkeyup="validate_email(this)" onchange="validate_email(this)">
									</div>
									<div class="form-group">
										<input type="password" placeholder="Password" class="form-control" name="password" onkeyup="validate_password(this)" onchange="validate_password(this)">
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success">Login</button>
									</div>
									<!--Button for registration-->
									<a href="./register.php" class="btn btn-success">Registration</a>
									<a href="./password_return_form.php" class="btn btn-success">Recover password</a>
								</form>';
								if (isset($_SESSION['login_message'])) {
								echo		
									'<div class="navbar-form navbar-right">
										<p class="lead" style="font-size: small;">';  echo $_SESSION['login_message']; echo '</p>
									</div>';
								unset($_SESSION['login_message']);
								}
						}
					?>
					</div><!--/.navbar-collapse-->
				</div><!--Container for header-->
			</div>