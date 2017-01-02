function search_phone_email() {
	//Ajax method
	var result = "Email or phone is not found in DB";
	var email = document.getElementById("searching_email").value;
	var phone = document.getElementById("searching_phone").value;
	//alert("../php/searching_phone_email.php?email=" + email + "&phone=" + phone);
	//alert(phone);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
					alert(this.responseText);
				}
			};
			xmlhttp.open("GET", "../php/searching_phone_email.php?email=" + email + "&phone=" + phone, true);
			xmlhttp.send();
}

function show_info_user(info_array) {
	//Method that show information about founded person if function search_phone_email()
}

/*Function to search email in DB if user wanna return password*/
function search_email() {
	//Ajax method
	var email = document.getElementById("searching_email").value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
					alert(this.responseText);
				}
			};
			xmlhttp.open("GET", "../php/script_password_return.php?email=" + email, true);
			xmlhttp.send();
}