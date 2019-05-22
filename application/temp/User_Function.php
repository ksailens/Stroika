<?php
require_once 'application/config/Db.php';
class User_Function{

    public static function User_test_drive($data){

        if (isset($_SESSION['Login'])) {

            echo '<ul class="Content_block_Menu">';
            echo '<li><a href="/user/my_buy">ЗАЯВКИ НА ПОКУПКУ</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2></h2>';


            echo '<br><table cellspacing="0">';
            echo '<tr><th>Название</th><th>Состояние заявки</th><th>Телефон</th><th>Управление</th></tr>';
            while($res=$data->fetch(PDO::FETCH_BOTH)){
                echo '<tr>';

                require_once 'application/config/Db.php';
                $db=Db::getConnection();
                $str="Select *from Catalog where id='".$res['Avto']."'";
                $result=$db->prepare($str);
                $result->execute();

                while($res2=$result->fetch(PDO::FETCH_BOTH)){
                    echo '<td> '.$res2['Nazv'].' </td>';

                    if ($res['Sost']=='0') {echo '<td>Заявка ещё не рассмотрена</td>';}
                    if ($res['Sost']=='1') {echo '<td>Заявка принята</td>';}
                    if ($res['Sost']=='2') {echo '<td>Отказано в заявке</td>';}
                    echo '<td> '.$res['Tel'].' </td>';
                    echo '<td>   <a href="/tovar/info/'.$res2['id'].'"> <img src="/photo/info.png" width="22px"></a>  <a href="/user/delete_test_drive1/'.$res['id'].'"> <img src="/photo/del.png" width="25px"></a> </td>';

                    echo '</tr>';
                }}
            echo '</table>';

        }}




    public static function User_buy_material($data){
        if (isset($_SESSION['Login'])) {
            $sum_coin = null;

            if ($_SESSION['LoginSystem']==='system_registr') {
                echo "<script language='javascript'>alert('Пользователь успешно зарегистрирован');</script>";
                $_SESSION['LoginSystem'] = null;
            }

            echo '<ul class="Content_block_Menu">';
            echo '<li><a href="/user/my_buy">ЗАЯВКИ НА ПОКУПКУ</a></li>';
            echo '<li><a href="/user/my_basket">КОРЗИНА</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2>Заявки на покупку</h2>';
            if (!$data->fetch(PDO::FETCH_ASSOC)) {
                echo '<p class="emptyBasket">Заявок пока нет</p>';
            } else {

                require_once 'application/config/Db.php';
                $db=Db::getConnection();
                $string="Select *from Buy where Login='".$_SESSION['Login']."'";
                $container=$db->prepare($string);
                $container->execute();

                echo '<br><table cellspacing="0">';
                echo '<tr><th>Заявка №</th><th>Общая стоимость</th><th>Дата создания</th><th>Состояние заявки</th><th>Управление</th></tr>';
                while($res=$container->fetch(PDO::FETCH_BOTH)){
                    echo '<tr>';
                    $date=date_create($res['Datas']);

                    echo '<td> '.$res['OrderId'].' </td>';
                    echo '<td> '.$res['totalCost'].' руб.</td>';
                    echo '<td> '.date_format($date,"H:i:s d.m.Y").' </td>';
                    if ($res['Sost']=='0') {echo '<td>Заявка ещё не рассмотрена</td>';}
                    if ($res['Sost']=='1') {echo '<td>Заявка принята</td>';}
                    if ($res['Sost']=='2') {echo '<td>Отказано в заявке</td>';}

                    echo '<td>   <a href="/user/orderInfo/'.$res['OrderId'].'"> <img src="/photo/info.png" width="22px"></a>  <a href="/user/delete_buy1/'.$res['OrderId'].'"> <img src="/photo/del.png"  width="25px"></a> </td>';

                    echo '</tr>';
                }
                echo '</table>';
                echo '<br>';
            }


            echo '</div>';
        }

    }

    public static function User_basket($data){

        if (isset($_SESSION['Login'])) {
            $sum_coin = null;
            echo '<ul class="Content_block_Menu">';
            echo '<li><a href="/user/my_buy">ЗАЯВКИ НА ПОКУПКУ</a></li>';
            echo '<li><a href="/user/my_basket">КОРЗИНА</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2>Корзина</h2>';

            if (!$data->fetch(PDO::FETCH_ASSOC)) {
                echo '<p class="emptyBasket">Корзина пока пуста</p>';
            } else {
                require_once 'application/config/Db.php';
                $db=Db::getConnection();
                $string="Select *from Basket where id_user='".$_SESSION['userId']."' and sost=0";
                $container=$db->prepare($string);
                $container->execute();


                echo '<br><table cellspacing="0">';
                echo '<tr><th>Название</th><th>Цена</th><th>Количество</th><th>Всего</th><th>Управление</th></tr>';
                while($res=$container->fetch(PDO::FETCH_BOTH)){
                    echo '<tr>';

                    require_once 'application/config/Db.php';
                    $db=Db::getConnection();
                    $str="Select *from Catalog where id='".$res['id_tovar']."'";
                    $result=$db->prepare($str);
                    $result->execute();
                    while($res2=$result->fetch(PDO::FETCH_BOTH)){
                        echo '<td> '.$res2['Nazv'].' </td>';
                        echo '<td> '.$res2['Coin'].' руб.</td>';
                        if ($res['sost']=='0') {
                            $sum_coin += $res['kolvo']*$res2['Coin'];
                        }
                        echo '<td> '.$res['kolvo'].' шт.</td>';
                        echo '<td> '.$res['kolvo']*$res2['Coin'].' руб.</td>';


                        if ($res['Sost']=='0') {echo '<td>Заявка ещё не рассмотрена</td>';}
                        if ($res['Sost']=='1') {echo '<td>Заявка принята</td>';}
                        if ($res['Sost']=='2') {echo '<td>Отказано в заявке</td>';}
                        echo '<td>   <a href="/tovar/info/'.$res2['id'].'"> <img src="/photo/info.png" width="22px"></a>  <a href="/user/delete_basketItem/'.$res['id'].'"> <img src="/photo/del.png"  width="25px"></a> </td>';

                        echo '</tr>';
                    }}
                echo '</table>';
                echo '<br>';
                echo '<hr style="background: black; width: 100%; height: 1px;">';
                echo '<p style="text-align: left">Общая стоимость заказа:  '.(float)$sum_coin.' рублей</p>';
                echo '<a class="sendMail" href="/user/create_order/'.$sum_coin.'">Сформировать заявку</a>';
            }



            echo '</div>';
        }

    }

