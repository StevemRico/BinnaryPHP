<?php

class SuccessMessages{

    const SUCCESS_PRUEBA        = "1";
    const SUCCESS_SIGNUP_NEWUSER        = "2";


    private $successList = [];

    public function __construct(){
        $this->successList = [
            SuccessMessages::SUCCESS_PRUEBA => 'Success Prueba',
            SuccessMessages::SUCCESS_SIGNUP_NEWUSER => 'Usuario Registrado Corecctamente',
        ];
    }

    function get($hash){
        return $this->successList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->successList)){
            return true;
        }else{
            return false;
        }
    }
}
?>