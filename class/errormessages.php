<?php

class ErrorsMessages{
    //ERROR|SUCCESS
    //Controller
    //method
    //operation
    
    //const ERROR_ADMIN_NEWCATEGORY_EXISTS = "El nombre de la categoría ya existe, intenta otra";
    const ERROR_PRUEBA        = "1";
    const ERR_SIGNUP_NEWUSER_EMPTY        = "2";
    const ERR_SIGNUP_USERNAME_EXISTS        = "3";
    const ERR_SIGNUP_EMAIL_EXISTS        = "4";
    const ERR_SIGNUP_PHONE_EXISTS        = "5";
    const ERR_SIGNUP_NEWUSER        = "6";


    private $errorsList = [];

    public function __construct(){
        $this->errorsList = [
            ErrorsMessages::ERROR_PRUEBA => 'Prueba',
            ErrorsMessages::ERR_SIGNUP_NEWUSER_EMPTY => 'Los campos se encuentran vacios',
            ErrorsMessages::ERR_SIGNUP_USERNAME_EXISTS => 'El Username ya existe',
            ErrorsMessages::ERR_SIGNUP_EMAIL_EXISTS => 'El Email ya existe',
            ErrorsMessages::ERR_SIGNUP_PHONE_EXISTS => 'El Phone ya existe',
            ErrorsMessages::ERR_SIGNUP_NEWUSER => 'Ocurrio un error en el sistema',
        ];
    }

    function get($hash){
        return $this->errorsList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->errorsList)){
            return true;
        }else{
            return false;
        }
    }
}
?>