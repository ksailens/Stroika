<?php
require_once 'application/config/Db.php';
class model_registration extends Model
{

    function action_index()
    {

    }

    function action_register()
    {
        $a1=$_POST['log_reg'];
        $a2=$_POST['pas_reg'];
        $a3=$_POST['em_reg'];
        $a4=$_POST['tel_reg'];

        $db=Db::getConnection();
        $str="Select *from Login where Names='".$a1."'";
        $result=$db->prepare($str);
        $result->execute();
        $res=$result->fetch(PDO::FETCH_BOTH);

        if (!empty($res)) {		//Если ответ положительный...то такая учётная запись уже есть

        }
        else{	//В регистрации нас интересует вариант с созданием новой учётной записи
            $_SESSION['Login']=$a1;
            $_SESSION['Pass']=$a2;
            $_SESSION['Email']=$a3;
            $_SESSION['Tel']=$a4;

            $str="INSERT INTO `Login`(`Names`, `Pass`, `Emails`, `Tels`) VALUES ('".$a1."','".$a2."','".$a3."','".$a4."')";
            $result=$db->query($str);
        }

    }


}




