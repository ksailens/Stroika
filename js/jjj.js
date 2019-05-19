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
var reEmail = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
var rePhone = /^(\+7|\+3)[0-9]{9,11}$/;
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

	if (!reEmail.test(UserEmail.value)) {
		UserEmail.style.border = "2px solid red";
		UserEmail.placeholder = 'Поле заполнено не верно!';
		alert('Формат электронной почты не верен');
		event.preventDefault();
		return false;
	}
	else{
		UserEmail.style.border = "2px solid green";
	}

	if (!rePhone.test(UserTel.value)) {
		UserTel.style.border = "2px solid red";
		UserTel.placeholder = 'Поле заполнено не верно!';
		alert('Формат телефона не верен');
		event.preventDefault();
		return false;
	}
	else{
		UserTel.style.border = "2px solid green";
	}

	return true;
}

function nonAutorizedMessage() {
	alert('Для совершения данного действия необходимо авторизоваться')
}