    public static function User_orderInfo($data){

        if (isset($_SESSION['Login'])) {
            $sum_coin = null;
            echo '<ul class="Content_block_Menu">';
            echo '<li><a href="/user/my_buy">ЗАЯВКИ НА ПОКУПКУ</a></li>';
            echo '<li><a href="/user/my_basket">КОРЗИНА</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2>Информация о заявке</h2>';
            echo '<br><table cellspacing="0">';
            echo '<tr><th>Название</th><th>Цена</th><th>Количество</th><th>Всего</th><th>Управление</th></tr>';
            while($res=$data->fetch(PDO::FETCH_BOTH)){
                echo '<tr>';

                require_once 'application/config/Db.php';
                $db=Db::getConnection();
                $str="Select *from Catalog where id='".$res['id_tovar']."'";
                $result=$db->prepare($str);
                $result->execute();
                while($res2=$result->fetch(PDO::FETCH_BOTH)){
                    echo '<td> '.$res2['Nazv'].' </td>';
                    echo '<td> '.$res2['Coin'].' руб.</td>';
                        $sum_coin += $res['kolvo']*$res2['Coin'];
                    echo '<td> '.$res['kolvo'].' шт.</td>';
                    echo '<td> '.$res['kolvo']*$res2['Coin'].' руб.</td>';
                    echo '<td>   <a href="/tovar/info/'.$res2['id'].'"> <img src="/photo/info.png" width="22px"></a></td>';

                    echo '</tr>';
                }}
            echo '</table>';
            echo '<br>';
            echo '<hr style="background: black; width: 100%; height: 1px;">';
            echo '<p style="text-align: left">Общая стоимость заявки:  '.(float)$sum_coin.' рублей</p>';
            echo '</div>';
        }

    }



    public static function User($data){


        if ($_SESSION['Login']=="Admin") {

            echo '<ul class="Content_block_Menu">';
            echo '<li><a href="/user/all">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a></li>';
            echo '<li><a href="/user/news">НОВОСТИ И АКЦИИ</a></li>';
            echo '<li><a href="/user/send_buy">ЗАЯВКИ НА ПОКУПКУ</a></li>';
            echo '<li><a href="/user/production">КАТАЛОГ ПРОДУКЦИИ</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2>Список пользователей</h2>';


            echo '<br><table cellspacing="0">';
            echo '<tr><th>Логин</th><th>Пароль</th><th>Email</th><th>Телефон</th><th>Управление</th></tr>';
            while($res=$data->fetch(PDO::FETCH_BOTH)){
                echo '<tr><td>'.$res['Names'].'</td><td>'.$res['Pass'].'</td><td>'.$res['Emails'].'</td><td>'.$res['Tels'].'</td><td> <a href="/user/delete/'.$res['id'].'"> <img src="/photo/korz.png" width="30px">  </a>   </td></tr>';
            }


            echo '</table>';

            echo '</div>';
        }
        elseif ($_SESSION['Login']=="Moder") {

            echo '<ul class="Content_block_Menu">';
            echo '<li><a href="/user/all">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a></li>';
            echo '<li><a href="/user/news">НОВОСТИ И АКЦИИ</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2>Список пользователей</h2>';


            echo '<br><table cellspacing="0">';
            echo '<tr><th>Логин</th><th>Пароль</th><th>Email</th><th>Телефон</th><th>Управление</th></tr>';
            while($res=$data->fetch(PDO::FETCH_BOTH)){
                echo '<tr><td>'.$res['Names'].'</td><td>'.$res['Pass'].'</td><td>'.$res['Emails'].'</td><td>'.$res['Tels'].'</td><td> <a href="/user/delete/'.$res['id'].'"> <img src="/photo/korz.png" width="30px">  </a>   </td></tr>';
            }


            echo '</table>';

            echo '</div>';
        }
        else{
            echo '<ul class="Content_block_Menu">';
            echo '<li><a href="/user/my_buy">ЗАЯВКИ НА ПОКУПКУ</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2>Заявки на покупку</h2>';
            echo '</div>';
        }}






    public static function Tovar_kind($data){
        while($res=$data->fetch(PDO::FETCH_BOTH)){
            echo '<li>';
            echo '<img src="'.$res['Photo1'].'">	';
            echo '<span>₽ '.$res['Coin'].'</span>';
            if (isset($_SESSION['Login'])) {
            }
            echo '<b>'.$res['Nazv'].'</b>';
            echo '<p>'.mb_substr($res['Texts'], 0, 80, 'UTF-8') . '...'.'</p>';
            if (isset($_SESSION['Login'])) {
                echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST">';
                echo '<input class="number3" name="kolvo" min="1" max="99" id="number" type="number" value="1">';
                echo '<input onclick="dropToBasket()" class="dm1" style="cursor: pointer" type="submit" value="Купить">';
                echo '</form>';
            }
            else{echo '<a onclick="nonAutorizedMessage()" class="dm1">Купить</a>';}
            echo '<a href="/tovar/info/'.$res['id'].'" class="dm2">Детали</a>';
            echo '</li>';
        }
    }

    public static function Tovar($data){
        while($res=$data->fetch(PDO::FETCH_BOTH)){
            echo '<li>';
            echo '<img src="'.$res['Photo1'].'">	';
            echo '<span>₽ '.$res['Coin'].'</span>';
            if (isset($_SESSION['Login'])) {
            }
            echo '<b>'.$res['Nazv'].'</b>';
            echo '<p>'.mb_substr($res['Texts'], 0, 80, 'UTF-8') . '...'.'</p>';
            if (isset($_SESSION['Login'])) {
                echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST">';
                echo '<input class="number3" name="kolvo" min="1" max="99" id="number" type="number" value="1">';
                echo '<input onclick="dropToBasket()" class="dm1" style="cursor: pointer" type="submit" value="Купить">';
                echo '</form>';
            }
            else{echo '<a onclick="nonAutorizedMessage()" class="dm1">Купить</a>';};
            echo '<a href="/tovar/info/'.$res['id'].'" class="dm2">Детали</a>';
            echo '</li>';
        }
    }

    public static function News_info($data){
        while($res=$data->fetch(PDO::FETCH_BOTH)){
            $date=date_create($res['Datas']);

            echo '<br><h2 align=center>'.$res['Nazv'].'</h2><br><ul>';
            echo '<li style="width: 170px;margin-left:15px;"><img src="/photo/im1.jpg"><span>'.date_format($date,"H:i:s d.m.Y").'</span></li>';
            echo '<li><img src="/photo/im2.jpg"><span>Запись добавлена: '.$res['Users'].'</span></li>';
            if ($res['Photos'] !== '/photo/news/') {
                echo '<img class="photoss" src="'.$res['Photos'].'">';
            } else {
                echo '<img class="photoss" src="../../photo/noimage.png">';
            }
            echo '<div><br>';
            echo '<p>'.$res['Texts'].'</p></div></ul>	';
        }
    }


