<?php

class ErrorsMessages{
    //ERROR|SUCCESS
    //Controller
    //method
    //operation
    
    //const ERROR_ADMIN_NEWCATEGORY_EXISTS = "El nombre de la categoría ya existe, intenta otra";
    const ERROR_PRUEBA        = "1";


    private $errorsList = [];

    public function __construct(){
        $this->errorsList = [
            ErrorsMessages::ERROR_PRUEBA => 'Usuario y contraseña son incorrectos',
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