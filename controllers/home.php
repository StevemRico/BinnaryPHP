<?php


    class Home extends SessionController{

        function __construct(){
            parent::__construct();
            error_log("HomeController");
        }

        function render(){
            error_log("HomeController->Init View HomeController");
            $this->view->render('home/index');
        }
 
        

    }

?>