    public static function News($data){
        while($res=$data->fetch(PDO::FETCH_BOTH)){
            $date=date_create($res['Datas']);
            if ($res['Photos'] !== '/photo/news/') {
                echo '<li><img class="news_img" height="300px" width="570px" src="'.$res['Photos'].'"><div class="news_wrap">';
            } else {
                echo '<li><img class="news_img"  height="300px" width="570px" src="photo/noimage.png"><div class="news_wrap">';
            }
            echo '<h3>'.$res['Nazv'].'</h3>';
            echo '<ul class="Info_News">';
            echo '<li style="margin-left:0;"><img src="photo/im1.jpg"><span>'.date_format($date,"H:i:s d.m.Y").'</span></li>';
            echo '<li><img src="photo/im2.jpg"><span>'.$res['Users'].'</span></li>';
            echo '</ul>';
            echo '<p class="www">'.mb_substr($res['Texts'], 0, 50, 'UTF-8') . '...'.'<p>';
            echo '<div></div>';
            echo '<a class="www1" href="news/info/'.$res['id'].'">Подробнее</a>';
            echo '</div></li>';
        }
    }
    public static function IndexNews(){
        require_once 'application/config/Db.php';
        $db=Db::getConnection();
        $str="Select *from News ORDER BY Datas DESC limit 3";
        $result=$db->prepare($str);
        $result->execute();

        while($res=$result->fetch(PDO::FETCH_BOTH))
        {
            $date=date_create($res['Datas']);
            echo '<li><div class="IndexNewsBlock">';
            echo '<h3>'.$res['Nazv'].'</h3>';
            echo '<ul class="Info_IndexNews">';
            echo '<li><img src="photo/im1.jpg"><span>'.date_format($date,"H:i:s d.m.Y").'</span></li>';
            echo '</ul>';
            echo '<p>'.mb_substr($res['Texts'], 0, 50, 'UTF-8') . '...'.'<p>';
            echo '<a href="news/info/'.$res['id'].'">Подробнее</a>';
            echo '</div></li>';
        }
    }

    public static function Index($data){
        require_once 'application/config/Db.php';

        $db=Db::getConnection();
        $str="Select *from Catalog where Type=1 limit 3";
        $result=$db->prepare($str);
        $result->execute();

        echo '<ul class="Content_block_Tovar">';
        echo '<div class="Info">НОВЫЕ ИЗДЕЛИЯ > Инструменты</div>';
        while($res=$result->fetch(PDO::FETCH_BOTH)){
            echo '<li>';
            echo '<img src="'.$res['Photo1'].'">	';
            echo '<span>₽ '.$res['Coin'].'</span>';
            if (isset($_SESSION['Login'])) {
            }
            echo '<b>'.$res['Nazv'].'</b>';
            echo '<p>'.mb_substr($res['Texts'], 0, 35, 'UTF-8') . '...'.'</p>';
            if (isset($_SESSION['Login'])) {
                echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST">';
                    echo '<input class="number3" name="kolvo" min="1" max="99" id="number" type="number" value="1">';
                    echo '<input onclick="dropToBasket()" class="dm1" style="cursor: pointer" type="submit" value="Купить">';
                echo '</form>';
            }
            else{echo '<a onclick="nonAutorizedMessage()" class="dm1">Купить</a>';}
            echo '<a href="/tovar/info/'.$res['id'].'" class="dm2">Детали</a>';
            echo '</li>';
        }
        echo '</ul>';

        $str="Select *from Catalog where Type=2 limit 3";
        $result=$db->prepare($str);
        $result->execute();

        echo '<ul class="Content_block_Tovar">';
        echo '<div class="Info">НОВЫЕ ИЗДЕЛИЯ > Строительные материалы</div>';
        while($res=$result->fetch(PDO::FETCH_BOTH)){
            echo '<li>';
            echo '<img src="'.$res['Photo1'].'">	';
            echo '<span>₽ '.$res['Coin'].'</span>';
            if (isset($_SESSION['Login'])) {
            }
            echo '<b>'.$res['Nazv'].'</b>';
            echo '<p>'.mb_substr($res['Texts'], 0, 35, 'UTF-8') . '...'.'</p>';
            if (isset($_SESSION['Login'])) {
                echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST">';
                echo '<input class="number3" name="kolvo" min="1" max="99" id="number" type="number" value="1">';
                echo '<input onclick="dropToBasket()" class="dm1" style="cursor: pointer" type="submit" value="Купить">';
                echo '</form>';
            }
            else{echo '<a onclick="nonAutorizedMessage()" class="dm1">Купить</a>';}
            echo '<a href="/tovar/info/'.$res['id'].'" class="dm2">Детали</a>';
            echo '</li>';
        }
        echo '</ul>';

        $str="Select *from Catalog where Type=3 limit 3";
        $result=$db->prepare($str);
        $result->execute();

        echo '<ul class="Content_block_Tovar">';
        echo '<div class="Info">НОВЫЕ ИЗДЕЛИЯ > Отделочные материалы</div>';
        while($res=$result->fetch(PDO::FETCH_BOTH)){
            echo '<li>';
            echo '<img src="'.$res['Photo1'].'">	';
            echo '<span>₽ '.$res['Coin'].'</span>';
            if (isset($_SESSION['Login'])) {
            }
            echo '<b>'.$res['Nazv'].'</b>';
            echo '<p>'.mb_substr($res['Texts'], 0, 35, 'UTF-8') . '...'.'</p>';
            if (isset($_SESSION['Login'])) {
                echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST">';
                echo '<input class="number3" name="kolvo" min="1" max="99" id="number" type="number" value="1">';
                echo '<input onclick="dropToBasket()" class="dm1" style="cursor: pointer" type="submit" value="Купить">';
                echo '</form>';
            }
            else{echo '<a onclick="nonAutorizedMessage()" class="dm1">Купить</a>';}
            echo '<a href="/tovar/info/'.$res['id'].'" class="dm2">Детали</a>';
            echo '</li>';
        }
        echo '</ul>';

        $str="Select *from Catalog where Type=4 limit 3";
        $result=$db->prepare($str);
        $result->execute();

        echo '<ul class="Content_block_Tovar">';
        echo '<div class="Info">НОВЫЕ ИЗДЕЛИЯ > Крепежи</div>';
        while($res=$result->fetch(PDO::FETCH_BOTH)){
            echo '<li>';
            echo '<img src="'.$res['Photo1'].'">	';
            echo '<span>₽ '.$res['Coin'].'</span>';
            if (isset($_SESSION['Login'])) {
            }
            echo '<b>'.$res['Nazv'].'</b>';
            echo '<p>'.mb_substr($res['Texts'], 0, 35, 'UTF-8') . '...'.'</p>';
            if (isset($_SESSION['Login'])) {
                echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST">';
                echo '<input class="number3" name="kolvo" min="1" max="99" id="number" type="number" value="1">';
                echo '<input onclick="dropToBasket()" class="dm1" style="cursor: pointer" type="submit" value="Купить">';
                echo '</form>';
            }
            else{echo '<a onclick="nonAutorizedMessage()" class="dm1">Купить</a>';}
            echo '<a href="/tovar/info/'.$res['id'].'" class="dm2">Детали</a>';
            echo '</li>';
        }
        echo '</ul>';

        $str="Select *from Catalog where Type=5 limit 3";
        $result=$db->prepare($str);
        $result->execute();

        echo '<ul class="Content_block_Tovar">';
        echo '<div class="Info">НОВЫЕ ИЗДЕЛИЯ > Пиломатериалы</div>';
        while($res=$result->fetch(PDO::FETCH_BOTH)){
            echo '<li>';
            echo '<img src="'.$res['Photo1'].'">	';
            echo '<span>₽ '.$res['Coin'].'</span>';
            if (isset($_SESSION['Login'])) {
            }
            echo '<b>'.$res['Nazv'].'</b>';
            echo '<p>'.mb_substr($res['Texts'], 0, 35, 'UTF-8') . '...'.'</p>';
            if (isset($_SESSION['Login'])) {
                echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST">';
                echo '<input class="number3" name="kolvo" min="1" max="99" id="number" type="number" value="1">';
                echo '<input onclick="dropToBasket()" class="dm1" style="cursor: pointer" type="submit" value="Купить">';
                echo '</form>';
            }
            else{echo '<a onclick="nonAutorizedMessage()" class="dm1">Купить</a>';}
            echo '<a href="/tovar/info/'.$res['id'].'" class="dm2">Детали</a>';
            echo '</li>';
        }
        echo '</ul>';
    }


