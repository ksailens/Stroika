function ValidAvtoriz () {
var UserLogin=document.getElementById('log_avtoriz');
var UserPass=document.getElementById('pas_avtoriz');

	if (!UserLogin.value) {
		UserLogin.style.border = "2px solid red";
		UserLogin.placeholder = 'Поле заполнено не верно!';
		event.preventDefault();
		return false;
	}
	else{
		UserLogin.style.border = "2px solid green";
	}

	if (!UserPass.value) {
		UserPass.style.border = "2px solid red";
		UserPass.placeholder = 'Поле заполнено не верно!';
		event.preventDefault();
		return false;
	}
	else{
		UserPass.style.border = "2px solid green";
	}

	return true;
}

function ValidRegister () {
var UserLogin=document.getElementById('log_reg');
var UserPass=document.getElementById('pas_reg');
var UserEmail=document.getElementById('em_reg');
var UserTel=document.getElementById('tel_reg');

	if (!UserLogin.value) {
		UserLogin.style.border = "2px solid red";
		UserLogin.placeholder = 'Поле заполнено не верно!';
		event.preventDefault();
		return false;
	}
	else{
		UserLogin.style.border = "2px solid green";
	}

	if (!UserPass.value) {
		UserPass.style.border = "2px solid red";
		UserPass.placeholder = 'Поле заполнено не верно!';
		event.preventDefault();
		return false;
	}
	else{
		UserPass.style.border = "2px solid green";
	}

	if (!UserEmail.value) {
		UserEmail.style.border = "2px solid red";
		UserEmail.placeholder = 'Поле заполнено не верно!';
		event.preventDefault();
		return false;
	}
	else{
		UserEmail.style.border = "2px solid green";
	}

	if (!UserTel.value) {
		UserTel.style.border = "2px solid red";
		UserTel.placeholder = 'Поле заполнено не верно!';
		event.preventDefault();
		return false;
	}
	else{
		UserTel.style.border = "2px solid green";
	}

	return true;
}