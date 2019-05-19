<?php

class Controller_avtoriz extends Controller
{

	function action_index()
	{	
		$this->view->generate('avtoriz.php', 'template_view.php');	
	}


	function action_logout(){
		header("Location: /index");	
	}


	function action_logined()
	{
		if (isset($_SESSION['Login'])) {
		header("Location: /user");
		}	
		else{
		header("Location: /index");	
		}
	}

}



