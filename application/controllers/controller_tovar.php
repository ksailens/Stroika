<?php

class Controller_tovar extends Controller
{

	function action_index($rezult)
	{	
	$this->view->generate('tovar.php', 'template_view.php',$rezult);
	}

	function action_info($rezult)
	{	
	$this->view->generate('materials_info.php', 'template_view.php',$rezult);
	}

	function action_instruments($rezult)
	{	
	$this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
	}

	function action_buildMat($rezult)
	{	
	$this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
	}

	function action_decorMat($rezult)
	{	
	$this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
	}

	function action_fasteners($rezult)
	{	
	$this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
	}

	function action_lumber($rezult)
	{	
	$this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
	}

	function action_other($rezult)
	{	
	$this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
	}

    /*Функции для многоуровней иерархии */

    /*Инструменты*/

    function action_instruments_brushes($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_instruments_handsaw($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_instruments_drill($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_instruments_shovel($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_instruments_spatula($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

       /*Строительные материалы*/

    function action_buildMat_cement($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_buildMat_sand($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_buildMat_gasConcrete($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_buildMat_insulation($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_buildMat_roof($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    /*Отделочные материалы*/

    function action_decorMat_glue($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_decorMat_paint($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_decorMat_sealant($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_decorMat_plumbing($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_decorMat_laminate($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

        /*Крепежи*/

    function action_fasteners_screw($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_fasteners_spike($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_fasteners_pin($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_fasteners_nut($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_fasteners_collar($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    /*Пиломатериалы*/

    function action_lumber_plank($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_lumber_dsp($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_lumber_osb($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_lumber_plywood($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

  }