    public static function materials_info($data){
        while($res=$data->fetch(PDO::FETCH_BOTH)){
            $date=date_create($res['Datas']);
            echo '<div class="News_info_main">';
            echo '<br><h2 align=center>'.$res['Nazv'].'</h2><br><ul>';
            echo '<li style="width: 170px;margin-left:15px;"><img src="/photo/im1.jpg"><span>'.date_format($date,"H:i:s d.m.Y").'</span></li>';
            echo '<li><img src="/photo/im2.jpg"><span>Запись добавлена: '.$res['Users'].'</span></li>';

            echo '<div style=" width:700px; height: 500px;" id="slider" class="slider_wrap">';
            if ($res['Photo1']!="") {echo '<img style=" width:700px; height: 500px;" src="'.$res['Photo1'].'" alt="" />';}
            if ($res['Photo2']!="") {echo '<img style=" width:700px; height: 500px;" src="'.$res['Photo2'].'" alt="" />';}
            if ($res['Photo3']!="") {echo '<img style=" width:700px; height: 500px;" src="'.$res['Photo3'].'" alt="" />';}
            echo '</div>';

            echo '<br><br><table style="margin:0 auto;" cellspacing="0">';
            echo '<tr><td>Название</td><td>'.$res['Nazv'].'</td></tr>';
            echo '<tr><td>В наличии</td><td>'.$res['Nalich'].'</td></tr>';
            echo '<tr><td>Страна</td><td>'.$res['Country'].'</td></tr>';
            echo '<tr><td>Цвет</td><td>'.$res['Colour'].'</td></tr>';
            echo '<tr><td>Материал</td><td>'.$res['Material'].'</td></tr>';
            echo '<tr><td>Цена</td><td>'.$res['Coin'].'</td></tr>';

            if ($res['Type']=='1') {echo '<tr><td>Тип</td><td>Инструменты</td></tr>';}
            if ($res['Type']=='2') {echo '<tr><td>Тип</td><td>Строительные материалы</td></tr>';}
            if ($res['Type']=='3') {echo '<tr><td>Тип</td><td>Отделочные материалы</td></tr>';}
            if ($res['Type']=='4') {echo '<tr><td>Тип</td><td>Крепеж</td></tr>';}
            if ($res['Type']=='5') {echo '<tr><td>Тип</td><td>Пиломатериалы</td></tr>';}
            if ($res['Type']=='6') {echo '<tr><td>Тип</td><td>Другое</td></tr>';}
            echo '</table><br>';
            echo '<div><br>';
            echo '<p>'.$res['Texts'].'</p></div></ul>';
            echo '<br>';
            if (isset($_SESSION['Login'])) {
                echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST">';
                echo '<input onclick="dropToBasket()" class="dm4" class="dm1" style="cursor: pointer" type="submit" value="Купить">';
                echo '<input class="number4" name="kolvo" min="1" max="99" id="number" type="number" value="1">';
                echo '</form>';
            }
            else{echo '<a onclick="nonAutorizedMessage()" class="dm4" class="dm1">Купить</a>';}
            echo '</div>';

            require_once 'application/config/Db.php';
            $currentid = $res['id'];
            $countryname = $res['Country'];
            $colourname = $res['Colour'];
            $db = Db::getConnection();
            $str = "Select *from Catalog where Country='$countryname' and Colour='$colourname' and not id='$currentid' limit 3";
            $result = $db->prepare($str);
            $result->execute();

            echo '<div class="Content_block_Tovar Content_block_Noleft">';
            echo '<div class="Info">ТАКЖЕ РЕКОМЕНДУЕМ ВАМ:</div>';
            while ($res = $result->fetch(PDO::FETCH_BOTH)) {
                echo '<li>';
                echo '<img src="' . $res['Photo1'] . '">	';
                echo '<span>₽ ' . $res['Coin'] . '</span>';
                if (isset($_SESSION['Login'])) {
                }
                echo '<b>' . $res['Nazv'] . '</b>';
                echo '<p>' . mb_substr($res['Texts'], 0, 80, 'UTF-8') . '...' . '</p>';
                if (isset($_SESSION['Login'])) {
                    echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST">';
                    echo '<input class="number3" name="kolvo" min="1" max="99" id="number" type="number" value="1">';
                    echo '<input onclick="dropToBasket()" class="dm1" style="cursor: pointer" type="submit" value="Купить">';
                    echo '</form>';
                } else {
                    echo '<a onclick="nonAutorizedMessage()" class="dm1">Купить</a>';
                }
                echo '<a href="/tovar/info/' . $res['id'] . '" class="dm2">Детали</a>';
                echo '</li>';
            }
            echo '</div>';

        }}


