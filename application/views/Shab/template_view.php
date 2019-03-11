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

<div class="Top_content">

<ul class="Emblem">
    <a href="/index">

        <li style="color:#f1f558; text-shadow: black 0 0 10px;">СЕВ</li>
        <li style="color:white;">СТРОЙ</li>
    </a>
</ul>

<ul class="Top_content_menu">
<li><a href="/user">ЛИЧНЫЙ КАБИНЕТ</a></li>
<li style="position:relative;"><a>РУССКИЙ</a>
<ul class="qwe">
<li><a><div id="google_translate_element"></div></a></li>

</ul>
</li>
<li><a href="/avtoriz">АВТОРИЗАЦИЯ</a></li>
<li><a href="/sait_map">КАРТА САЙТА</a></li>
</ul>


<script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'ru'
  }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>	



</div>
<ul class="Main_Menu">
		<li><a href="/index">ГЛАВНАЯ СТРАНИЦА</a></li>
		<li><a href="/news">НОВОСТИ И АКЦИИ</a></li>
		<li><a href="/tovar">КАТАЛОГ НАШЕЙ ПРОДУКЦИИ</a></li>
		<li><a href="/kont">СВЯЖИТЕСЬ С НАМИ</a></li>
		<li><a href="/map">СХЕМА ПРОЕЗДА</a></li>

<?php
if (isset($_SESSION['Login'])) {
	echo "<p class='avtor'>Добро пожаловать, <span>".$_SESSION['Login']."</span>! <a style='color:silver;' href='/avtoriz/logout'>Выход</a></p>";
}
else{
	echo "<p class='avtor'>Добро пожаловать, <span>Гость</span>!</p>";
}
?>




</ul>

<div class="Content_block">
<?php
	include 'application/views/'.$content_view;
?>
</div>


<br><br>
<footer>
<p>ОНЛАЙН МАГАЗИН СТРОИТЕЛЬНЫХ МАТЕРИАЛОВ</p>
<p>ПОД ЗАКАЗ</p>
<p>ВСЕ ПРАВА ЗАЩИЩЕНЫ</p>
<p> GRIDI&#169; </p>
<p></p>

</footer>

</body>



</html>
