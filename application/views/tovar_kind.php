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
    <li><a class="upperCase" href="/tovar/instruments"><? echo tr::trans('instruments') ?></a></li>
    <ul class="Submenu">
        <li><a class="upperCase" href="/tovar/instruments_brushes"><? echo tr::trans('brushes') ?></a></li>
        <li><a class="upperCase" href="/tovar/instruments_handsaw"><? echo tr::trans('saws') ?></a></li>
        <li><a class="upperCase" href="/tovar/instruments_drill"><? echo tr::trans('drills') ?></a></li>
        <li><a class="upperCase" href="/tovar/instruments_shovel"><? echo tr::trans('shovels') ?></a></li>
        <li><a class="upperCase" href="/tovar/instruments_spatula"><? echo tr::trans('spatula') ?></a></li>
    </ul>
    <li><a class="upperCase" href="/tovar/buildMat"><? echo tr::trans('construct_mat') ?></a></li>
    <ul class="Submenu">
        <li><a class="upperCase" href="/tovar/buildMat_cement"><? echo tr::trans('cement') ?></a></li>
        <li><a class="upperCase" href="/tovar/buildMat_sand"><? echo tr::trans('sand') ?></a></li>
        <li><a class="upperCase" href="/tovar/buildMat_gasConcrete"><? echo tr::trans('aerated_concrete') ?></a></li>
        <li><a class="upperCase" href="/tovar/buildMat_insulation"><? echo tr::trans('heaters') ?></a></li>
        <li><a class="upperCase" href="/tovar/buildMat_roof"><? echo tr::trans('roof') ?></a></li>
    </ul>
    <li><a class="upperCase" href="/tovar/decorMat"><? echo tr::trans('decor_mat') ?></a></li>
    <ul class="Submenu">
        <li><a class="upperCase" href="/tovar/decorMat_glue"><? echo tr::trans('glue') ?></a></li>
        <li><a class="upperCase" href="/tovar/decorMat_paint"><? echo tr::trans('Paints') ?></a></li>
        <li><a class="upperCase" href="/tovar/decorMat_sealant"><? echo tr::trans('Sealants') ?></a></li>
        <li><a class="upperCase" href="/tovar/decorMat_plumbing"><? echo tr::trans('plumbing') ?></a></li>
        <li><a class="upperCase" href="/tovar/decorMat_laminate"><? echo tr::trans('Laminate') ?></a></li>
    </ul>
    <li><a class="upperCase" href="/tovar/fasteners"><? echo tr::trans('fasteners') ?></a></li>
    <ul class="Submenu">
        <li><a class="upperCase" href="/tovar/fasteners_screw"><? echo tr::trans('screws') ?></a></li>
        <li><a class="upperCase" href="/tovar/fasteners_spike"><? echo tr::trans('Nails') ?></a></li>
        <li><a class="upperCase" href="/tovar/fasteners_pin"><? echo tr::trans('Studs') ?></a></li>
        <li><a class="upperCase" href="/tovar/fasteners_nut"><? echo tr::trans('Screw') ?></a></li>
        <li><a class="upperCase" href="/tovar/fasteners_collar"><? echo tr::trans('Washers') ?></a></li>
    </ul>
    <li><a class="upperCase" href="/tovar/lumber"><? echo tr::trans('pilomat') ?></a></li>
    <ul class="Submenu">
        <li><a class="upperCase" href="/tovar/lumber_plank"><? echo tr::trans('Timber') ?></a></li>
        <li><a class="upperCase" href="/tovar/lumber_dsp"><? echo tr::trans('Chipboard') ?></a></li>
        <li><a class="upperCase" href="/tovar/lumber_osb"><? echo tr::trans('Osb') ?></a></li>
        <li><a class="upperCase" href="/tovar/lumber_plywood"><? echo tr::trans('Plywood') ?></a></li>
    </ul>
    <li><a class="upperCase" href="/tovar/other"><? echo tr::trans('Other') ?></a></li>
</ul>
    <ul class="Content_block_Tovar">
        <div class="upperCase" class="Info"><? echo tr::trans('our_goods') ?></div>

<?php
User_Function::Tovar_kind($data);
?>

</ul>
</div>