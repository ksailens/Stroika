<?php
require_once 'application/config/Db.php';
require_once 'application/config/ENG.php';



class User_Function{






    public static function User_buy_material($data){
        if (isset($_SESSION['Login'])) {
            $sum_coin = null;

            if ($_SESSION['LoginSystem']==='system_registr') {
                echo "<script language='javascript'>alert('".tr::trans('register_success')."');</script>";
                $_SESSION['LoginSystem'] = null;
            }

            echo '<ul class="Content_block_Menu">';
            echo '<li><a class="upperCase" href="/user/my_buy">'.tr::trans('Purchase').'</a></li>';
            echo '<li><a class="upperCase" href="/user/my_basket">'.tr::trans('Basket').'</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2>'.tr::trans('Purchase').'</h2>';
            if (!$data->fetch(PDO::FETCH_ASSOC)) {
                echo '<p class="emptyBasket">'.tr::trans('no_yet').'</p>';
            } else {
                require_once 'application/config/Db.php';
                $db=Db::getConnection();
                $string="Select *from Buy where userId='".$_SESSION['userId']."'";
                $container=$db->prepare($string);
                $container->execute();

                echo '<br><table cellspacing="0">';
                echo '<tr><th>'.tr::trans('order_n').'</th><th>'.tr::trans('totalCost').'</th><th>'.tr::trans('date_create').'</th><th>'.tr::trans('order_status').'</th><th>'.tr::trans('Control').'</th></tr>';
                while($res=$container->fetch(PDO::FETCH_BOTH)){
                    echo '<tr>';
                    $date=date_create($res['Datas']);

                    echo '<td> '.$res['orderId'].' </td>';
                    echo '<td> '.$res['totalCost'].' '.tr::trans('rub').'</td>';
                    echo '<td> '.date_format($date,"H:i:s d.m.Y").' </td>';
                    if ($res['Sost']=='0') {echo '<td>'.tr::trans('sost0').'</td>';}
                    if ($res['Sost']=='1') {echo '<td>'.tr::trans('sost1').'</td>';}
                    if ($res['Sost']=='2') {echo '<td>'.tr::trans('sost2').'</td>';}

                    echo '<td>   <a href="/user/orderInfo/'.$res['orderId'].'"> <img src="/photo/info.png" width="22px"></a>  <a href="/user/delete_buy1/'.$res['orderId'].'"> <img src="/photo/del.png"  width="25px"></a> </td>';

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
            echo '<li><a class="upperCase" href="/user/my_buy">'.tr::trans('Purchase').'</a></li>';
            echo '<li><a class="upperCase" href="/user/my_basket">'.tr::trans('Basket').'</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2>'.tr::trans('Basket').'</h2>';

            if (!$data->fetch(PDO::FETCH_ASSOC)) {
                echo '<p class="emptyBasket">'.tr::trans('basket_empty').'</p>';
            } else {
                require_once 'application/config/Db.php';
                $db=Db::getConnection();
                $string="Select *from Basket where id_order='".$_SESSION['codeUserName']."'";
                $container=$db->prepare($string);
                $container->execute();


                echo '<br><table cellspacing="0">';
                echo '<tr><th>'.tr::trans('Title').'</th><th>'.tr::trans('Cost').'</th><th>'.tr::trans('Amount').'</th><th>'.tr::trans('Total').'</th><th>'.tr::trans('Control').'</th></tr>';
                while($res=$container->fetch(PDO::FETCH_BOTH)){
                    echo '<tr>';

                    require_once 'application/config/Db.php';
                    $db=Db::getConnection();
                    $str="Select *from Catalog where id='".$res['id_tovar']."'";
                    $result=$db->prepare($str);
                    $result->execute();
                    while($res2=$result->fetch(PDO::FETCH_BOTH)){
                        if ($_SESSION['lang']==="eng") {
                            echo '<td> '.$res2['NazvEN'].' </td>';
                        } else {
                            echo '<td> '.$res2['Nazv'].' </td>';
                        }
                        echo '<td> '.$res2['Coin'].' '.tr::trans('rub').'</td>';
                        $sum_coin += $res['kolvo']*$res2['Coin'];
                        echo '<td> '.$res['kolvo'].' '.tr::trans('pcs').'</td>';
                        echo '<td> '.$res['kolvo']*$res2['Coin'].' '.tr::trans('rub').'</td>';


                        if ($res['Sost']=='0') {echo '<td>'.tr::trans('sost0').'</td>';}
                        if ($res['Sost']=='1') {echo '<td>'.tr::trans('sost1').'</td>';}
                        if ($res['Sost']=='2') {echo '<td>'.tr::trans('sost2').'</td>';}
                        echo '<td>   <a href="/tovar/info/'.$res2['id'].'"> <img src="/photo/info.png" width="22px"></a>  <a href="/user/delete_basketItem/'.$res['id'].'"> <img src="/photo/del.png"  width="25px"></a> </td>';

                        echo '</tr>';
                    }}
                echo '</table>';
                echo '<br>';
                echo '<hr style="background: black; width: 100%; height: 1px;">';
                echo '<p style="text-align: left">'.tr::trans('total_order').'  '.(float)$sum_coin.' '.tr::trans('rub').'</p>';
                echo '<a class="sendMail" href="/user/create_order/'.$sum_coin.'">'.tr::trans('make_an').'</a>';
            }



            echo '</div>';
        }

    }

    public static function User_orderInfo($data){

        if (isset($_SESSION['Login'])) {
            $sum_coin = null;
            echo '<ul class="Content_block_Menu">';
            echo '<li><a class="upperCase" href="/user/my_buy">'.tr::trans('Purchase').'</a></li>';
            echo '<li><a class="upperCase" href="/user/my_basket">'.tr::trans('Basket').'</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2>'.tr::trans('applic_info').'</h2>';
            echo '<br><table cellspacing="0">';
            echo '<tr><th>'.tr::trans('Title').'</th><th>'.tr::trans('Cost').'</th><th>'.tr::trans('Amount').'</th><th>'.tr::trans('Total').'</th><th>'.tr::trans('Control').'</th></tr>';
            while($res=$data->fetch(PDO::FETCH_BOTH)){
                echo '<tr>';

                require_once 'application/config/Db.php';
                $db=Db::getConnection();
                $str="Select *from Catalog where id='".$res['id_tovar']."'";
                $result=$db->prepare($str);
                $result->execute();
                while($res2=$result->fetch(PDO::FETCH_BOTH)){
                    if ($_SESSION['lang']==="eng") {
                        echo '<td> '.$res2['NazvEN'].' </td>';
                    } else {
                        echo '<td> '.$res2['Nazv'].' </td>';
                    }
                    echo '<td> '.$res2['Coin'].' '.tr::trans('rub').'</td>';
                        $sum_coin += $res['kolvo']*$res2['Coin'];
                    echo '<td> '.$res['kolvo'].' '.tr::trans('pcs').'</td>';
                    echo '<td> '.$res['kolvo']*$res2['Coin'].' '.tr::trans('rub').'</td>';
                    echo '<td>   <a href="/tovar/info/'.$res2['id'].'"> <img src="/photo/info.png" width="22px"></a></td>';

                    echo '</tr>';
                }}
            echo '</table>';
            echo '<br>';
            echo '<hr style="background: black; width: 100%; height: 1px;">';
            echo '<p style="text-align: left">'.tr::trans('total_order').(float)$sum_coin.' '.tr::trans('rub').'</p>';
            echo '</div>';
        }

    }

    public static function Admin_orderInfo($data){

        if (isset($_SESSION['Login'])) {
            $sum_coin = null;
            echo '<ul class="Content_block_Menu">';
            echo '<li><a class="upperCase" href="/user/all">'.tr::trans('users').'</a></li>';
            echo '<li><a class="upperCase" href="/user/news">'.tr::trans('news').'</a></li>';
            echo '<li><a class="upperCase" href="/user/send_buy">'.tr::trans('Purchase').'</a></li>';
            echo '<li><a class="upperCase" href="/user/production">'.tr::trans('Catalog').'</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2>'.tr::trans('applic_info').'</h2>';
            echo '<br><table cellspacing="0">';
            echo '<tr><th>'.tr::trans('Title').'</th><th>'.tr::trans('Cost').'</th><th>'.tr::trans('Amount').'</th><th>'.tr::trans('Total').'</th><th>'.tr::trans('Control').'</th></tr>';
            while($res=$data->fetch(PDO::FETCH_BOTH)){
                echo '<tr>';

                require_once 'application/config/Db.php';
                $db=Db::getConnection();
                $str="Select *from Catalog where id='".$res['id_tovar']."'";
                $result=$db->prepare($str);
                $result->execute();
                while($res2=$result->fetch(PDO::FETCH_BOTH)){
                    if ($_SESSION['lang']==="eng") {
                        echo '<td> '.$res2['NazvEN'].' </td>';
                    } else {
                        echo '<td> '.$res2['Nazv'].' </td>';
                    }
                    echo '<td> '.$res2['Coin'].' '.tr::trans('rub').'</td>';
                        $sum_coin += $res['kolvo']*$res2['Coin'];
                    echo '<td> '.$res['kolvo'].' '.tr::trans('pcs').'</td>';
                    echo '<td> '.$res['kolvo']*$res2['Coin'].' '.tr::trans('rub').'</td>';
                    echo '<td>   <a href="/tovar/info/'.$res2['id'].'"> <img src="/photo/info.png" width="22px"></a></td>';

                    echo '</tr>';
                }}
            echo '</table>';
            echo '<br>';
            echo '<hr style="background: black; width: 100%; height: 1px;">';
            echo '<p style="text-align: left">'.tr::trans('total_order').(float)$sum_coin.' '.tr::trans('rub').'</p>';
            echo '</div>';
        }

    }



    public static function User($data){


        if ($_SESSION['Login']=="Admin") {

            echo '<ul class="Content_block_Menu">';
            echo '<li><a class="upperCase" href="/user/all">'.tr::trans('users').'</a></li>';
            echo '<li><a class="upperCase" href="/user/news">'.tr::trans('news').'</a></li>';
            echo '<li><a class="upperCase" href="/user/send_buy">'.tr::trans('Purchase').'</a></li>';
            echo '<li><a class="upperCase" href="/user/production">'.tr::trans('Catalog').'</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2>'.tr::trans('users').'</h2>';


            echo '<br><table cellspacing="0">';
            echo '<tr><th>'.tr::trans('Login').'</th><th>'.tr::trans('Password').'</th><th>Email</th><th>'.tr::trans('tel').'</th><th>'.tr::trans('Control').'</th></tr>';
            while($res=$data->fetch(PDO::FETCH_BOTH)){
                echo '<tr><td>'.$res['Names'].'</td><td>'.$res['Pass'].'</td><td>'.$res['Emails'].'</td><td>'.$res['Tels'].'</td><td> <a href="/user/delete/'.$res['id'].'"> <img src="/photo/korz.png" width="30px">  </a>   </td></tr>';
            }


            echo '</table>';

            echo '</div>';
        }
        else{
            echo '<ul class="Content_block_Menu">';
            echo '<li><a class="upperCase" href="/user/my_buy">'.tr::trans('Purchase').'</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2>'.tr::trans('Purchase').'</h2>';
            echo '</div>';
        }}






    public static function Tovar_kind($data){
        while($res=$data->fetch(PDO::FETCH_BOTH)){
            echo '<li>';
            echo '<img src="'.$res['Photo1'].'">	';
            echo '<span>₽ '.$res['Coin'].'</span>';
            if (isset($_SESSION['Login'])) {
            }
            if ($_SESSION['lang']==="eng") {
                echo '<b>'.$res['NazvEN'].'</b>';
                echo '<p>'.mb_substr($res['TextsEN'], 0, 80, 'UTF-8') . '...'.'</p>';
            } else {
                echo '<b>'.$res['Nazv'].'</b>';
                echo '<p>'.mb_substr($res['Texts'], 0, 80, 'UTF-8') . '...'.'</p>';
            }
            if (isset($_SESSION['Login']) && $_SESSION["Login"]!="Admin") {
                echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST" onsubmit="return itemNumberChange('.$res['id'].',`'.$_SESSION['lang'].'`)">';
                echo '<input class="number3" name="kolvo" min="1" max="99" id="number'.$res['id'].'" type="number" value="1">';
                echo '<input class="dm1" style="cursor: pointer" type="submit" value="'.tr::trans('buy').'">';
                echo '</form>';
            }


            else{
                    if ($_SESSION['lang']==="eng") {
                        echo '<a onclick="nonAutorizedMessage_eng()" class="dm1">'.tr::trans('buy').'</a>';
                    } else {
                        echo '<a onclick="nonAutorizedMessage()" class="dm1">'.tr::trans('buy').'</a>';
                    }
            }
            echo '<a href="/tovar/info/'.$res['id'].'" class="dm2">'.tr::trans('details').'</a>';
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

            if ($_SESSION['lang']==="eng") {
                echo '<b>'.$res['NazvEN'].'</b>';
                echo '<p>'.mb_substr($res['TextsEN'], 0, 80, 'UTF-8') . '...'.'</p>';
            } else {
                echo '<b>'.$res['Nazv'].'</b>';
                echo '<p>'.mb_substr($res['Texts'], 0, 80, 'UTF-8') . '...'.'</p>';
            }
            if (isset($_SESSION['Login']) && $_SESSION["Login"]!="Admin") {
                echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST" onsubmit="return itemNumberChange('.$res['id'].',`'.$_SESSION['lang'].'`)">';
                echo '<input class="number3" name="kolvo" min="1" max="99" id="number'.$res['id'].'" type="number" value="1">';
                echo '<input class="dm1" style="cursor: pointer" type="submit" value="'.tr::trans('buy').'">';
                echo '</form>';
            }
            else{
                if ($_SESSION['lang']==="eng") {
                    echo '<a onclick="nonAutorizedMessage_eng()" class="dm1">'.tr::trans('buy').'</a>';
                } else {
                    echo '<a onclick="nonAutorizedMessage()" class="dm1">'.tr::trans('buy').'</a>';
                }
            }
            echo '<a href="/tovar/info/'.$res['id'].'" class="dm2">'.tr::trans('details').'</a>';
            echo '</li>';
        }
    }

    public static function News_info($data){
        while($res=$data->fetch(PDO::FETCH_BOTH)){
            $date=date_create($res['Datas']);

            if ($_SESSION['lang']==="eng") {
                echo '<br><h2 align=center>'.$res['NazvEn'].'</h2><br><ul>';
            } else {
                echo '<br><h2 align=center>'.$res['Nazv'].'</h2><br><ul>';
            }
            echo '<li style="width: 170px;margin-left:15px;"><img src="/photo/im1.jpg"><span>'.date_format($date,"H:i:s d.m.Y").'</span></li>';
            echo '<li><img src="/photo/im2.jpg"><span>'.tr::trans('rec_add').': '.$res['Users'].'</span></li>';
            if ($res['Photos'] !== '/photo/news/') {
                echo '<img class="photoss" src="'.$res['Photos'].'">';
            } else {
                echo '<img class="photoss" src="../../photo/noimage.png">';
            }
            echo '<div><br>';
            if ($_SESSION['lang']==="eng") {
                echo '<p>'.$res['TextsEn'].'</p></div></ul>	';
            } else {
                echo '<p>'.$res['Texts'].'</p></div></ul>	';
            }
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

            if ($_SESSION['lang']==="eng") {
                echo '<h3>'.$res['NazvEn'].'</h3>';
            } else {
                echo '<h3>'.$res['Nazv'].'</h3>';
            }
            echo '<ul class="Info_News">';
            echo '<li style="margin-left:0;"><img src="photo/im1.jpg"><span>'.date_format($date,"H:i:s d.m.Y").'</span></li>';
            echo '<li><img src="photo/im2.jpg"><span>'.$res['Users'].'</span></li>';
            echo '</ul>';

            if ($_SESSION['lang']==="eng") {
                echo '<p class="www">'.mb_substr($res['TextsEn'], 0, 50, 'UTF-8') . '...'.'<p>';
            } else {
                echo '<p class="www">'.mb_substr($res['Texts'], 0, 50, 'UTF-8') . '...'.'<p>';
            }
            echo '<div></div>';
            echo '<a class="www1" href="news/info/'.$res['id'].'">'.tr::trans('read_more').'</a>';
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
            if ($_SESSION['lang']==="eng") {
            echo '<h3>'.$res['NazvEn'].'</h3>';
            } else {
            echo '<h3>'.$res['Nazv'].'</h3>';
            }
            echo '<ul class="Info_IndexNews">';
            echo '<li><img src="photo/im1.jpg"><span>'.date_format($date,"H:i:s d.m.Y").'</span></li>';
            echo '</ul>';
            if ($_SESSION['lang']==="eng") {
                echo '<p>'.mb_substr($res['TextsEn'], 0, 50, 'UTF-8') . '...'.'<p>';
            } else {
                echo '<p>'.mb_substr($res['Texts'], 0, 50, 'UTF-8') . '...'.'<p>';
            }

            echo '<a href="news/info/'.$res['id'].'">'.tr::trans('read_more').'</a>';
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
        echo '<div class="Info">'.tr::trans('new_product').' > '.tr::trans('instruments').'</div>';
        while($res=$result->fetch(PDO::FETCH_BOTH)){
            echo '<li>';
            echo '<img src="'.$res['Photo1'].'">	';
            echo '<span>₽ '.$res['Coin'].'</span>';
            if (isset($_SESSION['Login'])) {
            }

            if ($_SESSION['lang']==="eng") {
                echo '<b>'.$res['NazvEN'].'</b>';
                echo '<p>'.mb_substr($res['TextsEN'], 0, 35, 'UTF-8') . '...'.'</p>';
            } else {
                echo '<b>'.$res['Nazv'].'</b>';
                echo '<p>'.mb_substr($res['Texts'], 0, 35, 'UTF-8') . '...'.'</p>';
            }
            if (isset($_SESSION['Login']) && $_SESSION["Login"]!="Admin") {
                echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST" onsubmit="return itemNumberChange('.$res['id'].',`'.$_SESSION['lang'].'`)">';
                    echo '<input class="number3" name="kolvo" min="1" max="99" id="number'.$res['id'].'" type="number" value="1">';
                    echo '<input class="dm1" style="cursor: pointer" type="submit" value="'.tr::trans('buy').'">';
                echo '</form>';
            }
            else{
                if ($_SESSION['lang']==="eng") {
                    echo '<a onclick="nonAutorizedMessage_eng()" class="dm1">'.tr::trans('buy').'</a>';
                } else {
                    echo '<a onclick="nonAutorizedMessage()" class="dm1">'.tr::trans('buy').'</a>';
                }
            }
            echo '<a href="/tovar/info/'.$res['id'].'" class="dm2">'.tr::trans('details').'</a>';
            echo '</li>';
        }
        echo '</ul>';

        $str="Select *from Catalog where Type=2 limit 3";
        $result=$db->prepare($str);
        $result->execute();

        echo '<ul class="Content_block_Tovar">';
        echo '<div class="Info">'.tr::trans('new_product').' > '.tr::trans('construct_mat').'</div>';
        while($res=$result->fetch(PDO::FETCH_BOTH)){
            echo '<li>';
            echo '<img src="'.$res['Photo1'].'">	';
            echo '<span>₽ '.$res['Coin'].'</span>';
            if (isset($_SESSION['Login'])) {
            }
            if ($_SESSION['lang']==="eng") {
                echo '<b>'.$res['NazvEN'].'</b>';
                echo '<p>'.mb_substr($res['TextsEN'], 0, 35, 'UTF-8') . '...'.'</p>';
            } else {
                echo '<b>'.$res['Nazv'].'</b>';
                echo '<p>'.mb_substr($res['Texts'], 0, 35, 'UTF-8') . '...'.'</p>';
            }
            if (isset($_SESSION['Login']) && $_SESSION["Login"]!="Admin") {
                echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST" onsubmit="return itemNumberChange('.$res['id'].',`'.$_SESSION['lang'].'`)">';
                echo '<input class="number3" name="kolvo" min="1" max="99" id="number'.$res['id'].'" type="number" value="1">';
                echo '<input class="dm1" style="cursor: pointer" type="submit" value="'.tr::trans('buy').'">';
                echo '</form>';
            }
            else{
                if ($_SESSION['lang']==="eng") {
                    echo '<a onclick="nonAutorizedMessage_eng()" class="dm1">'.tr::trans('buy').'</a>';
                } else {
                    echo '<a onclick="nonAutorizedMessage()" class="dm1">'.tr::trans('buy').'</a>';
                }
            }
            echo '<a href="/tovar/info/'.$res['id'].'" class="dm2">'.tr::trans('details').'</a>';
            echo '</li>';
        }
        echo '</ul>';

        $str="Select *from Catalog where Type=3 limit 3";
        $result=$db->prepare($str);
        $result->execute();
        echo '<ul class="Content_block_Tovar">';
        echo '<div class="Info">'.tr::trans('new_product').' > '.tr::trans('decor_mat').'</div>';
        while($res=$result->fetch(PDO::FETCH_BOTH)){
            echo '<li>';
            echo '<img src="'.$res['Photo1'].'">	';
            echo '<span>₽ '.$res['Coin'].'</span>';
            if (isset($_SESSION['Login'])) {
            }
            if ($_SESSION['lang']==="eng") {
                echo '<b>'.$res['NazvEN'].'</b>';
                echo '<p>'.mb_substr($res['TextsEN'], 0, 35, 'UTF-8') . '...'.'</p>';
            } else {
                echo '<b>'.$res['Nazv'].'</b>';
                echo '<p>'.mb_substr($res['Texts'], 0, 35, 'UTF-8') . '...'.'</p>';
            }
            if (isset($_SESSION['Login']) && $_SESSION["Login"]!="Admin") {
                echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST" onsubmit="return itemNumberChange('.$res['id'].',`'.$_SESSION['lang'].'`)">';
                echo '<input class="number3" name="kolvo" min="1" max="99" id="number'.$res['id'].'" type="number" value="1">';
                echo '<input class="dm1" style="cursor: pointer" type="submit" value="'.tr::trans('buy').'">';
                echo '</form>';
            }
            else{
                if ($_SESSION['lang']==="eng") {
                    echo '<a onclick="nonAutorizedMessage_eng()" class="dm1">'.tr::trans('buy').'</a>';
                } else {
                    echo '<a onclick="nonAutorizedMessage()" class="dm1">'.tr::trans('buy').'</a>';
                }
            }
            echo '<a href="/tovar/info/'.$res['id'].'" class="dm2">'.tr::trans('details').'</a>';
            echo '</li>';
        }
        echo '</ul>';

        $str="Select *from Catalog where Type=4 limit 3";
        $result=$db->prepare($str);
        $result->execute();

        echo '<ul class="Content_block_Tovar">';
        echo '<div class="Info">'.tr::trans('new_product').' > '.tr::trans('fasteners').'</div>';
        while($res=$result->fetch(PDO::FETCH_BOTH)){
            echo '<li>';
            echo '<img src="'.$res['Photo1'].'">	';
            echo '<span>₽ '.$res['Coin'].'</span>';
            if (isset($_SESSION['Login'])) {
            }
            if ($_SESSION['lang']==="eng") {
                echo '<b>'.$res['NazvEN'].'</b>';
                echo '<p>'.mb_substr($res['TextsEN'], 0, 35, 'UTF-8') . '...'.'</p>';
            } else {
                echo '<b>'.$res['Nazv'].'</b>';
                echo '<p>'.mb_substr($res['Texts'], 0, 35, 'UTF-8') . '...'.'</p>';
            }
            if (isset($_SESSION['Login']) && $_SESSION["Login"]!="Admin") {
                echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST" onsubmit="return itemNumberChange('.$res['id'].',`'.$_SESSION['lang'].'`)">';
                echo '<input class="number3" name="kolvo" min="1" max="99" id="number'.$res['id'].'" type="number" value="1">';
                echo '<input class="dm1" style="cursor: pointer" type="submit" value="'.tr::trans('buy').'">';
                echo '</form>';
            }
            else{
                if ($_SESSION['lang']==="eng") {
                    echo '<a onclick="nonAutorizedMessage_eng()" class="dm1">'.tr::trans('buy').'</a>';
                } else {
                    echo '<a onclick="nonAutorizedMessage()" class="dm1">'.tr::trans('buy').'</a>';
                }
            }
            echo '<a href="/tovar/info/'.$res['id'].'" class="dm2">'.tr::trans('details').'</a>';
            echo '</li>';
        }
        echo '</ul>';

        $str="Select *from Catalog where Type=5 limit 3";
        $result=$db->prepare($str);
        $result->execute();

        echo '<ul class="Content_block_Tovar">';
        echo '<div class="Info">'.tr::trans('new_product').' > '.tr::trans('pilomat').'</div>';
        while($res=$result->fetch(PDO::FETCH_BOTH)){
            echo '<li>';
            echo '<img src="'.$res['Photo1'].'">	';
            echo '<span>₽ '.$res['Coin'].'</span>';
            if (isset($_SESSION['Login'])) {
            }
            if ($_SESSION['lang']==="eng") {
                echo '<b>'.$res['NazvEN'].'</b>';
                echo '<p>'.mb_substr($res['TextsEN'], 0, 35, 'UTF-8') . '...'.'</p>';
            } else {
                echo '<b>'.$res['Nazv'].'</b>';
                echo '<p>'.mb_substr($res['Texts'], 0, 35, 'UTF-8') . '...'.'</p>';
            }
            if (isset($_SESSION['Login']) && $_SESSION["Login"]!="Admin") {
                echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST" onsubmit="return itemNumberChange('.$res['id'].',`'.$_SESSION['lang'].'`)">';
                echo '<input class="number3" name="kolvo" min="1" max="99" id="number'.$res['id'].'" type="number" value="1">';
                echo '<input class="dm1" style="cursor: pointer" type="submit" value="'.tr::trans('buy').'">';
                echo '</form>';
            }
            else{
                if ($_SESSION['lang']==="eng") {
                    echo '<a onclick="nonAutorizedMessage_eng()" class="dm1">'.tr::trans('buy').'</a>';
                } else {
                    echo '<a onclick="nonAutorizedMessage()" class="dm1">'.tr::trans('buy').'</a>';
                }
            }
            echo '<a href="/tovar/info/'.$res['id'].'" class="dm2">'.tr::trans('details').'</a>';
            echo '</li>';
        }
        echo '</ul>';
    }


    public static function materials_info($data){
        while($res=$data->fetch(PDO::FETCH_BOTH)){
            $date=date_create($res['Datas']);
            echo '<div class="News_info_main">';

            if ($_SESSION['lang']==="eng") {
                echo '<br><h2 align=center>'.$res['NazvEN'].'</h2><br><ul>';
            } else {
                echo '<br><h2 align=center>'.$res['Nazv'].'</h2><br><ul>';
            }

            echo '<li style="width: 170px;margin-left:15px;"><img src="/photo/im1.jpg"><span>'.date_format($date,"H:i:s d.m.Y").'</span></li>';

            echo '<div style=" width:700px; height: 500px;" id="slider" class="slider_wrap">';
            if ($res['Photo1']!="") {echo '<img style=" width:700px; height: 500px;" src="'.$res['Photo1'].'" alt="" />';}
            if ($res['Photo2']!="") {echo '<img style=" width:700px; height: 500px;" src="'.$res['Photo2'].'" alt="" />';}
            if ($res['Photo3']!="") {echo '<img style=" width:700px; height: 500px;" src="'.$res['Photo3'].'" alt="" />';}
            echo '</div>';

            echo '<br><br><table style="margin:0 auto;" cellspacing="0">';

            if ($_SESSION['lang']==="eng") {
                echo '<tr><td>'.tr::trans('Title').'</td><td>'.$res['NazvEN'].'</td></tr>';
            } else {
                echo '<tr><td>'.tr::trans('Title').'</td><td>'.$res['Nazv'].'</td></tr>';
            }
            echo '<tr><td>'.tr::trans('in_stock').'</td><td>'.$res['Nalich'].'</td></tr>';
            if ($_SESSION['lang']==="eng") {
                echo '<tr><td>'.tr::trans('Country').'</td><td>'.$res['CountryEN'].'</td></tr>';
                echo '<tr><td>'.tr::trans('Color').'</td><td>'.$res['ColorEN'].'</td></tr>';
                echo '<tr><td>'.tr::trans('Material').'</td><td>'.$res['MaterialEN'].'</td></tr>';
            } else {
                echo '<tr><td>'.tr::trans('Country').'</td><td>'.$res['Country'].'</td></tr>';
                echo '<tr><td>'.tr::trans('Color').'</td><td>'.$res['Colour'].'</td></tr>';
                echo '<tr><td>'.tr::trans('Material').'</td><td>'.$res['Material'].'</td></tr>';
            }
            echo '<tr><td>'.tr::trans('Cost').'</td><td>'.$res['Coin'].'</td></tr>';

            if ($res['Type']=='1') {echo '<tr><td>'.tr::trans('Type').'</td><td>'.tr::trans('instruments').'</td></tr>';}
            if ($res['Type']=='2') {echo '<tr><td>'.tr::trans('Type').'</td><td>'.tr::trans('construct_mat').'</td></tr>';}
            if ($res['Type']=='3') {echo '<tr><td>'.tr::trans('Type').'</td><td>'.tr::trans('decor_mat').'</td></tr>';}
            if ($res['Type']=='4') {echo '<tr><td>'.tr::trans('Type').'</td><td>'.tr::trans('fasteners').'</td></tr>';}
            if ($res['Type']=='5') {echo '<tr><td>'.tr::trans('Type').'</td><td>'.tr::trans('pilomat').'</td></tr>';}
            if ($res['Type']=='6') {echo '<tr><td>'.tr::trans('Type').'</td><td>'.tr::trans('Other').'</td></tr>';}
            echo '</table><br>';
            echo '<div><br>';
            if ($_SESSION['lang']==="eng") {
                echo '<p>'.$res['TextsEN'].'</p></div></ul>';
            } else {
                echo '<p>'.$res['Texts'].'</p></div></ul>';
            }
            echo '<br>';
            if (isset($_SESSION['Login']) && $_SESSION["Login"]!="Admin") {
                echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST" onsubmit="return itemNumberChange('.$res['id'].',`'.$_SESSION['lang'].'`)">';
                echo '<input class="dm4" class="dm1" style="cursor: pointer" type="submit" value="'.tr::trans('buy').'">';
                echo '<input class="number4" name="kolvo" min="1" max="99" id="number'.$res['id'].'" type="number" value="1">';
                echo '</form>';
            }
            else{
                if ($_SESSION['lang']==="eng") {
                    echo '<a onclick="nonAutorizedMessage_eng()" class="dm4" class="dm1">'.tr::trans('buy').'</a>';
                } else {
                    echo '<a onclick="nonAutorizedMessage()" class="dm4" class="dm1">'.tr::trans('buy').'</a>';
                }
            }
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
            echo '<div class="Info upperCase">'.tr::trans('recomend').'</div>';
            while ($res = $result->fetch(PDO::FETCH_BOTH)) {
                echo '<li>';
                echo '<img src="' . $res['Photo1'] . '">	';
                echo '<span>₽ ' . $res['Coin'] . '</span>';
                if (isset($_SESSION['Login'])) {
                }
                if ($_SESSION['lang']==="eng") {
                    echo '<b>'.$res['NazvEN'].'</b>';
                    echo '<p>' . mb_substr($res['TextsEN'], 0, 80, 'UTF-8') . '...' . '</p>';
                } else {
                    echo '<b>'.$res['Nazv'].'</b>';
                    echo '<p>' . mb_substr($res['Texts'], 0, 80, 'UTF-8') . '...' . '</p>';
                }
                if (isset($_SESSION['Login']) && $_SESSION["Login"]!="Admin") {
                    echo '<form action="/user/drop_basket/'.$res['id'].'" method="POST" onsubmit="return itemNumberChange('.$res['id'].',`'.$_SESSION['lang'].'`)">';
                    echo '<input class="number3" name="kolvo" min="1" max="99" id="number'.$res['id'].'" type="number" value="1">';
                    echo '<input class="dm1" style="cursor: pointer" type="submit" value="'.tr::trans('buy').'">';
                    echo '</form>';
                } else {
                        if ($_SESSION['lang']==="eng") {
                            echo '<a onclick="nonAutorizedMessage_eng()" class="dm1">'.tr::trans('buy').'</a>';
                        } else {
                            echo '<a onclick="nonAutorizedMessage()" class="dm1">'.tr::trans('buy').'</a>';
                        }
                }
                echo '<a href="/tovar/info/' . $res['id'] . '" class="dm2">'.tr::trans('details').'</a>';
                echo '</li>';
            }
            echo '</div>';

        }}


    public static function Admin_test_drive($data){
        if ($_SESSION['Login']=="Admin") {
            echo '<ul class="Content_block_Menu">';
            echo '<li><a class="upperCase" href="/user/all">'.tr::trans('users').'</a></li>';
            echo '<li><a class="upperCase" href="/user/news">'.tr::trans('news').'</a></li>';
            echo '<li><a class="upperCase" href="/user/send_buy">'.tr::trans('Purchase').'</a></li>';
            echo '<li><a class="upperCase" href="/user/production">'.tr::trans('Catalog').'</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2></h2>';


            echo '<br><table cellspacing="0">';
            echo '<tr><th>'.tr::trans('Title').'</th><th>'.tr::trans('Login').'</th><th>'.tr::trans('order_status').'</th><th>'.tr::trans('tel').'</th><th>Действие</th><th>Статус завки</th></tr>';
            while($res=$data->fetch(PDO::FETCH_BOTH)){
                echo '<tr>';

                require_once 'application/config/Db.php';
                $db=Db::getConnection();
                $str="Select *from Catalog where id='".$res['Avto']."'";
                $result=$db->prepare($str);
                $result->execute();
                while($res2=$result->fetch(PDO::FETCH_BOTH)){
                    if ($_SESSION['lang']==="eng") {
                        echo '<td> '.$res2['NazvEN'].' </td>';
                    } else {
                        echo '<td> '.$res2['Nazv'].' </td>';
                    }
                    echo '<td> '.$res['Login'].' </td>';



                    if ($res['Sost']=='0') {echo '<td>'.tr::trans('sost0').'</td>';}
                    if ($res['Sost']=='1') {echo '<td>'.tr::trans('sost1').'</td>';}
                    if ($res['Sost']=='2') {echo '<td>'.tr::trans('sost2').'</td>';}
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
                echo '<li><a class="upperCase" href="/user/all">'.tr::trans('users').'</a></li>';
                echo '<li><a class="upperCase" href="/user/news">'.tr::trans('news').'</a></li>';
                echo '<li><a class="upperCase" href="/user/send_buy">'.tr::trans('Purchase').'</a></li>';
                echo '<li><a class="upperCase" href="/user/production">'.tr::trans('Catalog').'</a></li>';
                echo '</ul>';
                echo '<div class="Content_block_Tovar">';
                echo '<h2>'.tr::trans('new_text').'</h2>';


                echo '<form action="/user/New_News_Update/'.$res['id'].'" method="POST" onsubmit="return typeFile()"  enctype="multipart/form-data">';
                echo '<br><br><b>'.tr::trans('header').'</b><br>';
                echo '<input type="text" id="News_zagol1" name="News_zagol1" value="'.$res['Nazv'].'" size="40" required><br><br>';
                echo '<b>'.tr::trans('body_news').'</b><br>';
                echo '<textarea style="border:1px solid silver;" id="News_Text1" name="News_Text1" class="tinymce" rows="10" cols="85" name="text">'.$res['Texts'].'</textarea><br><br>';
                echo '<img height="300px" width="600px" src="'.$res['Photos'].'"><br><br>';
                echo '<input type="file" id="fileDownload" accept="image/jpeg,image/png" name="filename_update1"><br><br>';
                echo '<input style="padding: 5px 10px;cursor:pointer;border:1px solid silver;" type=submit value='.tr::trans('download_photo').'></form>';
                echo '</form>';
                echo '</div>';
            }
        }
    }



    public static function Admin_news_add($data){
        if ($_SESSION['Login']=="Admin") {

            echo '<ul class="Content_block_Menu">';
            echo '<li><a class="upperCase" href="/user/all">'.tr::trans('users').'</a></li>';
            echo '<li><a class="upperCase" href="/user/news">'.tr::trans('news').'</a></li>';
            echo '<li><a class="upperCase" href="/user/send_buy">'.tr::trans('Purchase').'</a></li>';
            echo '<li><a class="upperCase" href="/user/production">'.tr::trans('Catalog').'</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar News_Add">';
            echo '<h2>'.tr::trans('new_text').'</h2>';


            echo '<form action="/user/New_News_Add" method="POST" onsubmit="return typeFile()"  enctype="multipart/form-data">';
            echo '<br><br><b>'.tr::trans('header').'</b><br>';
            echo '<input type="text" id="News_zagol" name="News_zagol" size="40" required><br><br>';
            echo '<b>'.tr::trans('body_news').'</b><br>';
            echo '<textarea style="border:1px solid silver;" id="News_Text" name="News_Text" class="tinymce" rows="10" cols="85" name="text"></textarea><br><br>';
            echo '<input type="file"  id="fileDownload" accept="image/jpeg,image/png" name="filename"><br><br>';
            echo '<input style="padding: 5px 10px;cursor:pointer;border:1px solid silver;" type=submit value='.tr::trans('download_photo').'></form>';
            echo '</form>';
            echo '</div>';
        }
    }


    public static function Admin_news($data){
        if ($_SESSION['Login']=="Admin") {

            echo '<ul class="Content_block_Menu">';
            echo '<li><a class="upperCase" href="/user/all">'.tr::trans('users').'</a></li>';
            echo '<li><a class="upperCase" href="/user/news">'.tr::trans('news').'</a></li>';
            echo '<li><a class="upperCase" href="/user/send_buy">'.tr::trans('Purchase').'</a></li>';
            echo '<li><a class="upperCase" href="/user/production">'.tr::trans('Catalog').'</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2>'.tr::trans('news_list').'</h2>';


            echo '<br><table cellspacing="0">';
            echo '<tr><th>'.tr::trans('Title').'</th><th>'.tr::trans('Text').'</th><th>'.tr::trans('date').'</th><th>'.tr::trans('user').'</th><th>'.tr::trans('Control').'</th></tr>';
            while($res=$data->fetch(PDO::FETCH_BOTH)){
                $date=date_create($res['Datas']);

                if ($_SESSION['lang']==="eng") {
                    echo '<tr><td>'.$res['NazvEn'].'</td><td>'.mb_substr($res['TextsEn'], 0, 100, 'UTF-8') . '...'.'</td><td>'.date_format($date,"H:i:s d.m.Y").'</td><td>'.$res['Users'].'</td><td>   <a href="/news/info/'.$res['id'].'"> <img src="/photo/info.png" width="22px"></a>   <a href="/user/correct_news/'.$res['id'].'"> <img src="/photo/red.png" width="25px"></a>    <a href="/user/delete_news/'.$res['id'].'"> <img src="/photo/del.png" width="25px"></a>   </td></tr>';

                } else {
                    echo '<tr><td>'.$res['Nazv'].'</td><td>'.mb_substr($res['Texts'], 0, 100, 'UTF-8') . '...'.'</td><td>'.date_format($date,"H:i:s d.m.Y").'</td><td>'.$res['Users'].'</td><td>   <a href="/news/info/'.$res['id'].'"> <img src="/photo/info.png" width="22px"></a>   <a href="/user/correct_news/'.$res['id'].'"> <img src="/photo/red.png" width="25px"></a>    <a href="/user/delete_news/'.$res['id'].'"> <img src="/photo/del.png" width="25px"></a>   </td></tr>';

                }
            }



            echo '</table><br>';
            echo '<a style="color:black;margin-left:700px;border:1px solid silver;padding: 5px 10px;" href="/user/news_add">'.tr::trans('add_news').'</a>';
            echo '</div>';
        }
    }

    public static function Admin_Catalog($data){
        if ($_SESSION['Login']=="Admin") {

            echo '<ul class="Content_block_Menu">';
            echo '<li><a class="upperCase" href="/user/all">'.tr::trans('users').'</a></li>';
            echo '<li><a class="upperCase" href="/user/news">'.tr::trans('news').'</a></li>';
            echo '<li><a class="upperCase" href="/user/send_buy">'.tr::trans('Purchase').'</a></li>';
            echo '<li><a class="upperCase" href="/user/production">'.tr::trans('Catalog').'</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar">';
            echo '<h2>'.tr::trans('List').'</h2>';
            echo '<br>';
            echo '<a style="color:black;margin-left:700px;border:1px solid silver;padding: 5px 10px;" href="/user/material_add">'.tr::trans('add_product').'</a>';
            echo '<br>';

            echo '<br><table cellspacing="0">';
            echo '<tr><th>'.tr::trans('Title').'</th><th>'.tr::trans('Text').'</th><th>'.tr::trans('Availability').'</th><th>'.tr::trans('Country').'</th><th>'.tr::trans('Color').'</th><th>'.tr::trans('Control').'</th></tr>';
            while($res=$data->fetch(PDO::FETCH_BOTH)){
                if ($_SESSION['lang']==="eng") {
                    echo '<tr><td>'.$res['NazvEN'].'</td><td>'.mb_substr($res['TextsEN'], 0, 100, 'UTF-8') . '...'.'</td><td>'.$res['Nalich'].'</td><td>'.$res['CountryEN'].'</td><td>'.$res['ColorEN'].'</td><td>   <a href="/tovar/info/'.$res['id'].'"> <img src="/photo/info.png" width="22px"></a>  <a href="/user/correct_materials/'.$res['id'].'"> <img src="/photo/red.png" width="25px"></a>    <a href="/user/delete_material/'.$res['id'].'"> <img src="/photo/del.png" width="25px"></a>   </td></tr>';

                } else {
                    echo '<tr><td>'.$res['Nazv'].'</td><td>'.mb_substr($res['Texts'], 0, 100, 'UTF-8') . '...'.'</td><td>'.$res['Nalich'].'</td><td>'.$res['Country'].'</td><td>'.$res['Colour'].'</td><td>   <a href="/tovar/info/'.$res['id'].'"> <img src="/photo/info.png" width="22px"></a>  <a href="/user/correct_materials/'.$res['id'].'"> <img src="/photo/red.png" width="25px"></a>    <a href="/user/delete_material/'.$res['id'].'"> <img src="/photo/del.png" width="25px"></a>   </td></tr>';

                }



            }

            echo '</table><br>';
            echo '</div>';
        }
    }




    public static function Admin_material_Correct($data){
        if ($_SESSION['Login']=="Admin") {
            while($res=$data->fetch(PDO::FETCH_BOTH))   {
                echo '<ul class="Content_block_Menu">';
                echo '<li><a class="upperCase" href="/user/all">'.tr::trans('users').'</a></li>';
                echo '<li><a class="upperCase" href="/user/news">'.tr::trans('news').'</a></li>';
                echo '<li><a class="upperCase" href="/user/send_buy">'.tr::trans('Purchase').'</a></li>';
                echo '<li><a class="upperCase" href="/user/production">'.tr::trans('Catalog').'</a></li>';
                echo '</ul>';
                echo '<div class="Content_block_Tovar">';
                echo '<h2>'.tr::trans('editing').'</h2>';



                echo '<form action="/user/New_Material_Update/'.$res['id'].'" method="POST" onsubmit="return typeFile()"  enctype="multipart/form-data">';
                echo '<br><b>'.tr::trans('Title').'</b><br>';

                if ($_SESSION['lang']==="eng") {
                    echo '<input value="'.$res['NazvEN'].'" type="text" id="Material_nazv" name="Material_nazv" size="40" required >';
                } else {
                    echo '<input value="'.$res['Nazv'].'" type="text" id="Material_nazv" name="Material_nazv" size="40" required>';
                }

                echo '<br><br><b>'.tr::trans('in_stock').'</b><br>';
                echo ($res['Nalich'] === '+') ? '<input  checked class="checkboxAdd" type="checkbox" name="Material_nalich" value="value1">' : '<input class="checkboxAdd" type="checkbox" name="Material_nalich" value="value1">';

                echo '<br><br><b>'.tr::trans('Cost').'</b><br>';
                echo '<input value="'.$res['Coin'].'" type="text" id="Material_coin" name="Material_coin" size="40" required pattern="[0-9]+([\.,][0-9]+)?">';

                echo '<br><br><b>'.tr::trans('Country').'</b><br>';

                if ($_SESSION['lang']==="eng") {
                    echo '<input value="'.$res['CountryEN'].'" type="text" id="Material_country" name="Material_country" size="40">';
                } else {
                    echo '<input value="'.$res['Country'].'" type="text" id="Material_country" name="Material_country" size="40">';
                }


                echo '<br><br><b>'.tr::trans('Color').'</b><br>';

                if ($_SESSION['lang']==="eng") {
                    echo '<input value="'.$res['ColorEN'].'" type="text" id="Material_colour" name="Material_colour" size="40">';
                } else {
                    echo '<input value="'.$res['Colour'].'" type="text" id="Material_colour" name="Material_colour" size="40">';
                }


                echo '<br><br><b>'.tr::trans('Material').'</b><br>';
                if ($_SESSION['lang']==="eng") {
                    echo '<input value="'.$res['MaterialEN'].'" type="text" id="Material_material" name="Material_material" size="40"><br><br>';

                } else {
                    echo '<input value="'.$res['Material'].'" type="text" id="Material_material" name="Material_material" size="40"><br><br>';

                }


                echo '<b>'.tr::trans('Type').'</b><br>';
                echo '<select style="border:1px solid silver;" id="Material_korpus" name="Material_korpus">';
                if ($res['Type']=='1') { echo '<option selected value="1">'.tr::trans('instruments').'</option>';}else{ echo '<option value="1">'.tr::trans('instruments').'</option>';}
                if ($res['Type']=='2') { echo '<option selected value="2">'.tr::trans('construct_mat').'</option>';}else{ echo '<option value="2">'.tr::trans('construct_mat').'</option>';}
                if ($res['Type']=='3') { echo '<option selected value="3">'.tr::trans('decor_mat').'</option>';}else{ echo '<option value="3">'.tr::trans('decor_mat').'</option>';}
                if ($res['Type']=='4') { echo '<option selected value="4">'.tr::trans('fasteners').'</option>';}else{ echo '<option value="4">'.tr::trans('fasteners').'</option>';}
                if ($res['Type']=='5') { echo '<option selected value="5">'.tr::trans('pilomat').'</option>';}else{ echo '<option value="5">'.tr::trans('pilomat').'</option>';}
                if ($res['Type']=='6') { echo '<option selected value="6">'.tr::trans('Other').'</option>';}else{ echo '<option value="6">'.tr::trans('Other').'</option>';}
                echo '</select><br><br>';

                echo '<b>'.tr::trans('Subtype').'</b><br>';
                echo '<select style="border:1px solid silver;" id="Material_Subtype" name="Material_Subtype">';
                if ($res['Type']=='1') {
                    if ($res['Subtype']=='1') { echo '<option selected value="1">'.tr::trans('brushes').'</option>';}else{ echo '<option value="1">'.tr::trans('brushes').'</option>';}
                    if ($res['Subtype']=='2') { echo '<option selected value="2">'.tr::trans('saws').'</option>';}else{ echo '<option value="2">'.tr::trans('saws').'</option>';}
                    if ($res['Subtype']=='3') { echo '<option selected value="3">'.tr::trans('drills').'</option>';}else{ echo '<option value="3">'.tr::trans('drills').'</option>';}
                    if ($res['Subtype']=='4') { echo '<option selected value="4">'.tr::trans('shovels').'</option>';}else{ echo '<option value="4">'.tr::trans('shovels').'</option>';}
                    if ($res['Subtype']=='5') { echo '<option selected value="5">'.tr::trans('spatula').'</option>';}else{ echo '<option value="5">'.tr::trans('spatula').'</option>';}
                }
                if ($res['Type']=='2') {
                    if ($res['Subtype']=='1') { echo '<option selected value="1">'.tr::trans('cement').'</option>';}else{ echo '<option value="1">'.tr::trans('cement').'</option>';}
                    if ($res['Subtype']=='2') { echo '<option selected value="2">'.tr::trans('sand').'</option>';}else{ echo '<option value="2">'.tr::trans('sand').'</option>';}
                    if ($res['Subtype']=='3') { echo '<option selected value="3">'.tr::trans('aerated_concrete').'</option>';}else{ echo '<option value="3">'.tr::trans('aerated_concrete').'</option>';}
                    if ($res['Subtype']=='4') { echo '<option selected value="4">'.tr::trans('heaters').'</option>';}else{ echo '<option value="4">'.tr::trans('heaters').'</option>';}
                    if ($res['Subtype']=='5') { echo '<option selected value="5">'.tr::trans('roof').'</option>';}else{ echo '<option value="5">'.tr::trans('roof').'</option>';}
                }
                if ($res['Type']=='3') {
                    if ($res['Subtype']=='1') { echo '<option selected value="1">'.tr::trans('glue').'</option>';}else{ echo '<option value="1">'.tr::trans('glue').'</option>';}
                    if ($res['Subtype']=='2') { echo '<option selected value="2">'.tr::trans('Paints').'</option>';}else{ echo '<option value="2">'.tr::trans('Paints').'</option>';}
                    if ($res['Subtype']=='3') { echo '<option selected value="3">'.tr::trans('Sealants').'</option>';}else{ echo '<option value="3">'.tr::trans('Sealants').'</option>';}
                    if ($res['Subtype']=='4') { echo '<option selected value="4">'.tr::trans('plumbing').'</option>';}else{ echo '<option value="4">'.tr::trans('plumbing').'</option>';}
                    if ($res['Subtype']=='5') { echo '<option selected value="5">'.tr::trans('Laminate').'</option>';}else{ echo '<option value="5">'.tr::trans('Laminate').'</option>';}
                }
                if ($res['Type']=='4') {
                    if ($res['Subtype']=='1') { echo '<option selected value="1">'.tr::trans('screws').'</option>';}else{ echo '<option value="1">'.tr::trans('screws').'</option>';}
                    if ($res['Subtype']=='2') { echo '<option selected value="2">'.tr::trans('Nails').'</option>';}else{ echo '<option value="2">'.tr::trans('Nails').'</option>';}
                    if ($res['Subtype']=='3') { echo '<option selected value="3">'.tr::trans('Studs').'</option>';}else{ echo '<option value="3">'.tr::trans('Studs').'</option>';}
                    if ($res['Subtype']=='4') { echo '<option selected value="4">'.tr::trans('Screw').'</option>';}else{ echo '<option value="4">'.tr::trans('Screw').'</option>';}
                    if ($res['Subtype']=='5') { echo '<option selected value="5">'.tr::trans('Washers').'</option>';}else{ echo '<option value="5">'.tr::trans('Washers').'</option>';}
                }
                if ($res['Type']=='5') {
                    if ($res['Subtype']=='1') { echo '<option selected value="1">'.tr::trans('Timber').'</option>';}else{ echo '<option value="1">'.tr::trans('Timber').'</option>';}
                    if ($res['Subtype']=='2') { echo '<option selected value="2">'.tr::trans('Chipboard').'</option>';}else{ echo '<option value="2">'.tr::trans('Chipboard').'</option>';}
                    if ($res['Subtype']=='3') { echo '<option selected value="3">'.tr::trans('Osb').'</option>';}else{ echo '<option value="3">'.tr::trans('Osb').'</option>';}
                    if ($res['Subtype']=='4') { echo '<option selected value="4">'.tr::trans('Plywood').'</option>';}else{ echo '<option value="4">'.tr::trans('Plywood').'</option>';}
                }
                if ($res['Type']=='6') {
                    echo '<option selected value="1">'.tr::trans('Other').'</option>';
                }

                echo '</select><br><br>';

                echo '<b>'.tr::trans('Description').'</b><br>';
                if ($_SESSION['lang']==="eng") {
                    echo '<textarea style="border:1px solid silver;" id="Material_opis" name="Material_opis" rows="10" cols="85" name="text">'.$res['TextsEN'].'</textarea><br><br>';
                } else {
                    echo '<textarea style="border:1px solid silver;" id="Material_opis" name="Material_opis" rows="10" cols="85" name="text">'.$res['Texts'].'</textarea><br><br>';
                }

                echo '<br><table class="dt" cellspacing="0">';
                echo '<tr><th>Фото</th></tr>';

                echo '<tr>  <td><input id="fileDownload" type="file" accept="image/jpeg,image/png" name="filename_photo1"></td>   </tr>';
                echo '<tr>  <td><img src="'.$res['Photo1'].'"> <a style="color:red;" href="/user/Delete_Photo1/'.$res['id'].'">X</a></td>   </tr>';
                echo '</table><br>';

                echo '<input style="padding: 5px 10px;cursor:pointer;border:1px solid silver;" type=submit value='.tr::trans('download_photo').'></form>';
                echo '</form>';
                echo '</div>';
            }
        }
    }


    public static function Admin_material_Add($data){
        if ($_SESSION['Login']=="Admin") {

            echo '<ul class="Content_block_Menu">';
            echo '<li><a class="upperCase" href="/user/all">'.tr::trans('users').'</a></li>';
            echo '<li><a class="upperCase" href="/user/news">'.tr::trans('news').'</a></li>';
            echo '<li><a class="upperCase" href="/user/send_buy">'.tr::trans('Purchase').'</a></li>';
            echo '<li><a class="upperCase" href="/user/production">'.tr::trans('Catalog').'</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar Material_Add">';
            echo '<h2>'.tr::trans('new_text').'</h2>';


            echo '<form action="/user/New_Material_add" method="POST" onsubmit="return typeFile()"  enctype="multipart/form-data">';
            echo '<br><b>'.tr::trans('Title').'</b><br>';
            echo '<input type="text" id="Material_nazv" name="Material_nazv" size="40" required>';

            echo '<br><br><b>'.tr::trans('Availability').'</b><br>';
            echo '<input class="checkboxAdd" type="checkbox" name="Material_nalich" value="value1">';


            echo '<br><br><b>'.tr::trans('Cost').'</b><br>';
            echo '<input placeholder="Введите числовое значение" type="text" id="Material_coin" name="Material_coin" size="40" required pattern="[0-9]+([\.,][0-9]+)?">';

            echo '<br><br><b>'.tr::trans('Country').'</b><br>';
            echo '<input type="text" id="Material_country" name="Material_country" size="40">';

            echo '<br><br><b>'.tr::trans('Color').'</b><br>';
            echo '<input type="text" id="Material_colour" name="Material_colour" size="40">';

            echo '<br><br><b>'.tr::trans('Material').'</b><br>';
            echo '<input type="text" id="Material_material" name="Material_material" size="40"><br><br>';

            echo '<b>'.tr::trans('Type').'</b><br>';

            echo '<select style="border:1px solid silver;" id="Material_korpus" name="Material_korpus">';
            echo '<option value="1">'.tr::trans('instruments').'</option><option value="2">'.tr::trans('construct_mat').'</option><option value="3">'.tr::trans('decor_mat').'</option><option value="4">'.tr::trans('fasteners').'</option><option value="5">'.tr::trans('pilomat').'</option><option value="6">'.tr::trans('Other').'</option>';
            echo '</select><br><br>';

            echo '<b>'.tr::trans('Subtype').'</b><br>';

            echo '<select style="border:1px solid silver;" id="Material_Subtype" name="Material_Subtype">';
            echo '<optgroup label="'.tr::trans('instruments').'">';
            echo '<option value="1">'.tr::trans('brushes').'</option>';
            echo '<option value="2">'.tr::trans('saws').'</option>';
            echo '<option value="3">'.tr::trans('drills').'</option>';
            echo '<option value="4">'.tr::trans('shovels').'</option>';
            echo '<option value="5">'.tr::trans('spatula').'</option>';
            echo '</optgroup>';
            echo '<optgroup label="'.tr::trans('construct_mat').'">';
            echo '<option value="1">'.tr::trans('cement').'</option>';
            echo '<option value="2">'.tr::trans('sand').'</option>';
            echo '<option value="3">'.tr::trans('aerated_concrete').'</option>';
            echo '<option value="4">'.tr::trans('heaters').'</option>';
            echo '<option value="5">'.tr::trans('roof').'</option>';
            echo '</optgroup>';
            echo '<optgroup label="'.tr::trans('decor_mat').'">';
            echo '<option value="1">'.tr::trans('glue').'</option>';
            echo '<option value="2">'.tr::trans('Paints').'</option>';
            echo '<option value="3">'.tr::trans('Sealants').'</option>';
            echo '<option value="4">'.tr::trans('plumbing').'</option>';
            echo '<option value="5">'.tr::trans('Laminate').'</option>';
            echo '</optgroup>';
            echo '<optgroup label="'.tr::trans('fasteners').'">';
            echo '<option value="1">'.tr::trans('screws').'</option>';
            echo '<option value="2">'.tr::trans('Nails').'</option>';
            echo '<option value="3">'.tr::trans('Studs').'</option>';
            echo '<option value="4">'.tr::trans('Screw').'</option>';
            echo '<option value="5">'.tr::trans('Washers').'</option>';
            echo '</optgroup>';
            echo '<optgroup label="'.tr::trans('pilomat').'">';
            echo '<option value="1">'.tr::trans('Timber').'</option>';
            echo '<option value="2">'.tr::trans('Chipboard').'</option>';
            echo '<option value="3">'.tr::trans('Osb').'</option>';
            echo '<option value="4">'.tr::trans('Plywood').'</option>';
            echo '</optgroup>';
            echo '<optgroup label="'.tr::trans('Other').'">';
            echo '<option value="1">'.tr::trans('Other').'</option>';
            echo '</optgroup>';
            echo '</select><br><br>';

            echo '<b>'.tr::trans('Description').'</b><br>';
            echo '<textarea style="border:1px solid silver;" id="Material_opis" name="Material_opis" rows="10" cols="45" name="text"></textarea><br><br>';

            echo '<input type="file" id="fileDownload" name="filename" accept="image/jpeg,image/png"><br><br>';
            echo '<input style="padding: 5px 10px;cursor:pointer;border:1px solid silver;" type=submit value='.tr::trans('download_photo').'></form>';
            echo '</form>';
            echo '</div>';
        }}


    public static function Admin_buy_material($data){
        if ($_SESSION['Login']=="Admin") {
            echo '<ul class="Content_block_Menu">';
            echo '<li><a class="upperCase" href="/user/all">'.tr::trans('users').'</a></li>';
            echo '<li><a class="upperCase" href="/user/news">'.tr::trans('news').'</a></li>';
            echo '<li><a class="upperCase" href="/user/send_buy">'.tr::trans('Purchase').'</a></li>';
            echo '<li><a class="upperCase" href="/user/production">'.tr::trans('Catalog').'</a></li>';
            echo '</ul>';
            echo '<div class="Content_block_Tovar Admin_Tovar">';
            echo '<h2>'.tr::trans('Purchase').'</h2>';
            if (!$data->fetch(PDO::FETCH_ASSOC)) {
                echo '<p class="emptyBasket">'.tr::trans('no_yet').'</p>';
            } else {
                require_once 'application/config/Db.php';
                $db=Db::getConnection();
                $string="Select *from Buy";
                $container=$db->prepare($string);
                $container->execute();

                echo '<br><table cellspacing="0">';
                echo '<tr><th>'.tr::trans('order_number').'</th><th>'.tr::trans('buyer_login').'</th><th>'.tr::trans('buyer_email').'</th><th>'.tr::trans('tel').'</th><th>'.tr::trans('totalCost').'</th><th>'.tr::trans('order_date').'</th><th>'.tr::trans('order_status').'</th><th>'.tr::trans('Control').'</th><th>'.tr::trans('orderControl').'</th></tr>';
                while($res=$container->fetch(PDO::FETCH_BOTH)){
                    echo '<tr>';

                    require_once 'application/config/Db.php';
                    $db=Db::getConnection();
                    $str="Select *from Login where id='".$res['userId']."'";
                    $result=$db->prepare($str);
                    $result->execute();
                    while($res2=$result->fetch(PDO::FETCH_BOTH)){
                        $date=date_create($res['Datas']);
                        echo '<td> '.$res['orderId'].' </td>';
                        echo '<td> '.$res2['Names'].' </td>';
                        echo '<td> '.$res2['Emails'].' </td>';
                        echo '<td> '.$res2['Tels'].'</td>';
                        echo '<td> '.$res['totalCost'].' '.tr::trans('rub').'</td>';
                        echo '<td> '.date_format($date,"H:i:s d.m.Y").' </td>';


                        if ($res['Sost']=='0') {echo '<td>'.tr::trans('sost0').'</td>';}
                        if ($res['Sost']=='1') {echo '<td>'.tr::trans('sost1').'</td>';}
                        if ($res['Sost']=='2') {echo '<td>'.tr::trans('sost2').'</td>';}
                        echo '<td>   <a href="/user/orderInfo/'.$res['orderId'].'"> <img src="/photo/info.png" width="22px"></a>  <a href="/user/delete_buy2/'.$res['orderId'].'"> <img src="/photo/del.png" width="25px"></a> </td>';
                        echo '<td>   <a style="color:green;" href="/user/yes/'.$res['orderId'].'">'.tr::trans('Accept').'</a>  <a style="color:red;" href="/user/noy/'.$res['orderId'].'">'.tr::trans('Reject').'</a> </td>';

                        echo '</tr>';
                    }}
                echo '</table>';
            }
            echo '</div>';

        }}

}