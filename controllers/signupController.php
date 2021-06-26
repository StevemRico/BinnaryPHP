
<?php

require_once 'models/UserModel.php';

class Signup extends SessionController{

    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->errorMessage = '';
        $this->view->render('signup/index');
    }

    function newUser(){
        error_log("SISAS ES ACA PERRO");
        if($this->existPOST(['username', 'password', 'phone', 'email'])){
            
            $username = $this->getPost('username');
            $password = $this->getPost('password');
            $email = $this->getPost('email');
            $phone = $this->getPost('phone');
            
            //validate data
            
            $user = new UserModel();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPhone($phone);
            $user->setPassword($password);
            $user->setRole("user");
            
            if($username == '' || empty($username) || $password == '' || empty($password) || $email == '' || empty($email) || $phone == '' || empty($phone)){
                $this->redirect('signup', ['error' => ErrorsMessages::ERR_SIGNUP_NEWUSER_EMPTY]);
            }else if($user->existsUsername($username)){
                $this->redirect('signup', ['error' => ErrorsMessages::ERR_SIGNUP_USERNAME_EXISTS]);
            }else if($user->existsEmail($email)){
                $this->redirect('signup', ['error' => ErrorsMessages::ERR_SIGNUP_EMAIL_EXISTS]);
            }else if($user->existsPhone($phone)){
                $this->redirect('signup', ['error' => ErrorsMessages::ERR_SIGNUP_PHONE_EXISTS]);
            }else if($user->save()){
                $this->redirect('', ['success' => SuccessMessages::SUCCESS_SIGNUP_NEWUSER]);
            }else{
                $this->redirect('signup', ['error' => ErrorsMessages::ERR_SIGNUP_NEWUSER]);
            }
        }else{
            $this->redirect('signup', ['error' => ErrorsMessages::ERR_SIGNUP_USERNAME_EXISTS]);
        }
    }
}

?>