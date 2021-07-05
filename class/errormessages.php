<?php

class ErrorsMessages{
    
    const ERROR_PRUEBA                          = "1";
    const ERR_SIGNUP_NEWUSER_EMPTY              = "2";
    const ERR_SIGNUP_USERNAME_EXISTS            = "3";
    const ERR_SIGNUP_EMAIL_EXISTS               = "4";
    const ERR_SIGNUP_PHONE_EXISTS               = "5";
    const ERR_SIGNUP_NEWUSER                    = "6";
    const ERR_LOGIN_AUTHENTICATE_EMPTY          = "Llene-esa-mierda-HPTA-no-sea-tan-JULIAN";
    const ERR_LOGIN_AUTHENTICATE_DATA           = "Sapo-Perro-HPTA-Rote-bien-los-datos";
    const ERR_LOGIN_AUTHENTICATE                = "9";
    const ERR_POSTPUBLI_NEWPUBLICATION_EMPTY    = "10";
    

    private $errorsList = [];

    public function __construct(){
        $this->errorsList = [
            ErrorsMessages::ERROR_PRUEBA => 'Prueba',
            ErrorsMessages::ERR_SIGNUP_NEWUSER_EMPTY => 'Los campos se encuentran vacios',
            ErrorsMessages::ERR_SIGNUP_USERNAME_EXISTS => 'El Username ya existe',
            ErrorsMessages::ERR_SIGNUP_EMAIL_EXISTS => 'El Email ya existe',
            ErrorsMessages::ERR_SIGNUP_PHONE_EXISTS => 'El  Phone ya existe',
            ErrorsMessages::ERR_SIGNUP_NEWUSER => 'Ocurrio un error en el sistema Register',
            ErrorsMessages::ERR_LOGIN_AUTHENTICATE_EMPTY => 'Campos Vacios',
            ErrorsMessages::ERR_LOGIN_AUTHENTICATE_DATA => 'Usuario y/o incontraseña correctos',
            ErrorsMessages::ERR_LOGIN_AUTHENTICATE => 'Ocurrio un error en el sistema Login',
            ErrorsMessages::ERR_POSTPUBLI_NEWPUBLICATION_EMPTY => 'pUEDE LlEnAr LoS DaTos HpTa'
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