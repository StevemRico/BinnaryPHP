<?php

    require_once 'models/UserModel.php';
    class Setting extends SessionController{
        
        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData();    
        }
        
        function render(){
            $this->view->render('header/index',[

                'user' => $this->user
            ]);
            $this->view->render('UserSettings/index',[]);
        }
        
        function updateData(){
            error_log("");
            if($this->existPOST(['username','email','phone','password','description','gender','birthday'])){

                
                $id = $this->getPost('id');
                $username = $this->getPost('username');
                $email = $this->getPost('email');
                $phone = $this->getPost('phone');
                $password = $this->getPost('password');
                $description=$this->getPost('description');
                $gender=$this->getPost('genero');
                $birthday=$this->getPost('birthday');

                $user=new UserModel();
                $user->setUsername($username);
                $user->setEmail($email);
                $user->setPhone($phone);
                $user->setPassword($password);
                $user->setDescription($description);
                $user->setGender($gender);
                $user->setBirthday($birthday);


                if($username == '' || empty($username) || $password == '' || empty($password) || $email == '' || empty($email) || $phone == '' || empty($phone)){
                    // Enviaria error de que no existe dato alguno, para que llene ese mierda de formulario
                }else if($username && $email && $phone && $password){
                    $user->update();
                    // Seria el Update cuando se quiere hacer el cambio de la data por completo
                    // Enviaria el Success o lo redireccionaria a la pagina de settings o home si se quiere
                }

                if($email){
                    if($user->existsEmail($email)){
                        //Enviaria el error
                    }else if($user->updateEmail()){
                        // Enviaria el Success o lo redireccionaria a la pagina de settings o home si se quiere
                    }
                }else{
                    // Enviaria error
                }
                

            }
        }



    }
?>