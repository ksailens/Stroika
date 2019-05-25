<?php

class Controller_map extends Controller
{

	function action_index()
	{	
	$this->view->generate('map.php', 'template_view.php');
	}

}



