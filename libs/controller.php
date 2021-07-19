<?php

class Controller{

    function __construct(){
        $this->view = new View();    
    }

    function loadModel($model){
        $url = 'models/' . $model . 'Model.php';

        if(file_exists($url)){
            require_once $url;

            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }

    function existPOST($params){
        foreach($params as $param){
            if(!isset($_POST[$param])){
                error_log('Binnary/libs/controller/existPost/Line 23 -> no existe el parametro' . $param);
                return false;
            }
        }
        return true;
    }

    function existGET($params){
        foreach($params as $param){
            if(!isset($_GET[$param])){
                error_log('Binnary/libs/controller/existGet/Line 33 -> no existe el parametro' . $param);
                return false;
            }
        }
        return true;
    }

    function getGet($name){ return $_GET[$name]; }
    function getPost($name){ return $_POST[$name]; }

    ////////////////////////////////////////////////////////

   // function update($table, $id, $fields){
     //   $data = "[]";
       // $params ="";

    //    foreach($fields as $username || $email || $phone || $password || $description || $gender || $birthday=> $value){
      //      
        //}
    //}

    ////////////////////////////////////////////////////////
    function redirect($url, $mensajes = []){
        $data = [];
        $params = '';
        
        foreach ($mensajes as $key => $value) {
            array_push($data, $key . '=' . $value);
        }
        $params = join('&', $data);
        
        if($params != ''){
            $params = '?' . $params;
        }
        header('location: ' . constant('URL') . $url . $params);
    }

}

?>