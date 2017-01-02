
<div class="container margin-block text-center">
	<h1>Sergey Dabula</h1>
	<h1>Student</h1>
	<?php
		if ($_SESSION['login_success'] == false) {
			echo 	
				'<script src="../js/searching_phone_email.js"></script>
				<script>
					function validate()
					{
						var result = true;
						if (validate_email(document.getElementById("searching_email")) || validate_phone_number(document.getElementById("searching_phone"))) 
							result = true;
						else result = false;
						return result;
					}
				</script>
				<div class="navbar-form" id="search_phone_email" id="searching_phone_email">
					<div class="form-group">
						<input type="text" placeholder="Email" class="form-control" id="searching_email" onkeyup="validate_email(this)" onchange="validate_email(this)">
					</div>
					<div class="form-group">
						<input type="text" placeholder="Phone" class="form-control" id="searching_phone" onkeyup="validate_phone_number(this)" onchange="validate_phone_number(this)">
					</div>
					<div class="form-group">
						<button class="btn btn-success" onclick="if (validate()) {search_phone_email()};">Search</button>	
					</div>			
				</div>';			
		}
	?>
</div>	