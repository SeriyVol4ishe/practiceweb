<div class="container margin-block">
		<form class="form-horizontal container" enctype="multipart/form-data" method="post" id='reg_form' name='reg_form' onSubmit='return validate_form()' action="php/script_registration.php">
				<?php
					if ($_SESSION['reg_message']) {
						echo "<div class='form-group'>";
						echo "<label class='col-sm-3 control-label'> {$_SESSION['reg_message']} </label>";
						echo "</div>";
					}
					unset($_SESSION['reg_message']);
				?>
				<div class="form-group">
    				<label class="col-sm-3 col-md-3 col-xl-3 col-lg-3 control-label">Name and surname:</label>
    				<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8">
      				<input type="text" class="form-control" placeholder="Name and surname" name="name_surname" onkeyup="validate_name_surname(this)" onchange="validate_name_surname(this)" onblur="validate_name_surname(this)"  data-toggle="tooltip" data-placement="right" title="[a-zA-Z0-9]" onmouseover="_tooltip_over(this)" onmouseover="_tooltip_out(this)">
    				</div>
  				</div>
				<div class="form-group">
    				<label class="col-sm-3 col-md-3 col-xl-3 col-lg-3 control-label">Email:</label>
    				<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8">
      				<input type="email" class="form-control" placeholder="Email" name="email" onkeyup="validate_email(this)" onchange="validate_email(this)" onblur="validate_email(this)" data-toggle="tooltip" data-placement="right" title="[a-z0-9]@[a-z0-9].[a-z]" onmouseover="_tooltip_over(this)" onmouseover="_tooltip_out(this)">
    				</div>
  				</div>
				<div class="form-group">
    				<label class="col-sm-3 col-md-3 col-xl-3 col-lg-3 control-label">Password:</label>
    				<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8">
      				<input type="password" class="form-control" placeholder="Password" name="password_first" id="password_first" onkeyup="validate_password(this)" onchange="validate_password(this)" onblur="validate_password(this)" data-toggle="tooltip" data-placement="right" title="Symbols like in normal password" onmouseover="_tooltip_over(this)" onmouseover="_tooltip_out(this)">
    				</div>
  				</div>
				<div class="form-group">
    				<label class="col-sm-3 col-md-3 col-xl-3 col-lg-3 control-label">Confirm password:</label>
    				<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8">
      				<input type="password" class="form-control" placeholder="Confirm password" name="password_second" id="password_second" onkeyup="validate_confirm_password(this)" onchange="validate_confirm_password(this)" onblur="validate_confirm_password(this)" data-toggle="tooltip" data-placement="right" title="Symbols like in normal password" onmouseover="_tooltip_over(this)" onmouseover="_tooltip_out(this)">
    				</div>
  				</div>
				<div class="form-group">
    				<label class="col-sm-3 col-md-3 col-xl-3 col-lg-3 control-label">Phone number:</label>
    				<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8">
      				<input type="text" class="form-control" placeholder="Phone number" name="phone_number" onkeyup="validate_phone_number(this)" onblur="validate_phone_number(this)" data-toggle="tooltip" data-placement="right" title="[0-9]*9" onmouseover="_tooltip_over(this)" onmouseover="_tooltip_out(this)">
    				</div>
  				</div>
				<div class="form-group">
    				<label class="col-sm-3 col-md-3 col-xl-3 col-lg-3 control-label">Speciality:</label>
    				<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8">
    					<select class="form-control" name="especialidad" onchange="check(this.value)">
							<option ></option>
			            <option value="Opcional">Opcional</option>
			            <option value="Ingeniería del Software">Ingeniería del Software</option>
			            <option value="Ingeniería de Computadores">Ingeniería de Computadores</option>
			            <option value="Computación">Computación</option>
          			</select>
    				</div>
  				</div>
				<div class="form-group" id="dinamic" style="display: none;">
    				<label class="col-sm-3 col-md-3 col-xl-3 col-lg-3 control-label">Optional speciality:</label>
    				<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8">
      				<input type="text" class="form-control" placeholder="Optional speciality" name="especialidad_opcional" onkeyup="">
    				</div>
  				</div>
  				<div class="form-group">
    				<label class="col-sm-3 col-md-3 col-xl-3 col-lg-3 control-label">Phone number:</label>
    				<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8">
      				<input class="form-control" id="registroImg" type="file" name="userimg" accept="image/jpeg,image/png,image/gif">
  						<div class="img-rounded" width="304" height="236">
  							<output id="loadImg"></output>
  						</div>
    				</div>
  				</div>
				<div class="form-group">
    				<div class="col-sm-offset-3 col-sm-8 col-md-8 col-xl-8 col-lg-8">
      				<button type="submit" class="btn btn-default">Register</button>
    				</div>
  				</div>
		</form>
    <script type="text/javascript" src="./js/show_file.js"></script>
</div>