    public static function Admin_test_drive($data){
        if ($_SESSION['Login']=="Admin") {
            echo '<ul class="Content_block_Menu">';
            echo '<li><a href="/user/all">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a></li>';
            echo '<li><a href="/user/news">НОВОСТИ И АКЦИИ</a></li>';
            echo '<li><a href="/user/send_buy">ЗАЯВКИ НА ПОКУПКУ</a></li>';
            echo '<li><a href="/user/production">КАТАЛОГ ПРОДУКЦИИ</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2></h2>';


            echo '<br><table cellspacing="0">';
            echo '<tr><th>Название</th><th>Логин</th><th>Состояние заявки</th><th>Телефон</th><th>Действие</th><th>Статус завки</th></tr>';
            while($res=$data->fetch(PDO::FETCH_BOTH)){
                echo '<tr>';

                require_once 'application/config/Db.php';
                $db=Db::getConnection();
                $str="Select *from Catalog where id='".$res['Avto']."'";
                $result=$db->prepare($str);
                $result->execute();
                while($res2=$result->fetch(PDO::FETCH_BOTH)){
                    echo '<td> '.$res2['Nazv'].' </td>';
                    echo '<td> '.$res['Login'].' </td>';



                    if ($res['Sost']=='0') {echo '<td>Заявка ещё не рассмотрена</td>';}
                    if ($res['Sost']=='1') {echo '<td>Заявка принята</td>';}
                    if ($res['Sost']=='2') {echo '<td>Отказано в заявке</td>';}
                    echo '<td> '.$res['Tel'].' </td>';
                    echo '<td>   <a href="/tovar/info/'.$res2['id'].'"> <img src="/photo/info.png" width="22px"></a>  <a href="/user/delete_test_drive2/'.$res['id'].'"> <img src="/photo/del.png" width="25px"></a> </td>';
                    echo '<td>   <a style="color:green;" href="/user/yes2/'.$res['id'].'">Принять</a>  <a style="color:red;" href="/user/noy2/'.$res['id'].'">Отклонить</a> </td>';
                    echo '</tr>';
                }}
            echo '</table>';
        }
    }


    public static function Admin_news_correct($data){
        if ($_SESSION['Login']=="Admin") {
            while($res=$data->fetch(PDO::FETCH_BOTH)){
                echo '<ul class="Content_block_Menu">';
                echo '<li><a href="/user/all">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a></li>';
                echo '<li><a href="/user/news">НОВОСТИ И АКЦИИ</a></li>';
                echo '<li><a href="/user/send_buy">ЗАЯВКИ НА ПОКУПКУ</a></li>';
                echo '<li><a href="/user/production">КАТАЛОГ ПРОДУКЦИИ</a></li>';
                echo '</ul>';
                echo '<div class="Content_block_Tovar">';
                echo '<h2>Новая запись</h2>';


                echo '<form action="/user/New_News_Update/'.$res['id'].'" method="POST"  enctype="multipart/form-data">';
                echo '<br><br><b>Заголовок</b><br>';
                echo '<input type="text" id="News_zagol1" name="News_zagol1" value="'.$res['Nazv'].'" size="40"><br><br>';
                echo '<b>Текст новости (акции)</b><br>';
                echo '<textarea style="border:1px solid silver;" id="News_Text1" name="News_Text1" class="tinymce" rows="10" cols="85" name="text">'.$res['Texts'].'</textarea><br><br>';
                echo '<img height="300px" width="600px" src="'.$res['Photos'].'"><br><br>';
                echo '<input type="file" name="filename_update1"><br><br>';
                echo '<input style="padding: 5px 10px;cursor:pointer;border:1px solid silver;" type=submit value=Загрузить фото></form>';
                echo '</form>';
            }
        }
        elseif ($_SESSION['Login']=="Moder") {
            while($res=$data->fetch(PDO::FETCH_BOTH)){
                echo '<ul class="Content_block_Menu">';
                echo '<li><a href="/user/all">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a></li>';
                echo '<li><a href="/user/news">НОВОСТИ И АКЦИИ</a></li>';
                echo '</ul>';
                echo '<div class="Content_block_Tovar">';
                echo '<h2>Новая запись</h2>';


                echo '<form action="/user/New_News_Update/'.$res['id'].'" method="POST"  enctype="multipart/form-data">';
                echo '<br><br><b>Заголовок</b><br>';
                echo '<input type="text" id="News_zagol1" name="News_zagol1" value="'.$res['Nazv'].'" size="40"><br><br>';
                echo '<b>Текст новости (акции)</b><br>';
                echo '<textarea style="border:1px solid silver;" id="News_Text1" name="News_Text1" class="tinymce" rows="10" cols="85" name="text">'.$res['Texts'].'</textarea><br><br>';
                echo '<img height="300px" width="600px" src="'.$res['Photos'].'"><br><br>';
                echo '<input type="file" name="filename_update1"><br><br>';
                echo '<input style="padding: 5px 10px;cursor:pointer;border:1px solid silver;" type=submit value=Загрузить фото></form>';
                echo '</form>';
            }
        }
    }



    public static function Admin_news_add($data){
        if ($_SESSION['Login']=="Admin") {

            echo '<ul class="Content_block_Menu">';
            echo '<li><a href="/user/all">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a></li>';
            echo '<li><a href="/user/news">НОВОСТИ И АКЦИИ</a></li>';
            echo '<li><a href="/user/send_buy">ЗАЯВКИ НА ПОКУПКУ</a></li>';
            echo '<li><a href="/user/production">КАТАЛОГ ПРОДУКЦИИ</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar News_Add">';
            echo '<h2>Новая запись</h2>';


            echo '<form action="/user/New_News_Add" method="POST"  enctype="multipart/form-data">';
            echo '<br><br><b>Заголовок</b><br>';
            echo '<input type="text" id="News_zagol" name="News_zagol" size="40"><br><br>';
            echo '<b>Текст новости (акции)</b><br>';
            echo '<textarea style="border:1px solid silver;" id="News_Text" name="News_Text" class="tinymce" rows="10" cols="85" name="text"></textarea><br><br>';
            echo '<input type="file" name="filename"><br><br>';
            echo '<input style="padding: 5px 10px;cursor:pointer;border:1px solid silver;" type=submit value=Загрузить фото></form>';
            echo '</form>';
            echo '</div>';
        }
        elseif ($_SESSION['Login']=="Moder") {

            echo '<ul class="Content_block_Menu">';
            echo '<li><a href="/user/all">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a></li>';
            echo '<li><a href="/user/news">НОВОСТИ И АКЦИИ</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar News_Add">';
            echo '<h2>Новая запись</h2>';


            echo '<form action="/user/New_News_Add" method="POST"  enctype="multipart/form-data">';
            echo '<br><br><b>Заголовок</b><br>';
            echo '<input type="text" id="News_zagol" name="News_zagol" size="40"><br><br>';
            echo '<b>Текст новости (акции)</b><br>';
            echo '<textarea style="border:1px solid silver;" id="News_Text" name="News_Text" class="tinymce" rows="10" cols="85" name="text"></textarea><br><br>';
            echo '<input type="file" name="filename"><br><br>';
            echo '<input style="padding: 5px 10px;cursor:pointer;border:1px solid silver;" type=submit value=Загрузить фото></form>';
            echo '</form>';
            echo '</div>';
        }
    }


