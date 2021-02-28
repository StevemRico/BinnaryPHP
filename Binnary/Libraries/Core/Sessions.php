<?php 

class Session{
    public function __construct(){
        // session_start();
    }

    public function CurrentUser($user){
        $_SESSION['user'] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION['user'];
    }

    public function CloseSession(){
        session_unset();
        session_destroy();
    }
}

?>