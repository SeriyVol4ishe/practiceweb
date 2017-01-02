<div class="container margin-block">
		<form class="form-horizontal container" enctype="multipart/form-data" method="post" id='new_password_form' name='new_password_form' onSubmit='if (validate_new_password(this)) change_new_password(this);' action="javascript:void(null);">
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
    				<div class="col-sm-offset-3 col-sm-8 col-md-8 col-xl-8 col-lg-8">
      				<button type="submit" class="btn btn-default">Confirm password</button>
    				</div>
  				</div>
		</form>
</div>