    public static function Admin_news($data){
        if ($_SESSION['Login']=="Admin") {

            echo '<ul class="Content_block_Menu">';
            echo '<li><a href="/user/all">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a></li>';
            echo '<li><a href="/user/news">НОВОСТИ И АКЦИИ</a></li>';
            echo '<li><a href="/user/send_buy">ЗАЯВКИ НА ПОКУПКУ</a></li>';
            echo '<li><a href="/user/production">КАТАЛОГ ПРОДУКЦИИ</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2>Список новостей</h2>';


            echo '<br><table cellspacing="0">';
            echo '<tr><th>Название</th><th>Текст</th><th>Дата</th><th>Пользователь</th><th>Управление</th></tr>';
            while($res=$data->fetch(PDO::FETCH_BOTH)){
                $date=date_create($res['Datas']);

                echo '<tr><td>'.$res['Nazv'].'</td><td>'.mb_substr($res['Texts'], 0, 100, 'UTF-8') . '...'.'</td><td>'.date_format($date,"H:i:s d.m.Y").'</td><td>'.$res['Users'].'</td><td>   <a href="/news/info/'.$res['id'].'"> <img src="/photo/info.png" width="22px"></a>   <a href="/user/correct_news/'.$res['id'].'"> <img src="/photo/red.png" width="25px"></a>    <a href="/user/delete_news/'.$res['id'].'"> <img src="/photo/del.png" width="25px"></a>   </td></tr>';
            }



            echo '</table><br>';
            echo '<a style="color:black;margin-left:700px;border:1px solid silver;padding: 5px 10px;" href="/user/news_add">Добавить новость</a>';
            echo '</div>';
        }
        elseif ($_SESSION['Login']=="Moder") {

            echo '<ul class="Content_block_Menu">';
            echo '<li><a href="/user/all">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a></li>';
            echo '<li><a href="/user/news">НОВОСТИ И АКЦИИ</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2>Список новостей</h2>';


            echo '<br><table cellspacing="0">';
            echo '<tr><th>Название</th><th>Текст</th><th>Дата</th><th>Пользователь</th><th>Управление</th></tr>';
            while($res=$data->fetch(PDO::FETCH_BOTH)){
                $date=date_create($res['Datas']);
                echo '<tr><td>'.$res['Nazv'].'</td><td>'.mb_substr($res['Texts'], 0, 100, 'UTF-8') . '...'.'</td><td>'.date_format($date,"H:i:s d.m.Y").'</td><td>'.$res['Users'].'</td><td>   <a href="/news/info/'.$res['id'].'"> <img src="/photo/info.png" width="22px"></a>   <a href="/user/correct_news/'.$res['id'].'"> <img src="/photo/red.png" width="25px"></a>    <a href="/user/delete_news/'.$res['id'].'"> <img src="/photo/del.png" width="25px"></a>   </td></tr>';
            }



            echo '</table><br>';
            echo '<a style="color:black;margin-left:700px;border:1px solid silver;padding: 5px 10px;" href="/user/news_add">Добавить новость</a>';
            echo '</div>';
        }
    }

    public static function Admin_Catalog($data){
        if ($_SESSION['Login']=="Admin") {

            echo '<ul class="Content_block_Menu">';
            echo '<li><a href="/user/all">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a></li>';
            echo '<li><a href="/user/news">НОВОСТИ И АКЦИИ</a></li>';
            echo '<li><a href="/user/send_buy">ЗАЯВКИ НА ПОКУПКУ</a></li>';
            echo '<li><a href="/user/production">КАТАЛОГ ПРОДУКЦИИ</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2>Список товаров</h2>';
            echo '<br>';
            echo '<a style="color:black;margin-left:700px;border:1px solid silver;padding: 5px 10px;" href="/user/material_add">Добавить товар</a>';
            echo '<br>';

            echo '<br><table cellspacing="0">';
            echo '<tr><th>Название</th><th>Текст</th><th>Наличие</th><th>Страна</th><th>Цвет</th><th>Управление</th></tr>';
            while($res=$data->fetch(PDO::FETCH_BOTH)){
                echo '<tr><td>'.$res['Nazv'].'</td><td>'.mb_substr($res['Texts'], 0, 100, 'UTF-8') . '...'.'</td><td>'.$res['Nalich'].'</td><td>'.$res['Country'].'</td><td>'.$res['Colour'].'</td><td>   <a href="/tovar/info/'.$res['id'].'"> <img src="/photo/info.png" width="22px"></a>  <a href="/user/correct_materials/'.$res['id'].'"> <img src="/photo/red.png" width="25px"></a>    <a href="/user/delete_material/'.$res['id'].'"> <img src="/photo/del.png" width="25px"></a>   </td></tr>';
            }

            echo '</table><br>';
            echo '</div>';
        }
    }




