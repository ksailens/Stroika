<?php
require_once 'application/config/Db.php';
class model_index extends Model
{

    function action_index()
    {

    }

    function action_rus()
    {
        $_SESSION['lang']="rus";
    }

    function action_english()
    {
        $_SESSION['lang']="eng";
    }


}




