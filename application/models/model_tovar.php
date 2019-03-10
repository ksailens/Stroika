<?php
require_once 'application/config/Db.php';
class model_tovar extends Model
{

	function action_index()
	{	
		$db=Db::getConnection();
		$str="Select *from Catalog ORDER BY Datas DESC";
		$result=$db->prepare($str);
		$result->execute();
		return $result;
	}

	function action_info($num)
	{	
		$db=Db::getConnection();
		$str="Select *from Catalog where id='".$num."'";
		$result=$db->prepare($str);
		$result->execute();
		return $result;
	}


	function action_chair()
	{	
		$db=Db::getConnection();
		$str="Select *from Catalog where Type=1";
		$result=$db->prepare($str);
		$result->execute();
		return $result;
	}

	function action_beds()
	{	
		$db=Db::getConnection();
		$str="Select *from Catalog where Type=2";
		$result=$db->prepare($str);
		$result->execute();
		return $result;	
	}

	function action_sofa()
	{	
		$db=Db::getConnection();
		$str="Select *from Catalog where Type=3";
		$result=$db->prepare($str);
		$result->execute();
		return $result;
	}

	function action_table()
	{	
		$db=Db::getConnection();
		$str="Select *from Catalog where Type=4";
		$result=$db->prepare($str);
		$result->execute();
		return $result;
	}

	function action_closet()
	{	
		$db=Db::getConnection();
		$str="Select *from Catalog where Type=5";
		$result=$db->prepare($str);
		$result->execute();
		return $result;
	}

	function action_other()
	{	
		$db=Db::getConnection();
		$str="Select *from Catalog where Type=6";
		$result=$db->prepare($str);
		$result->execute();
		return $result;
	}



    /*Функции для многоуровней иерархии */

    /*Кресла*/

    function action_chair_livingroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=1 and Subtype=1";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_chair_bedroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=1 and Subtype=2";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_chair_diningroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=1 and Subtype=3";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_chair_bathroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=1 and Subtype=4";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_chair_street()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=1 and Subtype=5";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_chair_another()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=1 and Subtype=6";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    /*Кровати*/

    function action_beds_livingroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=2 and Subtype=1";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_beds_bedroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=2 and Subtype=2";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_beds_diningroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=2 and Subtype=3";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_beds_bathroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=2 and Subtype=4";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_beds_street()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=2 and Subtype=5";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_beds_another()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=2 and Subtype=6";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    /*Диваны*/

    function action_sofa_livingroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=3 and Subtype=1";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_sofa_bedroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=3 and Subtype=2";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_sofa_diningroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=3 and Subtype=3";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_sofa_bathroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=3 and Subtype=4";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_sofa_street()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=3 and Subtype=5";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_sofa_another()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=3 and Subtype=6";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    /*Столы*/

    function action_table_livingroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=4 and Subtype=1";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_table_bedroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=4 and Subtype=2";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_table_diningroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=4 and Subtype=3";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_table_bathroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=4 and Subtype=4";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_table_street()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=4 and Subtype=5";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_table_another()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=4 and Subtype=6";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    /*Шкафы*/

    function action_closet_livingroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=5 and Subtype=1";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_closet_bedroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=5 and Subtype=2";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_closet_diningroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=5 and Subtype=3";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_closet_bathroom()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=5 and Subtype=4";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_closet_street()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=5 and Subtype=5";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_closet_another()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=5 and Subtype=6";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }


	}




