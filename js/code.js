function validate_form(){
	var valid = true;
	var reg_name = /^[A-Za-z]+\s[A-Za-z]+$/i,
		reg_password = /^[a-z0-9_-]{6,18}$/i,
		reg_phone_number = /^[0-9]{9}$/i,
		reg_email = /[A-Za-z]+\d{3}@ikasle.ehu.(es|eus)/i,
		//reg_email = /[A-Za-z0-9]@/i,
		name = document.reg_form.name_surname.value,
		email = document.reg_form.email.value,
		password_first = document.reg_form.password_first.value,
		password_second = document.reg_form.password_second.value,
		phone_number = document.reg_form.phone_number.value,
		espec = document.reg_form.especialidad.value,
		espec_optional = document.reg_form.especialidad_opcional.value;
	if (!reg_name.test(name) || !reg_phone_number.test(phone_number) || !reg_email.test(email) || !reg_password.test(password_first) ||
		name == false || phone_number == false || email == false || 
		password_first != password_second || 
		password_second == false || password_first == false){
		valid = false; 
	}
	if (espec == false){
		valid = false;
	}
	else if (espec == "Opcional"){
		if (espec_optional == false) valid = false;
	}
	//alert(valid);
	return valid;
}

function check(text){
	if (text == "Opcional") document.getElementById("dinamic").style.display = "block";
   else document.getElementById("dinamic").style.display = "none";
}

/*Validate name and surname*/
function validate_name_surname(name_surname) {
	var valid = true;
	var reg_name = /[A-Za-z]+\s[A-Za-z]+/i;
	var name = name_surname.value;
	var formGroup = $(name_surname).parents('.form-group');
	if (reg_name.test(name)) {
		formGroup.addClass('has-success').removeClass('has-error');
	}
	else {
		valid = false;
		formGroup.addClass('has-error').removeClass('has-success');
	}
	return valid;
}

/*Validate email*/
function validate_email(email) {
	var valid = true;
	//var reg_email = /[A-Za-z]+\d{3}@ikasle.ehu.(es|eus)/i;
	var reg_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/i;
	var _email = email.value;
	var formGroup = $(email).parents('.form-group');
	if (reg_email.test(_email)) {
		formGroup.addClass('has-success').removeClass('has-error');
	}
	else {
		valid = false;
		formGroup.addClass('has-error').removeClass('has-success');
	}
	return valid;
}

/*Validate password*/
function validate_password(password) {
	var valid = true;
	var reg_password = /^[a-z0-9_-]{6,18}$/i;
	var _password = password.value;
	var formGroup = $(password).parents('.form-group');
	if (reg_password.test(_password) && password != false) {
		formGroup.addClass('has-success').removeClass('has-error');
	}
	else {
		valid = false;
		formGroup.addClass('has-error').removeClass('has-success');
	}
	return valid;
}

/*Validate confirm password*/
function validate_confirm_password(confirm_password) {
	var valid = true;
	var password_first = document.getElementById("password_first").value;
	var password_second = document.getElementById("password_second").value;
	var formGroup = $(confirm_password).parents('.form-group');
	if (password_first == password_second && password_first != false) {
		formGroup.addClass('has-success').removeClass('has-error');
	}
	else {
		valid = false;
		formGroup.addClass('has-error').removeClass('has-success');
	}
	return valid;
}

/*Validate phone number*/
function validate_phone_number(phone_number) {
	var valid = true;
	var reg_phone_number = /^[0-9]{9}$/i;
	var _phone_number = phone_number.value;
	var formGroup = $(phone_number).parents('.form-group');
	if (reg_phone_number.test(_phone_number)) {
		formGroup.addClass('has-success').removeClass('has-error');
	}
	else {
		valid = false;
		formGroup.addClass('has-error').removeClass('has-success');
	}
	return valid;
}

/*Tooltip onmouseover*/
function _tooltip_over(object) {
	$(object).tooltip('show');
}

/*Tooltip onmouseout*/
function _tooltip_out(object) {
	$(object).tooltip('hide');
}

/*Validate login*/
function validate_login() {
	var valid = true,
	email = document.login_form.email.value,
	password_first = document.login_form.password.value,
	//reg_email = /[A-Za-z]+\d{3}@ikasle.ehu.(es|eus)/i,
	reg_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/i,
	reg_password = /^[a-z0-9_-]{6,18}$/i;
	if (!reg_email.test(email) || !reg_password.test(password_first))
		valid = false;
	//alert(valid);
	return valid;
}

/*******************************************************/
/*Questions' form*/


/*Validate question*/
function validate_question(question) {
	var valid = true;
	var reg_question = /^[A-Za-z0-9]{1}/i;
	var _question = question.value;
	var formGroup = $(question).parents('.form-group');
	if (reg_question.test(_question)) {
		formGroup.addClass('has-success').removeClass('has-error');
	}
	else {
		valid = false;
		formGroup.addClass('has-error').removeClass('has-success');
	}
	return valid;
}

