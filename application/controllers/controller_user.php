<?php

class Controller_user extends Controller
{

    function action_index($zapros)
    {
        if (isset($_SESSION['Login'])) {
            if ($_SESSION['Login']=="Admin") {
                $this->view->generate('user.php', 'template_view.php',$zapros);
            }
            elseif ($_SESSION['Login']=="Moder") {
                $this->view->generate('user.php', 'template_view.php',$zapros);
            }
            else{
                header("Location: /user/my_buy");
            }
        }

        else{
            header("Location: /avtoriz");
        }

    }




    function action_all($zapros)
    {
        if (isset($_SESSION['Login'])) {
            $this->view->generate('user.php', 'template_view.php',$zapros);
        }
        else{
            header("Location: /avtoriz");
        }

    }



    function action_delete()
    {
        if ($_SESSION['Login']=="Admin") {
            header("Location: /user");
        }
        elseif ($_SESSION['Login']=="Moder") {
            header("Location: /user");
        }
        else{
            header("Location: /avtoriz");
        }

    }


    function action_delete_news()
    {
        if ($_SESSION['Login']=="Admin") {
            header("Location: /user/news");
        }
        elseif ($_SESSION['Login']=="Moder") {
            header("Location: /user/news");
        }
        else{
            header("Location: /avtoriz");
        }

    }



    function action_news($zapros)
    {
        if ($_SESSION['Login']=="Admin") {
            $this->view->generate('Admin_news.php', 'template_view.php',$zapros);
        }
        elseif ($_SESSION['Login']=="Moder") {
            $this->view->generate('Admin_news.php', 'template_view.php',$zapros);
        }
        else{
            header("Location: /avtoriz");
        }
    }

    function action_news_add()
    {
        if ($_SESSION['Login']=="Admin") {
            $this->view->generate('Admin_news_add.php', 'template_view.php');
        }
        elseif ($_SESSION['Login']=="Moder") {
            $this->view->generate('Admin_news_add.php', 'template_view.php');
        }
        else{
            header("Location: /avtoriz");
        }
    }


    function action_New_News_Add()
    {
        if ($_SESSION['Login']=="Admin") {
            header("Location: /user/news");
        }
        elseif ($_SESSION['Login']=="Moder") {
            header("Location: /user/news");
        }
        else{
            header("Location: /avtoriz");
        }
    }



    function action_production($zapros){
        if ($_SESSION['Login']=="Admin") {
            $this->view->generate('Admin_catalog.php', 'template_view.php',$zapros);
        }
        else{
            header("Location: /avtoriz");
        }
    }

    function action_Material_add()
    {
        if ($_SESSION['Login']=="Admin") {
            $this->view->generate('Admin_material_add.php', 'template_view.php');
        }
        else{
            header("Location: /avtoriz");
        }
    }


    function action_New_Material_add()
    {
        if ($_SESSION['Login']=="Admin") {
            header("Location: /user/production");
        }
        else{
            header("Location: /avtoriz");
        }
    }




    function action_delete_material()
    {
        if ($_SESSION['Login']=="Admin") {
            header("Location: /user/production");
        }
        else{
            header("Location: /avtoriz");
        }

    }



    function action_correct_news($zapros)
    {
        if ($_SESSION['Login']=="Admin") {
            $this->view->generate('Admin_news_correct.php', 'template_view.php',$zapros);
        }
        elseif ($_SESSION['Login']=="Moder") {
            $this->view->generate('Admin_news_correct.php', 'template_view.php',$zapros);
        }
        else{
            header("Location: /avtoriz");
        }

    }

    function action_New_News_Update()
    {
        if ($_SESSION['Login']=="Admin") {
            header("Location: /user/news");
        }
        elseif ($_SESSION['Login']=="Moder") {
            header("Location: /user/news");
        }
        else{
            header("Location: /avtoriz");
        }

    }


