<?php
require_once 'application/config/Db.php';
class model_news extends Model
{

	function action_index()
	{	
		$db=Db::getConnection();
		$str="Select *from News ORDER BY Datas DESC";
		$result=$db->prepare($str);
		$result->execute();
		return $result;
	}

	function action_info($num)
	{	
		$db=Db::getConnection();
		$str="Select *from News where id='".$num."'";
		$result=$db->prepare($str);
		$result->execute();
		return $result;
	}


	}




