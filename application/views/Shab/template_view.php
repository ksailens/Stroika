<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/css/Styles.css">
    <meta charset="UTF-8">

    <script type="text/javascript" src="/js/jjj.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/tinymce/jquery.tinymce.min.js"></script>
    <script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="/js/tinymce/init-tinymce.js"></script>

    <script type="text/javascript">
        $(function asd() {
            var el =  $('#slider img'),
                indexImg = 1,
                indexMax = el.length;

            function autoCange () {
                if (indexMax!=1) {
                    indexImg++;
                    if(indexImg > indexMax) {
                        indexImg = 1;
                    }
                    el.fadeOut(700);
                    el.filter(':nth-child('+indexImg+')').fadeIn(700);
                }
            }
            setInterval(autoCange, 7000);
        });

    </script>

</head>

<body>
<div class="wrapper">

    <div class="Top_content">

        <ul class="Emblem">
            <a href="/index">

                <li class="upperCase" style="color:#f1f558; text-shadow: black 0 0 10px;"><? echo tr::trans('logo1')?></li>
                <li class="upperCase" style="color:white;"><? echo tr::trans('logo2')?></li>
            </a>
        </ul>

        <ul class="Top_content_menu">
            <li><a class="upperCase" href="/index/rus"><? echo tr::trans('russian')?></a></li>
            <li><a class="upperCase" href="/index/english"><? echo tr::trans('english')?></a></li>
            <li><a class="upperCase" href="/user"><? echo tr::trans('personal_cabinet')?></a></li>
            <li><a class="upperCase" href="/avtoriz"><? echo tr::trans('Authorization')?></a></li>
            <li><a class="upperCase" href="/sait_map"><? echo tr::trans('site_map')?></a></li>
        </ul>

    </div>
    <ul class="Main_Menu">
        <li><a class="upperCase" href="/index"><? echo tr::trans('main')?></a></li>
        <li><a class="upperCase" href="/news"><? echo tr::trans('news')?></a></li>
        <li><a class="upperCase" href="/tovar"><? echo tr::trans('our_catalog')?></a></li>
        <li><a class="upperCase" href="/kont"><? echo tr::trans('tell_us')?></a></li>
        <li><a class="upperCase" href="/map"><? echo tr::trans('scheme_road')?></a></li>

        <?php
        if (isset($_SESSION['Login'])) {
            echo "<p class='avtor'>".tr::trans('welcome').", <span>".$_SESSION['Login']."</span>! <a style='color:silver;' href='/avtoriz/logout'>".tr::trans('exit')."</a></p>";
        }
        else{
            echo "<p class='avtor'>".tr::trans('welcome').", <span>".tr::trans('guest')."</span>!</p>";
        }
        ?>




    </ul>

    <div class="wrapper_content_block">
        <?php
        include 'application/views/'.$content_view;
        ?>
    </div>


    <footer>
        <p class="upperCase"><? echo tr::trans('footer1')?></p>
        <p class="upperCase"><? echo tr::trans('footer2')?></p>
        <p class="upperCase"><? echo tr::trans('footer3')?></p>
        <p> GRIDI&#169; 2019</p>
        <p></p>
    </footer>
</div>

</body>



</html>