/*Validate answer*/
function validate_answer(answer) {
	var valid = true;
	var reg_answer = /^[A-Za-z0-9]{1}/i;
	var _answer = answer.value;
	var formGroup = $(answer).parents('.form-group');
	if (reg_answer.test(_answer)) {
		formGroup.addClass('has-success').removeClass('has-error');
	}
	else {
		valid = false;
		formGroup.addClass('has-error').removeClass('has-success');
	}
	return valid;
}

/*Validate question form*/
function validate_question_form(form) {
	var valid = true;
	var _question = form.question.value;
	var _answer = form.answer.value;
	var reg_question = /^[A-Za-z0-9]{1}/i;
	var reg_answer = /^[A-Za-z0-9]{1}/i;
	if (!reg_answer.test(_answer) || !reg_question.test(_question)) {
		valid = false;
	}
	return valid;
}

/*Function for sending question with ajax*/
function question_send_ajax(question_form) {
	var form_data = $(question_form).serialize(); //собераем все данные из формы
	$.ajax({
		type: "POST", //Метод отправки
		url: "../php/questions_reg.php", //путь до php фаила отправителя
		data: form_data,
		datatype: "json",
		success: function(data) {
		//код в этом блоке выполняется при успешной отправке сообщения
		if (data.status == 'success') {
			$(question_form).trigger( 'reset' );
			alert("Success!!!");
		}
		else {
			alert("Fail, try again!!!");
			//alert(data.status);
			//alert(data);
		}
		
	}});
}


/*Function that remove questions from table and DB with ajax*/
function remove_question_ajax(button) {
	//alert(table.rows);
	var question_id = $(button).closest('tr').attr('value');
	//alert(question_id);
	$.ajax({
		type: "POST",
		url: "../php/script_delete_question.php",
		data: {'question': question_id},
		datatype: "json",
		success: function(data) {
			if (data.status == 'success') {
				$(button).closest('tr').remove().promise().done(function function_name() {
					// body...
					var table = document.getElementById("question-table");
					if (table.rows.length == 1) {
						$('<tr><td>No questions</td></tr>').insertAfter(document.getElementById('main-row'));
					}
				});
				//alert("Success!!!");
				 
				/*alert(table.rows.length);
				*/
			}
			else {
				alert("Fail, try again!!!");
				//alert(data.status);
			}
		}
	});//end of ajax
}

/*Function for saving changes in questions with ajax*/
function question_edit_ajax(question_form) {
	var question_id = $(question_form).closest('tr').attr('value');
	var form_data = $(question_form).serialize()+ '&question_id=' + question_id; //собераем все данные из формы
	//alert(form_data);
	$.ajax({
		type: "POST", //Метод отправки
		url: "../php/script_questions_edit.php", //путь до php фаила отправителя
		data: form_data,
		datatype: "json",
		success: function(data) {
		//код в этом блоке выполняется при успешной отправке сообщения
		if (data.status == 'success') {
			//$(question_form).trigger( 'reset' );
			alert("Success!!!");
		}
		else {
			alert("Fail, try again!!!");
			//alert(data.status);
		}
		
	}});
}

/*Function that remove users from table and DB*/
function remove_user_ajax(button) {
	//alert(table.rows);
	var user_id = $(button).closest('tr').attr('value');
	//alert(question_id);
	$.ajax({
		type: "POST",
		url: "../php/script_delete_user.php",
		data: {'user': user_id},
		datatype: "json",
		success: function(data) {
			if (data.status == 'success') {
				$(button).closest('tr').remove().promise().done(function function_name() {
					// body...
					var table = document.getElementById("question-table");
					if (table.rows.length == 1) {
						$('<tr><td>No users</td></tr>').insertAfter(document.getElementById('main-row'));
					}
				});
				//alert("Success!!!");
				//alert(table.rows.length);
			}
			else {
				alert("Fail, try again!!!");
				//alert(data.status);
			}
		}
	});//end of ajax
}

/*Validate new recovered password*/
function validate_new_password(form) {
	var password_first = form.password_first.value;
	var password_second = form.password_second.value;
	var reg_password = /^[a-z0-9_-]{6,18}$/i;
	var valid = true;
	if (password_first != password_second || password_first == false || password_second == false || !reg_password.test(password_first)) {
		valid = false;
	}
	//alert(valid);
	return valid;
}

/*Writing new password in DB with ajax*/
function change_new_password(new_password_form) {
	//alert("dfthstrhwrhrshsrthsrthsr");
	var new_password_form_data = $(new_password_form).serialize();
	//alert(new_password_form_data);
	$.ajax({
		type: "POST", //Метод отправки
		url: "../php/script_new_password.php", //путь до php фаила отправителя
		data: new_password_form_data,
		datatype: "json",
		success: function(data) {
		//код в этом блоке выполняется при успешной отправке сообщения
		if (data.status == 'success') {
			$(new_password_form).trigger( 'reset' );
			alert("Success!!!");
		}
		else {
			alert("Fail, try again!!!");
			//alert(data.status);
		}
		
	}});
}