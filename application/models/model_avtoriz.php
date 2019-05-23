<?php
require_once 'application/config/Db.php';
class model_avtoriz extends Model
{

	function action_index()
	{	

	}

	function action_logout(){
        $db=Db::getConnection();
        $str1="DELETE FROM `Basket` WHERE id_order='".$_SESSION['codeUserName']."'";
        $db->query($str1);
        unset($_SESSION['Login']);
        unset($_SESSION['Pass']);
        unset($_SESSION['Email']);
        unset($_SESSION['Tel']);
        unset($_SESSION['LoginSystem']);
        unset($_SESSION['userId']);
        unset($_SESSION['codeUserName']);



	}


	function action_logined()
	{	
		$a1=$_POST['log_avtoriz'];
		$a2=$_POST['pas_avtoriz'];

		$db=Db::getConnection();
		$str="Select *from Login where Names='".$a1."' and Pass='".$a2."'";
		$result=$db->prepare($str);
		$result->execute();
		$res=$result->fetch(PDO::FETCH_BOTH);

		if (!empty($res)) {		//Если ответ положительный...то такой логин с таким паролем существует
			$_SESSION['Login']=$res['Names'];
			$_SESSION['Pass']=$res['Pass'];
			$_SESSION['Email']=$res['Emails'];
			$_SESSION['Tel']=$res['Tels'];
            $_SESSION['LoginSystem']='system_auto';
            $_SESSION['userId']=$res['id'];
            $_SESSION['codeUserName']=base64_encode($res['Names']);
		}
		else {
            $_SESSION['LoginSystem']='system_error';
        }

	}


	}




