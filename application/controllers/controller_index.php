<?php

class Controller_index extends Controller
{

	function action_index()
	{	
	$this->view->generate('index.php', 'template_view.php');
	}

	function action_rus()
	{	header("Location: ".$_SERVER["HTTP_REFERER"]);
	}

	function action_english()
	{	header("Location: ".$_SERVER["HTTP_REFERER"]);
	}

}



