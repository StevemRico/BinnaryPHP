<?php

class Login extends Controller{

    function __construct(){
        parent::__construct();
        error_log('Binnary/controllers/loginController.php/__construct/ Line 7 -> Inicio del Login');
        $this->view->render('login/index');
    }

}

?>