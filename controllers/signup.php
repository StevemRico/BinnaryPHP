<?php

    require_once 'models/usermodel.php';

    class Signup extends SessionController{

        function __construct(){
            parent::__construct();
        }

        function render(){
            $this->view->render('login/signup', []);
        }
 
        function newUser(){
            if($this->existPOST(['username', 'password'])){
                $username = $this->getPost('username');
                $password = $this->getPost('password');
                $email = $this->getPost('email');
                $phone_number = $this->getPost('phone_number');

                $user = new UserModel();
                $user->setUsername($username);
                $user->setPassword($password);
                $user->setEmail($email);
                $user->setPhoneNumber($phone_number);
                $user->setRole('user');


                if($username == '' || empty($username) || $password == '' || empty($password)){
                    $this->redirect('signup', ['error' => ErrorMessages::ERR_SIGNUP_NEWUSER_EMPTY]);
                }else if($user->existsU($username)){
                    $this->redirect('signup', ['error' => ErrorMessages::ERR_SIGNUP_EXIST]);
                }else if($user->existsE($email)){
                    $this->redirect('signup', ['error' => ErrorMessages::ERR_SIGNUP_EMAIL_EXIST]);
                }else if($user->existsPhoneNumber($phone_number)){
                    $this->redirect('signup', ['error' => ErrorMessages::ERR_SIGNUP_PHONENUMBER_EXIST]);
                }else if($user->save()){
                    $this->redirect('', ['success' => SuccessMessages::SUCCESS_USER_SIGNUP_NEWUSER]);
                }else{
                    $this->redirect('signup', ['error' => ErrorMessages::ERR_SIGNUP_NEWUSER_EMPTY]);
                }

            }else{
                $this->redirect('signup', ['error' => ErrorMessages::ERR_SIGNUP_NEWUSER]);
            }
        }

    }

?>