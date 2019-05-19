<?php

class Controller_registration extends Controller
{

    function action_index()
    {
        $this->view->generate('registration.php', 'template_view.php');
    }


    function action_register()
    {
        if (isset($_SESSION['Login'])) {
            header("Location: /user");
        }
        else{
            header("Location: /index");
        }
    }

}