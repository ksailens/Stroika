<div class="blockForm">
    <?php
    if ($_SESSION['LoginSystem'] === 'system_error') {
        echo "<script language='javascript'>alert('".tr::trans('register_error')."');</script>";
        $_SESSION['LoginSystem'] = null;
    }
    ?>
    <form action="/registration/register"  onsubmit="return ValidRegister();" method="POST">
        <li>
            <br><h2 align=center><? echo tr::trans('registration') ?></h2>
            <div>
                <br><br><b><? echo tr::trans('Login') ?></b><br>
                <input type="text" id="log_reg" name="log_reg" size="40"><br><br>
                <b><? echo tr::trans('Password') ?></b><br>
                <input type="password" id="pas_reg" name="pas_reg" size="40"><br><br>
                <b>Email</b><br>
                <input type="text" id="em_reg" name="em_reg" size="40"><br><br>
                <b><? echo tr::trans('tel') ?></b><br>
                <input type="text" placeholder="+79781234567" id="tel_reg" name="tel_reg" size="40"><br><br>
                <input class="inp upperCase" type="submit" value="<? echo tr::trans('register') ?>">
            </div>
        </li>
    </form>

</div>