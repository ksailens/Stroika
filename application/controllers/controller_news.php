<?php

class Controller_news extends Controller
{

	function action_index($rezult)
	{	
	$this->view->generate('news.php', 'template_view.php',$rezult);	
	}

	function action_info($rezult)
	{	
	$this->view->generate('news_info.php', 'template_view.php',$rezult);	
	}


}



