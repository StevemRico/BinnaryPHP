<?php

class Signup extends Controller{

    function __construct(){
        parent::__construct();
        error_log('Binnary/controllers/loginController.php/__construct/ Line 7 -> Inicio del Login');
    }
    
    function render(){
        $this->view->render('signup/index');

    }

}

?>