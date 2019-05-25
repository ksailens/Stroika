<div class="blockForm">
    <?php
        if ($_SESSION['LoginSystem'] === 'system_error') {
            echo "<script language='javascript'>alert('".tr::trans('error_login')."');</script>";
            $_SESSION['LoginSystem'] = null;
        }
    ?>


    <form action="/avtoriz/logined"  onsubmit="return ValidAvtoriz();"   method="POST">
        <li>
            <br><h2 class="upperCase" align=center><? echo tr::trans('Authorization') ?></h2>
            <div>
                <br><br><b><? echo tr::trans('Login') ?></b><br>
                <input type="text" id="log_avtoriz" name="log_avtoriz"  size="40"><br><br>
                <b><? echo tr::trans('Password') ?></b><br>
                <input type="password" id="pas_avtoriz" name="pas_avtoriz"  size="40"><br><br>
                <input class="inp upperCase" type="submit" value="<? echo tr::trans('log_in') ?>">
            </div>
            <br><b><? echo tr::trans('or') ?></b><br>

            <a class="inp forAutorize upperCase" href="/registration"><? echo tr::trans('register') ?></a>
        </li>
    </form>

</div>