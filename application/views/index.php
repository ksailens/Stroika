<div id="slider" class="slider_wrap">
		<img src="photo/1.jpg" alt="" />
		<img src="photo/2.jpg" alt="" />
		<img src="photo/3.jpg" alt="" />
		<img src="photo/4.jpg" alt="" />
		<img src="photo/5.jpg" alt="" />
		<img src="photo/6.jpg" alt="" />
		<img src="photo/7.jpg" alt="" />
</div>

<div class="Content_block">
    <ul class="Content_block_IndexNews">
        <div class="NewsHeader">Последние новости</div>
        <?php
        User_Function::IndexNews();
        ?>
    </ul>


    <?php
        User_Function::Index($data);
    ?>
</div>