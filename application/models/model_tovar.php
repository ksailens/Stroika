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

	function action_instruments()
	{	
		$db=Db::getConnection();
		$str="Select *from Catalog where Type=1";
		$result=$db->prepare($str);
		$result->execute();
		return $result;
	}

	function action_buildMat()
	{	
		$db=Db::getConnection();
		$str="Select *from Catalog where Type=2";
		$result=$db->prepare($str);
		$result->execute();
		return $result;	
	}

	function action_decorMat()
	{	
		$db=Db::getConnection();
		$str="Select *from Catalog where Type=3";
		$result=$db->prepare($str);
		$result->execute();
		return $result;
	}

	function action_fasteners()
	{	
		$db=Db::getConnection();
		$str="Select *from Catalog where Type=4";
		$result=$db->prepare($str);
		$result->execute();
		return $result;
	}

	function action_lumber()
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

    /*Инструменты*/

    function action_instruments_brushes()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=1 and Subtype=1";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_instruments_handsaw()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=1 and Subtype=2";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_instruments_drill()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=1 and Subtype=3";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_instruments_shovel()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=1 and Subtype=4";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_instruments_spatula()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=1 and Subtype=5";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

       /*Строительные материалы*/

    function action_buildMat_cement()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=2 and Subtype=1";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_buildMat_sand()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=2 and Subtype=2";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_buildMat_gasConcrete()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=2 and Subtype=3";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_buildMat_insulation()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=2 and Subtype=4";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_buildMat_roof()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=2 and Subtype=5";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

       /*Отделочные материалы*/

    function action_decorMat_glue()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=3 and Subtype=1";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_decorMat_paint()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=3 and Subtype=2";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_decorMat_sealant()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=3 and Subtype=3";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_decorMat_plumbing()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=3 and Subtype=4";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_decorMat_laminate()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=3 and Subtype=5";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

       /*Крепежи*/

    function action_fasteners_screw()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=4 and Subtype=1";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_fasteners_spike()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=4 and Subtype=2";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_fasteners_pin()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=4 and Subtype=3";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_fasteners_nut()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=4 and Subtype=4";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_fasteners_collar()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=4 and Subtype=5";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    /*Пиломатериалы*/

    function action_lumber_plank()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=5 and Subtype=1";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_lumber_dsp()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=5 and Subtype=2";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_lumber_osb()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=5 and Subtype=3";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

    function action_lumber_plywood()
    {
        $db=Db::getConnection();
        $str="Select *from Catalog where Type=5 and Subtype=4";
        $result=$db->prepare($str);
        $result->execute();
        return $result;
    }

   	}




