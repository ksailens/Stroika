<?php

class Controller_tovar extends Controller
{

	function action_index($rezult)
	{	
	$this->view->generate('tovar.php', 'template_view.php',$rezult);	
	}

	function action_info($rezult)
	{	
	$this->view->generate('mebels_info.php', 'template_view.php',$rezult);
	}

	function action_chair($rezult)
	{	
	$this->view->generate('tovar_kind.php', 'template_view.php',$rezult);	
	}

	function action_beds($rezult)
	{	
	$this->view->generate('tovar_kind.php', 'template_view.php',$rezult);	
	}

	function action_sofa($rezult)
	{	
	$this->view->generate('tovar_kind.php', 'template_view.php',$rezult);	
	}

	function action_table($rezult)
	{	
	$this->view->generate('tovar_kind.php', 'template_view.php',$rezult);	
	}

	function action_closet($rezult)
	{	
	$this->view->generate('tovar_kind.php', 'template_view.php',$rezult);	
	}

	function action_other($rezult)
	{	
	$this->view->generate('tovar_kind.php', 'template_view.php',$rezult);	
	}

    /*Функции для многоуровней иерархии */

    /*Кресла*/

    function action_chair_livingroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_chair_bedroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_chair_diningroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_chair_bathroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_chair_street($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_chair_another($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    /*Кровати*/

    function action_beds_livingroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_beds_bedroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_beds_diningroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_beds_bathroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_beds_street($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_beds_another($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    /*Диваны*/

    function action_sofa_livingroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_sofa_bedroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_sofa_diningroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_sofa_bathroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_sofa_street($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_sofa_another($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    /*Столы*/

    function action_table_livingroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_table_bedroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_table_diningroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_table_bathroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_table_street($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_table_another($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    /*Шкафы*/

    function action_closet_livingroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_closet_bedroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_closet_diningroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_closet_bathroom($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_closet_street($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }

    function action_closet_another($rezult)
    {
        $this->view->generate('tovar_kind.php', 'template_view.php',$rezult);
    }



}



