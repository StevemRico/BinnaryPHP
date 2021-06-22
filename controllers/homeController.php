<?php

class Home extends SessionController{
    function __construct(){
        parent::__construct();
        $this->view->render('home/index');
    }
}