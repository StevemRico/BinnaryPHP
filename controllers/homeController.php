<?php

class Home extends SessionController{
    function __construct(){
        parent::__construct();
    }
    
    function render(){
        $this->view->render('home/index');
    }
}