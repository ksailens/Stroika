<div id="slider" class="slider_wrap">
		<img src="/photo/1.jpg" alt="" />
		<img src="/photo/2.jpg" alt="" />
		<img src="/photo/3.jpg" alt="" />
		<img src="/photo/4.jpg" alt="" />
		<img src="/photo/5.jpg" alt="" />
		<img src="/photo/6.jpg" alt="" />
		<img src="/photo/7.jpg" alt="" />
</div>

<div class="Content_block">

<ul class="Content_block_Menu">

    <li><a href="/tovar/chair">ИНСТРУМЕНТЫ</a></li>
        <ul class="Submenu">
            <li><a href="/tovar/chair_livingroom">КИСТИ И ВАЛИКИ</a></li>
            <li><a href="/tovar/chair_bedroom">НОЖОВКИ И ПИЛЫ</a></li>
            <li><a href="/tovar/chair_diningroom">БУРЫ И СВЕРЛА</a></li>
            <li><a href="/tovar/chair_bathroom">ЛОПАТЫ</a></li>
            <li><a href="/tovar/chair_street">ШПАТЕЛЯ</a></li>
            <!--        <li><a href="/tovar/chair_another">ДРУГОЕ</a></li>-->
        </ul>
    <li><a href="/tovar/beds">СТРОИТЕЛЬНЫЕ МАТЕРИАЛЫ</a></li>
        <ul class="Submenu">
            <li><a href="/tovar/beds_livingroom">ЦЕМЕНТ И ДОБАВКИ</a></li>
            <li><a href="/tovar/beds_bedroom">ПЕСОК И ЩЕБЕНЬ</a></li>
            <li><a href="/tovar/beds_diningroom">ГАЗОБЕТОН</a></li>
            <li><a href="/tovar/beds_bathroom">УТЕПЛИТЕЛИ</a></li>
            <li><a href="/tovar/beds_street">КРОВЛЯ</a></li>
            <!--        <li><a href="/tovar/beds_another">ДРУГОЕ</a></li>-->
        </ul>
    <li><a href="/tovar/sofa">ОТДЕЛОЧНЫЕ МАТЕРИАЛЫ</a></li>
        <ul class="Submenu">
            <li><a href="/tovar/sofa_livingroom">КЛЕЙ</a></li>
            <li><a href="/tovar/sofa_bedroom">КРАСКИ И ЛАКИ</a></li>
            <li><a href="/tovar/sofa_diningroom">ГЕРМЕТИКИ И ПЕНА</a></li>
            <li><a href="/tovar/sofa_bathroom">ПЛИТКА И САНТЕХНИКА</a></li>
            <li><a href="/tovar/sofa_street">ЛАМИНАТ</a></li>
            <!--        <li><a href="/tovar/sofa_another">ДРУГОЕ</a></li>-->
        </ul>
    <li><a href="/tovar/table">КРЕПЕЖИ</a></li>
        <ul class="Submenu">
            <li><a href="/tovar/table_livingroom">САМОРЕЗЫ</a></li>
            <li><a href="/tovar/table_bedroom">ГВОЗДИ</a></li>
            <li><a href="/tovar/table_diningroom">ШПИЛЬКИ</a></li>
            <li><a href="/tovar/table_bathroom">ГАЙКИ</a></li>
            <li><a href="/tovar/table_street">ШАЙБЫ</a></li>
            <!--        <li><a href="/tovar/table_another">ДРУГОЕ</a></li>-->
        </ul>
    <li><a href="/tovar/closet">ПИЛОМАТЕРИАЛЫ</a></li>
        <ul class="Submenu">
            <li><a href="/tovar/closet_livingroom">БРУС И ДОСКА</a></li>
            <li><a href="/tovar/closet_bedroom">ДСП И ДВП</a></li>
            <li><a href="/tovar/closet_diningroom">ОСБ</a></li>
            <li><a href="/tovar/closet_bathroom">ФАНЕРА</a></li>
            <!--        <li><a href="/tovar/closet_street">ДЛЯ УЛИЦЫ</a></li>-->
            <!--        <li><a href="/tovar/closet_another">ДРУГОЕ</a></li>-->
        </ul>
    <li><a href="/tovar/other">ДРУГОЕ</a></li>

</ul>

<ul class="Content_block_Tovar">
	<div class="Info">НАШИ ТОВАРЫ</div>

<?php
User_Function::Tovar_kind($data);
?>




	
	
	

</ul>	

</div>