    public static function Admin_material_Correct($data){
        if ($_SESSION['Login']=="Admin") {
            while($res=$data->fetch(PDO::FETCH_BOTH))   {
                echo '<ul class="Content_block_Menu">';
                echo '<li><a href="/user/all">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a></li>';
                echo '<li><a href="/user/news">НОВОСТИ И АКЦИИ</a></li>';
                echo '<li><a href="/user/send_buy">ЗАЯВКИ НА ПОКУПКУ</a></li>';
                echo '<li><a href="/user/production">КАТАЛОГ ПРОДУКЦИИ</a></li>';
                echo '</ul>';
                echo '<div class="Content_block_Tovar">';
                echo '<h2>Редактирование</h2>';



                echo '<form action="/user/New_Material_Update/'.$res['id'].'" method="POST"  enctype="multipart/form-data">';
                echo '<br><b>Название</b><br>';
                echo '<input value="'.$res['Nazv'].'" type="text" id="Material_nazv" name="Material_nazv" size="40">';

                echo '<br><br><b>Наличие</b><br>';
                echo '<input value="'.$res['Nalich'].'" type="text" id="Material_nalich" name="Material_nalich" size="40">';

                echo '<br><br><b>Цена</b><br>';
                echo '<input value="'.$res['Coin'].'" type="text" id="Material_coin" name="Material_coin" size="40">';

                echo '<br><br><b>Страна</b><br>';
                echo '<input value="'.$res['Country'].'" type="text" id="Material_country" name="Material_country" size="40">';

                echo '<br><br><b>Цвет</b><br>';
                echo '<input value="'.$res['Colour'].'" type="text" id="Material_colour" name="Material_colour" size="40">';

                echo '<br><br><b>Материал</b><br>';
                echo '<input value="'.$res['Material'].'" type="text" id="Material_material" name="Material_material" size="40"><br><br>';

                echo '<b>Тип</b><br>';
                echo '<select style="border:1px solid silver;" id="Material_korpus" name="Material_korpus">';
                if ($res['Type']=='1') { echo '<option selected value="1">Инструменты</option>';}else{ echo '<option value="1">Инструменты</option>';}
                if ($res['Type']=='2') { echo '<option selected value="2">Строй.материалы</option>';}else{ echo '<option value="2">Строй.материалы</option>';}
                if ($res['Type']=='3') { echo '<option selected value="3">Отделочные мат-лы</option>';}else{ echo '<option value="3">Отделочные мат-лы</option>';}
                if ($res['Type']=='4') { echo '<option selected value="4">Крепежи</option>';}else{ echo '<option value="4">Крепежи</option>';}
                if ($res['Type']=='5') { echo '<option selected value="5">Пиломатериалы</option>';}else{ echo '<option value="5">Пиломатериалы</option>';}
                if ($res['Type']=='6') { echo '<option selected value="6">Другое</option>';}else{ echo '<option value="6">Другое</option>';}
                echo '</select><br><br>';

                echo '<b>Подтип</b><br>';
                echo '<select style="border:1px solid silver;" id="Material_Subtype" name="Material_Subtype">';
                if ($res['Type']=='1') {
                    if ($res['Subtype']=='1') { echo '<option selected value="1">Кисти и валики</option>';}else{ echo '<option value="1">Кисти и валики</option>';}
                    if ($res['Subtype']=='2') { echo '<option selected value="2">Ножовки и пилы</option>';}else{ echo '<option value="2">Ножовки и пилы</option>';}
                    if ($res['Subtype']=='3') { echo '<option selected value="3">Буры и сверла</option>';}else{ echo '<option value="3">Буры и сверла</option>';}
                    if ($res['Subtype']=='4') { echo '<option selected value="4">Лопаты</option>';}else{ echo '<option value="4">Лопаты</option>';}
                    if ($res['Subtype']=='5') { echo '<option selected value="5">Шпателя</option>';}else{ echo '<option value="5">Шпателя</option>';}
                }
                if ($res['Type']=='2') {
                    if ($res['Subtype']=='1') { echo '<option selected value="1">Цемент и добавки</option>';}else{ echo '<option value="1">Цемент и добавки</option>';}
                    if ($res['Subtype']=='2') { echo '<option selected value="2">Песок и щебень</option>';}else{ echo '<option value="2">Песок и щебень</option>';}
                    if ($res['Subtype']=='3') { echo '<option selected value="3">Газобетон</option>';}else{ echo '<option value="3">Газобетон</option>';}
                    if ($res['Subtype']=='4') { echo '<option selected value="4">Утеплители</option>';}else{ echo '<option value="4">Утеплители</option>';}
                    if ($res['Subtype']=='5') { echo '<option selected value="5">Кровля</option>';}else{ echo '<option value="5">Кровля</option>';}
                }
                if ($res['Type']=='3') {
                    if ($res['Subtype']=='1') { echo '<option selected value="1">Клей</option>';}else{ echo '<option value="1">Клей</option>';}
                    if ($res['Subtype']=='2') { echo '<option selected value="2">Краски и лаки</option>';}else{ echo '<option value="2">Краски и лаки</option>';}
                    if ($res['Subtype']=='3') { echo '<option selected value="3">Герметики и пена</option>';}else{ echo '<option value="3">Герметики и пена</option>';}
                    if ($res['Subtype']=='4') { echo '<option selected value="4">Плитка и сантехника</option>';}else{ echo '<option value="4">Плитка и сантехника</option>';}
                    if ($res['Subtype']=='5') { echo '<option selected value="5">Ламинат</option>';}else{ echo '<option value="5">Ламинат</option>';}
                }
                if ($res['Type']=='4') {
                    if ($res['Subtype']=='1') { echo '<option selected value="1">Саморезы</option>';}else{ echo '<option value="1">Саморезы</option>';}
                    if ($res['Subtype']=='2') { echo '<option selected value="2">Гвозди</option>';}else{ echo '<option value="2">Гвозди</option>';}
                    if ($res['Subtype']=='3') { echo '<option selected value="3">Шпильки</option>';}else{ echo '<option value="3">Шпильки</option>';}
                    if ($res['Subtype']=='4') { echo '<option selected value="4">Гайки</option>';}else{ echo '<option value="4">Гайки</option>';}
                    if ($res['Subtype']=='5') { echo '<option selected value="5">Шайбы</option>';}else{ echo '<option value="5">Шайбы</option>';}
                }
                if ($res['Type']=='5') {
                    if ($res['Subtype']=='1') { echo '<option selected value="1">Брус и доска</option>';}else{ echo '<option value="1">Брус и доска</option>';}
                    if ($res['Subtype']=='2') { echo '<option selected value="2">ДСП и ДВП</option>';}else{ echo '<option value="2">ДСП и ДВП</option>';}
                    if ($res['Subtype']=='3') { echo '<option selected value="3">ОСБ</option>';}else{ echo '<option value="3">ОСБ</option>';}
                    if ($res['Subtype']=='4') { echo '<option selected value="4">Фанера</option>';}else{ echo '<option value="4">Фанера</option>';}
                }
                if ($res['Type']=='6') {
                    echo '<option selected value="1">Другое</option>';
                }

                echo '</select><br><br>';

                echo '<b>Описание</b><br>';
                echo '<textarea style="border:1px solid silver;" id="Material_opis" name="Material_opis" rows="10" cols="85" name="text">'.$res['Texts'].'</textarea><br><br>';

                echo '<br><table class="dt" cellspacing="0">';
                echo '<tr><th>Фото 1 </th><th>Фото 2</th><th>Фото 3</th></tr>';

                echo '<tr>  <td><input type="file" name="filename_photo1"></td>  <td><input type="file" name="filename_photo2"></td>  <td><input type="file" name="filename_photo3"></td>  </tr>';
                echo '<tr>  <td><img src="'.$res['Photo1'].'"> <a style="color:red;" href="/user/Delete_Photo1/'.$res['id'].'">X</a></td>              <td><img src="'.$res['Photo2'].'"> <a style="color:red;" href="/user/Delete_Photo2/'.$res['id'].'">X</a></td>                  <td><img src="'.$res['Photo3'].'"> <a style="color:red;" href="/user/Delete_Photo3/'.$res['id'].'">X</a></td>   </tr>';
                echo '</table><br>';

                echo '<input style="padding: 5px 10px;cursor:pointer;border:1px solid silver;" type=submit value=Загрузить фото></form>';
                echo '</form>';
            }
        }
    }


