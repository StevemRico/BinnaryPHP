
<?php

class Login extends SessionController{

    function __construct(){
        parent::__construct();
    }

    function render(){
        $actual_link = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/', $actual_link);
        $this->view->errorMessage = '';
        $this->view->render('login/index');
    }

    function authenticate(){
        if( $this->existPOST(['username', 'password']) ){
            $username = $this->getPost('username');
            $password = $this->getPost('password');

            if($username == '' || empty($username) || $password == '' || empty($password)){
                error_log('Login::authenticate() empty');
                $this->redirect('', ['error' => ErrorsMessages::ERR_LOGIN_AUTHENTICATE_EMPTY]);
                return;
            }
            
            $user = $this->model->login($username, $password);

            if($user != NULL){
                error_log('Login::authenticate() passed');
                $this->initialize($user);
            }else{
                error_log('Login::authenticate() username and/or password wrong');
                $this->redirect('', ['error' => ErrorsMessages::ERR_LOGIN_AUTHENTICATE_DATA]);
                return;
            }
        }else{
            error_log('Login::authenticate() error with params');
            $this->redirect('', ['error' => ErrorsMessages::ERR_LOGIN_AUTHENTICATE]);
        }
    }
}

?>