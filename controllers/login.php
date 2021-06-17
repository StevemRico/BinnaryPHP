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

    function authenticate(){
        if($this->existPOST(['username', 'password'])){
            $username = $this->getPost('username');
            $password = $this->getPost('password');

            $user = $this->model->login($username, $password);

            if($username == '' || empty($username) || $password == '' || empty($password)){
                $this->redirect('', ['error' => ErrorMessages::ERR_LOGIN_AUTHENTICATE_EMPTY]);
            }else if($user != NULL){
                $this->initialize($user);
            }else{
                $this->redirect('', ['error' => ErrorMessages::ERR_LOGIN_AUTHENTICATE_DATA]); 
            }

        }else{
            $this->redirect('', ['error' => ErrorMessages::ERR_LOGIN_AUTHENTICATE]); 
        }
    }

}

?>