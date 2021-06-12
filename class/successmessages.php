<?php

class SuccessMessages{

    const SUCCESS_USER_REGISTER_EXIST = '1';

    private $successList = [];

    public function __construct(){
        $this->successList = [
            SuccessMessages::SUCCESS_USER_REGISTER_EXIST => 'El usuario se registró correctamente'
        ];  
    }

    public function get($hash){
        return $this->successList[$hash];
    }

    public function existsKey($key){
        if(array_key_exists($key, $this->successList)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}

?>