<?php

class Controller_sait_map extends Controller
{

	function action_index()
	{	
	$this->view->generate('sait_map.php', 'template_view.php');
	}

}



