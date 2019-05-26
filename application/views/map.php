<div class="Karta">
<h2 class="upperCase"><? echo  tr::trans('Road')?></h2><br>
    <? if ($_SESSION['lang']==="eng") {
       echo '<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A12e46adb5c0a0e38af7658e6645fcf437dcc525400147fea82311d88899176cb&amp;width=1200&amp;height=600&amp;lang=en_US&amp;scroll=true"></script>';
        } else {
        echo '<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Afa49e20bd861df1c5c909c2f1c8bb3bc9f319cb235975b5d3dec31bdaa0d7159&amp;width=1200&amp;height=600&amp;lang=ru_RU&amp;scroll=true"></script>';

    }
    ?>
</div>