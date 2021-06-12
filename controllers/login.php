<?php

class Login extends SessionController{

    function __construct(){
        parent::__construct();
        error_log('Login::construct -> inicio de login');
    }

    function render(){
        error_log('Login::render -> inicio de login');
        $this->view->render('login/index');
    }

}

?>