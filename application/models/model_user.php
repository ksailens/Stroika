<?php
require_once 'application/config/Db.php';
class model_user extends Model
{

	function action_index()											
	{	
			if ($_SESSION["Login"]=="Admin") {
			$db=Db::getConnection();
			$str="Select *from Login";
			$result=$db->prepare($str);
			$result->execute();
			return $result;
			}
        elseif ($_SESSION["Login"]=="Moder") {
            $db=Db::getConnection();
            $str="Select *from Login";
            $result=$db->prepare($str);
            $result->execute();
            return $result;
        }

	}


		function action_all()											
	{	
		if ($_SESSION["Login"]=="Admin") {
			$db=Db::getConnection();
			$str="Select *from Login";
			$result=$db->prepare($str);
			$result->execute();
			return $result;
		}
        elseif ($_SESSION["Login"]=="Moder") {
            $db=Db::getConnection();
            $str="Select *from Login";
            $result=$db->prepare($str);
            $result->execute();
            return $result;
        }


	}



	function action_delete($num)											
	{	
		if ($_SESSION["Login"]=="Admin") {
			$db=Db::getConnection();
			$str="DELETE FROM `Login` WHERE id='".$num."'";
			$result=$db->query($str);
		}

	}

	function action_delete_news($num)											
	{	
		if ($_SESSION["Login"]=="Admin") {
			$db=Db::getConnection();
			$str="DELETE FROM `News` WHERE id='".$num."'";
			$result=$db->query($str);
		}
        elseif ($_SESSION["Login"]=="Moder") {
            $db=Db::getConnection();
            $str="DELETE FROM `News` WHERE id='".$num."'";
            $result=$db->query($str);
        }

	}




		function action_news()
	{	
		if ($_SESSION["Login"]=="Admin") {
			$db=Db::getConnection();
			$str="Select *from News ORDER BY Datas DESC";
			$result=$db->prepare($str);
			$result->execute();
			return $result;
		}
        elseif ($_SESSION["Login"]=="Moder") {
            $db=Db::getConnection();
            $str="Select *from News ORDER BY Datas DESC";
            $result=$db->prepare($str);
            $result->execute();
            return $result;
        }
	}



		function action_news_add()
	{	

	}