    public static function Admin_material_Add($data){
        if ($_SESSION['Login']=="Admin") {

            echo '<ul class="Content_block_Menu">';
            echo '<li><a href="/user/all">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a></li>';
            echo '<li><a href="/user/news">НОВОСТИ И АКЦИИ</a></li>';
            echo '<li><a href="/user/send_buy">ЗАЯВКИ НА ПОКУПКУ</a></li>';
            echo '<li><a href="/user/production">КАТАЛОГ ПРОДУКЦИИ</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar Material_Add">';
            echo '<h2>Новая запись</h2>';


            echo '<form action="/user/New_Material_add" method="POST"  enctype="multipart/form-data">';
            echo '<br><b>Название</b><br>';
            echo '<input type="text" id="Material_nazv" name="Material_nazv" size="40">';

            echo '<br><br><b>Наличие</b><br>';
            echo '<input type="text" id="Material_nalich" name="Material_nalich" size="40">';

            echo '<br><br><b>Цена</b><br>';
            echo '<input type="text" id="Material_coin" name="Material_coin" size="40">';

            echo '<br><br><b>Страна</b><br>';
            echo '<input type="text" id="Material_country" name="Material_country" size="40">';

            echo '<br><br><b>Цвет</b><br>';
            echo '<input type="text" id="Material_colour" name="Material_colour" size="40">';

            echo '<br><br><b>Материал</b><br>';
            echo '<input type="text" id="Material_material" name="Material_material" size="40"><br><br>';

            echo '<b>Тип</b><br>';

            echo '<select style="border:1px solid silver;" id="Material_korpus" name="Material_korpus">';
            echo '<option value="1">Инструменты</option><option value="2">Строй.материалы</option><option value="3">Отделочные м-лы</option><option value="4">Крепежи</option><option value="5">Пиломатериалы</option><option value="6">Другое</option>';
            echo '</select><br><br>';

            echo '<b>Подтип</b><br>';

            echo '<select style="border:1px solid silver;" id="Material_Subtype" name="Material_Subtype">';
            echo '<optgroup label="Инструменты">';
            echo '<option value="1">Кисти и валики</option>';
            echo '<option value="2">Ножовки и пилы</option>';
            echo '<option value="3">Буры и сверла</option>';
            echo '<option value="4">Лопаты</option>';
            echo '<option value="5">Шпателя</option>';
            echo '</optgroup>';
            echo '<optgroup label="Строй.материалы">';
            echo '<option value="1">Цемент и добавки</option>';
            echo '<option value="2">Песок и щебень</option>';
            echo '<option value="3">Газобетон</option>';
            echo '<option value="4">Утеплители</option>';
            echo '<option value="5">Кровля</option>';
            echo '</optgroup>';
            echo '<optgroup label="Отделочные м-лы">';
            echo '<option value="1">Клей</option>';
            echo '<option value="2">Краски и лаки</option>';
            echo '<option value="3">Герметики и пен</option>';
            echo '<option value="4">Плитка и сантехника</option>';
            echo '<option value="5">Ламинат</option>';
            echo '</optgroup>';
            echo '<optgroup label="Крепежи">';
            echo '<option value="1">Саморезы</option>';
            echo '<option value="2">Гвозди</option>';
            echo '<option value="3">Шпильки</option>';
            echo '<option value="4">Гайки</option>';
            echo '<option value="5">Шайбы</option>';
            echo '</optgroup>';
            echo '<optgroup label="Пиломатериалы">';
            echo '<option value="1">Брус и доска</option>';
            echo '<option value="2">ДСП и ДВП</option>';
            echo '<option value="3">ОСБ</option>';
            echo '<option value="4">Фанера</option>';
            echo '</optgroup>';
            echo '<optgroup label="Другое">';
            echo '<option value="1">Другое</option>';
            echo '</optgroup>';
            echo '</select><br><br>';

            echo '<b>Описание</b><br>';
            echo '<textarea style="border:1px solid silver;" id="Material_opis" name="Material_opis" rows="10" cols="45" name="text"></textarea><br><br>';

            echo '<input type="file" name="filename"><br><br>';
            echo '<input style="padding: 5px 10px;cursor:pointer;border:1px solid silver;" type=submit value=Загрузить фото></form>';
            echo '</form>';
            echo '</div>';
        }}


    public static function Admin_buy_material($data){
        if ($_SESSION['Login']=="Admin") {
            echo '<ul class="Content_block_Menu">';
            echo '<li><a href="/user/all">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a></li>';
            echo '<li><a href="/user/news">НОВОСТИ И АКЦИИ</a></li>';
            echo '<li><a href="/user/send_buy">ЗАЯВКИ НА ПОКУПКУ</a></li>';
            echo '<li><a href="/user/production">КАТАЛОГ ПРОДУКЦИИ</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar Admin_Tovar">';
            echo '<h2>Заявки на покупку</h2>';


            echo '<br><table cellspacing="0">';
            echo '<tr><th>Название</th><th>Логин покупателя</th><th>Email покупателя</th><th>Количество</th><th>Общая стоимость</th><th>Дата заказа</th><th>Состояние заявки</th><th>Телефон</th><th>Управление</th><th>Статус завки</th></tr>';
            while($res=$data->fetch(PDO::FETCH_BOTH)){
                echo '<tr>';

                require_once 'application/config/Db.php';
                $db=Db::getConnection();
                $str="Select *from Catalog where id='".$res['Auto']."'";
                $result=$db->prepare($str);
                $result->execute();
                while($res2=$result->fetch(PDO::FETCH_BOTH)){
                    $date=date_create($res['Datas']);
                    echo '<td> '.$res2['Nazv'].' </td>';
                    echo '<td> '.$res['Login'].' </td>';
                    echo '<td> '.$res['Login'].' </td>';
                    echo '<td> '.$res['Kolvo'].' шт.</td>';
                    echo '<td> '.$res['Kolvo']*$res2['Coin'].' руб.</td>';
                    echo '<td> '.date_format($date,"H:i:s d.m.Y").' </td>';


                    if ($res['Sost']=='0') {echo '<td>Заявка ещё не рассмотрена</td>';}
                    if ($res['Sost']=='1') {echo '<td>Заявка принята</td>';}
                    if ($res['Sost']=='2') {echo '<td>Отказано в заявке</td>';}
                    echo '<td> '.$res['Tel'].' </td>';
                    echo '<td>   <a href="/tovar/info/'.$res2['id'].'"> <img src="/photo/info.png" width="22px"></a>  <a href="/user/delete_buy2/'.$res['id'].'"> <img src="/photo/del.png" width="25px"></a> </td>';
                    echo '<td>   <a style="color:green;" href="/user/yes/'.$res['id'].'">Принять</a>  <a style="color:red;" href="/user/noy/'.$res['id'].'">Отклонить</a> </td>';

                    echo '</tr>';
                }}
            echo '</table>';
            echo '</div>';

        }}

}