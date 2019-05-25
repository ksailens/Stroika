<?php

class Controller_kont extends Controller
{

	function action_index()
	{	
	$this->view->generate('kont.php', 'template_view.php');
	}

}