    function action_correct_materials($zapros)
    {
        if ($_SESSION['Login']=="Admin") {
            $this->view->generate('Admin_material_correct.php', 'template_view.php',$zapros);
        }
        else{
            header("Location: /avtoriz");
        }

    }


    function action_New_Material_Update()
    {
        if ($_SESSION['Login']=="Admin") {
            header("Location: /user/production");
        }
        else{
            header("Location: /avtoriz");
        }

    }


    function action_Delete_Photo1($num){
        if ($_SESSION['Login']=="Admin") {
            header("Location: /user/production");
        }
        else{
            header("Location: /avtoriz");
        }
    }


    function action_Delete_Photo2(){
        if ($_SESSION['Login']=="Admin") {
            header("Location: /user/production");
        }
        else{
            header("Location: /avtoriz");
        }
    }

    function action_Delete_Photo3(){
        if ($_SESSION['Login']=="Admin") {
            header("Location: /user/production");
        }
        else{
            header("Location: /avtoriz");
        }
    }


    function action_test_drive($num)
    {
        if (isset($_SESSION['Login'])) {
            header("Location: /user/my_test");
        }
        else{
            header("Location: /avtoriz");
        }
    }


    function action_my_test($rezult)
    {
        if (isset($_SESSION["Login"])) {
            $this->view->generate('User_test_drive.php', 'template_view.php',$rezult);
        }
        else{
            header("Location: /avtoriz");
        }

    }


    function action_delete_test_drive1()
    {
        if (isset($_SESSION["Login"])) {
            header("Location: /user/my_test");
        }
        else{
            header("Location: /avtoriz");
        }

    }


    function action_buy($num)
    {
        if (isset($_SESSION['Login'])) {
            header("Location: /user/my_buy");
        }
        else{
            header("Location: /avtoriz");
        }
    }


    function action_my_buy($rezult)
    {
        if (isset($_SESSION["Login"])) {
            $this->view->generate('User_buy_material.php', 'template_view.php',$rezult);
        }
        else{
            header("Location: /avtoriz");
        }

    }

    function action_delete_buy1()
    {
        if (isset($_SESSION["Login"])) {
            header("Location: /user/my_buy");
        }
        else{
            header("Location: /avtoriz");
        }

    }

    function action_send_mail()
    {
        if (isset($_SESSION["Login"])) {
            header("Location: /user/my_buy");
        }
        else{
            header("Location: /avtoriz");
        }

    }


    function action_delete_buy2()
    {
        if ($_SESSION["Login"]=="Admin") {
            header("Location: /user/send_buy");
        }
        else{
            header("Location: /avtoriz");
        }

    }



    function action_send_buy($rezult)
    {
        if ($_SESSION["Login"]=="Admin") {
            $this->view->generate('Admin_buy_material.php', 'template_view.php',$rezult);
        }
        else{
            header("Location: /avtoriz");
        }
    }

    function action_yes()
    {
        if ($_SESSION["Login"]=="Admin") {
            header("Location: /user/send_buy");
        }
        else{
            header("Location: /avtoriz");
        }
    }

    function action_noy()
    {
        if ($_SESSION["Login"]=="Admin") {
            header("Location: /user/send_buy");
        }
        else{
            header("Location: /avtoriz");
        }
    }




    function action_send_test($rezult)
    {
        if ($_SESSION["Login"]=="Admin") {
            $this->view->generate('Admin_test_drive.php', 'template_view.php',$rezult);
        }
        else{
            header("Location: /avtoriz");
        }
    }

    function action_yes2()
    {
        if ($_SESSION["Login"]=="Admin") {
            header("Location: /user/send_test");
        }
        else{
            header("Location: /avtoriz");
        }
    }

    function action_noy2()
    {
        if ($_SESSION["Login"]=="Admin") {
            header("Location: /user/send_test");
        }
        else{
            header("Location: /avtoriz");
        }
    }


    function action_delete_test_drive2()
    {
        if (isset($_SESSION["Login"])) {
            header("Location: /user/send_test");
        }
        else{
            header("Location: /avtoriz");
        }

    }
}



