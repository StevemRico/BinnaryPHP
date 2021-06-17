<?php

class ErrorMessages{

    const ERR_SIGNUP_EXIST = '1';
    const ERR_SIGNUP_EMAIL_EXIST = '2';
    const ERR_SIGNUP_PHONENUMBER_EXIST = '3';
    const ERR_SIGNUP_NEWUSER_EMPTY = '4';
    const ERR_SIGNUP_NEWUSER = '5';

    const ERR_LOGIN_AUTHENTICATE_EMPTY = '6';
    const ERR_LOGIN_AUTHENTICATE_DATA = '7';
    const ERR_LOGIN_AUTHENTICATE = '8';

    private $errorList = [];

    public function __construct(){
        $this->errorList = [
            ErrorMessages::ERR_SIGNUP_EXIST => 'El usuario que quiere registrar ya existe PERRA',
            ErrorMessages::ERR_SIGNUP_EMAIL_EXIST => 'El correo se encuentra en uso',
            ErrorMessages::ERR_SIGNUP_PHONENUMBER_EXIST => 'El numero ya se encuentra en uso',
            ErrorMessages::ERR_SIGNUP_NEWUSER_EMPTY => 'El fomulario no se encentra diligenciado correctamente',
            ErrorMessages::ERR_SIGNUP_NEWUSER => 'Ocurrio un error al intentar procesar la solicitud',

            ErrorMessages::ERR_LOGIN_AUTHENTICATE_EMPTY => 'Rellene los hptas datos',
            ErrorMessages::ERR_LOGIN_AUTHENTICATE_DATA => 'Usuario o contraseña son incorrectos',
            ErrorMessages::ERR_LOGIN_AUTHENTICATE => 'Ocurrio un error al procesar la solicitud, intenta de nuevo',
        ];
    }

    public function get($hash){
        return $this->errorList[$hash];
    }

    public function existsKey($key){
        if(array_key_exists($key, $this->errorList)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}

?>