		function action_New_News_Add()
	{	
		if ($_SESSION["Login"]=="Admin") {
		$db=Db::getConnection();	
		$a1=$_POST['News_zagol'];
		$a2=$_POST['News_Text'];
		$a3=$_SESSION['Login'];

	$uploaddir = './photo/news/';
	$uploaddir2 = '/photo/news/';
	$uploadfile = $uploaddir . basename($_FILES['filename']['name']);
	$uploadfile2 = $uploaddir2 . basename($_FILES['filename']['name']);
		
		if (!empty($_FILES['filename']['name'])) {
		copy($_FILES['filename']['tmp_name'], $uploadfile);
		}
		$str1="INSERT INTO `News`(`Nazv`, `Texts`, `Users`, `Photos`)
		VALUES (";
		$str2="'".$a1."','".$a2."','".$a3."','".$uploadfile2."')";
		$str3=$str1.$str2;
		$result=$db->query($str3);
	}
        elseif ($_SESSION["Login"]=="Moder") {
            $db=Db::getConnection();
            $a1=$_POST['News_zagol'];
            $a2=$_POST['News_Text'];
            $a3=$_SESSION['Login'];

            $uploaddir = './photo/news/';
            $uploaddir2 = '/photo/news/';
            $uploadfile = $uploaddir . basename($_FILES['filename']['name']);
            $uploadfile2 = $uploaddir2 . basename($_FILES['filename']['name']);

            if (!empty($_FILES['filename']['name'])) {
                copy($_FILES['filename']['tmp_name'], $uploadfile);
            }
            $str1="INSERT INTO `News`(`Nazv`, `Texts`, `Users`, `Photos`)
		VALUES (";
            $str2="'".$a1."','".$a2."','".$a3."','".$uploadfile2."')";
            $str3=$str1.$str2;
            $result=$db->query($str3);
        }
	}

	function action_production(){
		if ($_SESSION["Login"]=="Admin") {
			$db=Db::getConnection();
			$str="Select *from Catalog ORDER BY Datas DESC";
			$result=$db->prepare($str);
			$result->execute();
			return $result;
		}
	}

	function action_material_add(){

	}


	function action_New_Material_Add()
	{	
		if ($_SESSION["Login"]=="Admin") {
		$db=Db::getConnection();	
		$a1=$_POST['Material_nazv'];
		$a2=$_POST['Material_nalich'];
		$a3=$_POST['Material_country'];
		$a4=$_POST['Material_colour'];
		$a5=$_POST['Material_material'];
		$a6=$_POST['Material_opis'];
		$a7=$_SESSION['Login'];
		$a8=$_POST['Material_korpus'];
		$a9=$_POST['Material_coin'];
		$a10=$_POST['Material_Subtype'];

	$uploaddir = './photo/Material/';
	$uploaddir2 = '/photo/Material/';
	$uploadfile = $uploaddir . basename($_FILES['filename']['name']);
	$uploadfile2 = $uploaddir2 . basename($_FILES['filename']['name']);
		
		if (!empty($_FILES['filename']['name'])) {
			copy($_FILES['filename']['tmp_name'], $uploadfile);
		}
		
		$str1="INSERT INTO `Catalog`(`Nazv`, `Nalich`, `Country`, `Colour`, `Material`, `Texts`,`Type`, `Coin`,`Subtype`, `Users`, `Photo1`)
		VALUES (";
		$str2="'".$a1."','".$a2."','".$a3."','".$a4."','".$a5."','".$a6."','".$a8."','".$a9."','".$a10."','".$a7."','".$uploadfile2."')";
		$str3=$str1.$str2;
		$result=$db->query($str3);
	}
	}


	function action_delete_material($num)
	{	
		if ($_SESSION["Login"]=="Admin") {
			$db=Db::getConnection();
			$str="DELETE FROM `Catalog` WHERE id='".$num."'";
			$result=$db->query($str);
		}
	}


	function action_correct_news($num)
	{
		if ($_SESSION["Login"]=="Admin") {
			$db=Db::getConnection();
			$str="Select *from News where id='".$num."'";
			$result=$db->prepare($str);
			$result->execute();
			return $result;
		}
        elseif ($_SESSION["Login"]=="Moder") {
            $db=Db::getConnection();
            $str="Select *from News where id='".$num."'";
            $result=$db->prepare($str);
            $result->execute();
            return $result;
        }
	}


	function action_New_News_Update($num)
{	
		if ($_SESSION["Login"]=="Admin") {
		$db=Db::getConnection();	
		$a1=$_POST['News_zagol1'];
		$a2=$_POST['News_Text1'];
		$a3=$_SESSION['Login'];



	$uploaddir = './photo/news/';
	$uploaddir2 = '/photo/news/';
	$uploadfile = $uploaddir . basename($_FILES['filename_update1']['name']);
	$uploadfile2 = $uploaddir2 . basename($_FILES['filename_update1']['name']);
		
		if (!empty($_FILES['filename_update1']['name'])) {
			copy($_FILES['filename_update1']['tmp_name'], $uploadfile);
			$str='UPDATE `News` SET `Nazv`="'.$a1.'",`Texts`="'.$a2.'",`Photos`="'.$uploadfile2.'" WHERE id='.$num;
		}
		else{
			$str='UPDATE `News` SET `Nazv`="'.$a1.'",`Texts`="'.$a2.'" WHERE id='.$num;
		}	
		$result=$db->query($str);
		}

    elseif ($_SESSION["Login"]=="Moder") {
        $db=Db::getConnection();
        $a1=$_POST['News_zagol1'];
        $a2=$_POST['News_Text1'];
        $a3=$_SESSION['Login'];



        $uploaddir = './photo/news/';
        $uploaddir2 = '/photo/news/';
        $uploadfile = $uploaddir . basename($_FILES['filename_update1']['name']);
        $uploadfile2 = $uploaddir2 . basename($_FILES['filename_update1']['name']);

        if (!empty($_FILES['filename_update1']['name'])) {
            copy($_FILES['filename_update1']['tmp_name'], $uploadfile);
            $str='UPDATE `News` SET `Nazv`="'.$a1.'",`Texts`="'.$a2.'",`Photos`="'.$uploadfile2.'" WHERE id='.$num;
        }
        else{
            $str='UPDATE `News` SET `Nazv`="'.$a1.'",`Texts`="'.$a2.'" WHERE id='.$num;
        }
        $result=$db->query($str);
    }

	}



	function action_correct_materials($num)
	{
		if ($_SESSION["Login"]=="Admin") {
			$db=Db::getConnection();
			$str="Select *from Catalog where id='".$num."'";
			$result=$db->prepare($str);
			$result->execute();
			return $result;
		}
	}


	function action_New_material_Update($num)
	{	
		if ($_SESSION["Login"]=="Admin") {
		$db=Db::getConnection();	
		$a1=$_POST['Material_nazv'];
		$a2=$_POST['Material_nalich'];
		$a3=$_POST['Material_country'];
		$a4=$_POST['Material_colour'];
		$a5=$_POST['Material_material'];
		$a6=$_POST['Material_opis'];
		$a7=$_SESSION['Login'];
		$a8=$_POST['Material_korpus'];
		$a9=$_POST['Material_coin'];
		$a10=$_POST['Material_Subtype'];

        $uploaddir = './photo/Material/';
        $uploaddir2 = '/photo/Material/';

        $uploadfile = $uploaddir . basename($_FILES['filename_photo1']['name']);
        $uploadfile2 = $uploaddir2 . basename($_FILES['filename_photo1']['name']);

        $uploadfile3 = $uploaddir . basename($_FILES['filename_photo2']['name']);
        $uploadfile4 = $uploaddir2 . basename($_FILES['filename_photo2']['name']);

        $uploadfile5 = $uploaddir . basename($_FILES['filename_photo3']['name']);
        $uploadfile6 = $uploaddir2 . basename($_FILES['filename_photo3']['name']);
		
		if (!empty($_FILES['filename_photo1']['name'])) {
			copy($_FILES['filename_photo1']['tmp_name'], $uploadfile);
			$str='UPDATE `Catalog` SET `Photo1`="'.$uploadfile2.'" WHERE id='.$num;
			$result=$db->query($str);
		}
		if (!empty($_FILES['filename_photo2']['name'])) {
			copy($_FILES['filename_photo2']['tmp_name'], $uploadfile3);
			$str='UPDATE `Catalog` SET `Photo2`="'.$uploadfile4.'" WHERE id='.$num;
			$result=$db->query($str);
		}
		if (!empty($_FILES['filename_photo3']['name'])) {
			copy($_FILES['filename_photo3']['tmp_name'], $uploadfile5);
			$str='UPDATE `Catalog` SET `Photo3`="'.$uploadfile6.'" WHERE id='.$num;
			$result=$db->query($str);
		}

		$str='UPDATE `Catalog` SET `Nazv`="'.$a1.'",`Nalich`="'.$a2.'" ,`Country`="'.$a3.'" ,`Colour`="'.$a4.'" ,`Material`="'.$a5.'" ,`Texts`="'.$a6.'" ,`Users`="'.$a7.'" ,`Type`="'.$a8.'" ,`Coin`="'.$a9.'",`Subtype`="'.$a10.'" WHERE id='.$num;
		$result=$db->query($str);
		}

	}

	function action_Delete_Photo1($num)
	{	
		if ($_SESSION["Login"]=="Admin") {
		$db=Db::getConnection();	
		$str='UPDATE `Catalog` SET `Photo1`="" WHERE id='.$num;
		$result=$db->query($str);
		return $num;
		}
	}

	function action_Delete_Photo2($num)
	{	
		if ($_SESSION["Login"]=="Admin") {
		$db=Db::getConnection();	
		$str='UPDATE `Catalog` SET `Photo2`="" WHERE id='.$num;
		$result=$db->query($str);
		return $num;
		}
	}

		function action_Delete_Photo3($num)
	{	
		if ($_SESSION["Login"]=="Admin") {
		$db=Db::getConnection();	
		$str='UPDATE `Catalog` SET `Photo3`="" WHERE id='.$num;
		$result=$db->query($str);
		return $num;
		}
	}

		function action_test_drive($num)
	{	
		if (isset($_SESSION["Login"])) {
		$db=Db::getConnection();	
		$str1="INSERT INTO `Test_Drive`(`Avto`, `Login`,`Sost`,`Tel`) 
		VALUES (";
		$str2="'".$num."','".$_SESSION['Login']."',0,'".$_SESSION['Tel']."')";
		$str3=$str1.$str2;
		$result=$db->query($str3);
		}
	}


		function action_my_test()
	{	
		if (isset($_SESSION["Login"])) {
			$db=Db::getConnection();
			$str="Select *from Test_Drive where Login='".$_SESSION['Login']."'";
			$result=$db->prepare($str);
			$result->execute();
			return $result;
		}
	}


	function action_delete_test_drive1($num)
	{	
		if (isset($_SESSION["Login"])) {
			$db=Db::getConnection();
			$str="DELETE FROM `Test_Drive` WHERE id='".$num."'";
			$result=$db->query($str);
		}

	}


		function action_buy($num)
	{	
		if (isset($_SESSION["Login"])) {
		$db=Db::getConnection();	
		$str1="INSERT INTO `Buy`(`Auto`, `Login`,`Sost`,`Tel`) 
		VALUES (";
		$str2="'".$num."','".$_SESSION['Login']."',0,'".$_SESSION['Tel']."')";
		$str3=$str1.$str2;
		$result=$db->query($str3);
		}
	}

		function action_my_buy()
	{	
		if (isset($_SESSION["Login"])) {
			$db=Db::getConnection();
			$str="Select *from Buy where Login='".$_SESSION['Login']."'";
			$result=$db->prepare($str);
			$result->execute();
			return $result;
		}
	}

	function action_delete_buy1($num)									
	{	
		if (isset($_SESSION["Login"])) {
			$db=Db::getConnection();
			$str="DELETE FROM `Buy` WHERE id='".$num."'";
			$result=$db->query($str);
		}

	}

		function action_delete_buy2($num)									
	{	
		if ($_SESSION["Login"]=="Admin") {
			$db=Db::getConnection();
			$str="DELETE FROM `Buy` WHERE id='".$num."'";
			$result=$db->query($str);
		}

	}


		function action_send_buy()
	{	
		if ($_SESSION["Login"]=="Admin") {
			$db=Db::getConnection();
			$str="Select *from Buy";
			$result=$db->prepare($str);
			$result->execute();
			return $result;
		}
	}


		function action_yes($num)
	{	
		if ($_SESSION["Login"]=="Admin") {
		$db=Db::getConnection();	
		$str='UPDATE `Buy` SET `Sost`="1" WHERE id='.$num;
		$result=$db->query($str);
		return $num;
		}
	}

		function action_noy($num)
	{	
		if ($_SESSION["Login"]=="Admin") {
		$db=Db::getConnection();	
		$str='UPDATE `Buy` SET `Sost`="2" WHERE id='.$num;
		$result=$db->query($str);
		return $num;
		}
	}


	function action_send_test()
	{	
		if ($_SESSION["Login"]=="Admin") {
			$db=Db::getConnection();
			$str="Select *from Test_Drive";
			$result=$db->prepare($str);
			$result->execute();
			return $result;
		}
	}


		function action_yes2($num)
	{	
		if ($_SESSION["Login"]=="Admin") {
		$db=Db::getConnection();	
		$str='UPDATE `Test_Drive` SET `Sost`="1" WHERE id='.$num;
		$result=$db->query($str);
		return $num;
		}
	}

		function action_noy2($num)
	{	
		if ($_SESSION["Login"]=="Admin") {
		$db=Db::getConnection();	
		$str='UPDATE `Test_Drive` SET `Sost`="2" WHERE id='.$num;
		$result=$db->query($str);
		return $num;
		}
	}


	function action_delete_test_drive2($num)
	{	
		if ($_SESSION["Login"]=="Admin") {
			$db=Db::getConnection();
			$str="DELETE FROM `Test_Drive` WHERE id='".$num."'";
			$result=$db->query($str);
		}

	}

	}



