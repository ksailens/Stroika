<ul class="Vibor">

<form action="/avtoriz/logined"  onsubmit="return ValidAvtoriz();"   method="POST">
	<li style="float:left">
<br><h2 align=center>АВТОРИЗАЦИЯ</h2>

		
		<div>
		<br><br><b>Логин</b><br>
		<input type="text" id="log_avtoriz" name="log_avtoriz"  size="40"><br><br>
		<b>Пароль</b><br>
		<input type="password" id="pas_avtoriz" name="pas_avtoriz"  size="40"><br><br>
		<input class="inp" type="submit" value="АВТОРИЗОВАТЬСЯ">
		</div>

	</li>
</form>

<form action="/avtoriz/register"  onsubmit="return ValidRegister();" method="POST">
	<li style="float:right" style="margin-left: 50px;">
<br><h2 align=center>РЕГИСТРАЦИЯ</h2>


		<div>
		<br><br><b>Логин</b><br>
		<input type="text" id="log_reg" name="log_reg" size="40"><br><br>
		<b>Пароль</b><br>
		<input type="text" id="pas_reg" name="pas_reg" size="40"><br><br>
		<b>Email</b><br>
		<input type="text" id="em_reg" name="em_reg" size="40"><br><br>
		<b>Телефон</b><br>
		<input type="text" id="tel_reg" name="tel_reg" size="40"><br><br>
		<input class="inp" type="submit" value="ЗАРЕГИСТРИРОВАТЬСЯ">
		</div>
	</li>
</form>	

</ul>