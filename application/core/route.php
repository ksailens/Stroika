<?php
class Route
{
	static function start()
	{
		// контроллер и действие по умолчанию
    	$controller_name = 'index';
		$action_name = 'index';
		
		$ps=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

//________________________________________________________________________________________________________________________
		$routes = explode('/', $ps);     //Разделяет строку по массивам
		if ( !empty($routes[1]) ){$controller_name = $routes[1];}	// Имя контролера
		if ( !empty($routes[2]) ){$action_name = $routes[2];}		//Имя вызываемого метода
		if ( !empty($routes[3]) ){$nums = $routes[3];}		//Имя вызываемого метода

		// добавляем префиксы
		$model_name = 'model_'.$controller_name;				//К примеру Model_Glavnaya 
		$controller_name = 'Controller_'.$controller_name;		//Controller_Glavnaya
		$action_name = 'action_'.$action_name;					//action_index      ф-я

//_________________________________________________________________________________________________________________________
		$model_file = strtolower($model_name).'.php';		//Все заглавные буквы становятся маленькими
		$model_path = $_SERVER['DOCUMENT_ROOT'].'/application/models/'.$model_file;	//Полный путь
    
		if(file_exists($model_path))	//Если существует модель то подключаем её
		{
			include $_SERVER['DOCUMENT_ROOT'].'/application/models/'.$model_file;	
		}
		else
		{
			echo "Ошибка модели <br>";
		}
		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';		
		$controller_path = $_SERVER['DOCUMENT_ROOT'].'/application/controllers/'.$controller_file;
		if(file_exists($controller_path))
		{
			include $_SERVER['DOCUMENT_ROOT'].'/application/controllers/'.$controller_file;
		}
		else
		{
			echo "Ошибка контроллера <br>";
		}
//_________________________________________________________________________________________________________________________

		$controller = new $controller_name;
		$action = $action_name;	
		$models = new $model_name;
		
		if(method_exists($models, $action))  //Существует ли метод в action в классе models
		{
			

			if (!empty($routes[3])) {
			$Rezult_model=$models->$action($routes[3]);
			}
			else{
			$Rezult_model=$models->$action();		//Вызывается модель	
			}
			
		}
		else
		{
			echo "Ошибка метода модели <br>";
		}

		if(method_exists($controller, $action))  //Существует ли метод в action в классе controller
		{
			if (!empty($routes[3])) {
			$controller->$action($Rezult_model,$routes[3]);
			}
			else{
			$controller->$action($Rezult_model);		//Вызывается контроллер	
			}
			
		}
		else
		{
			echo "Ошибка метода контроллера <br>";
		}

	}
    
}

