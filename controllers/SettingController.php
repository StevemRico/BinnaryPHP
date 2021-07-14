<?php

    class Setting extends SessionController{
        
        function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();    
        }

        function render(){
        $this->view->errorMessage='';
        $this->view->render('header/index',[
        'user' => $this->user
        ]);
        $this->view->render('UserSetting/index.php',[]);
        }
    }
?>