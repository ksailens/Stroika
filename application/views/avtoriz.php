<div class="blockForm">
    <?php
        if ($_SESSION['LoginSystem'] === 'system_error') {
            echo "<script language='javascript'>alert('Неверный логин или пароль');</script>";
            $_SESSION['LoginSystem'] = null;
        }
    ?>


    <form action="/avtoriz/logined"  onsubmit="return ValidAvtoriz();"   method="POST">
        <li>
            <br><h2 align=center>АВТОРИЗАЦИЯ</h2>
            <div>
                <br><br><b>Логин</b><br>
                <input type="text" id="log_avtoriz" name="log_avtoriz"  size="40"><br><br>
                <b>Пароль</b><br>
                <input type="password" id="pas_avtoriz" name="pas_avtoriz"  size="40"><br><br>
                <input class="inp" type="submit" value="АВТОРИЗОВАТЬСЯ">
            </div>
            <br><b>или</b><br>

            <a class="inp forAutorize" href="/registration">Зарегистрироваться</a>
        </li>
    </form>

</div>