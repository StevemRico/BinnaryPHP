<?php

class ErrorMessages{

    // ERR_CONTROLLER_METHOD_ACTION

    const ERR_USER_REGISTER_EXIST = '1';

    private $errorList = [];

    public function __construct(){
        $this->errorList = [
            ErrorMessages::ERR_USER_REGISTER_EXIST => 'El usuario que quiere registrar ya existe PERRA'
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