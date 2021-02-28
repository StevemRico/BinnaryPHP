<?php

    $ControllerFile = "Controllers/".$Controller."Controller.php";
    if (file_exists($ControllerFile)) {
        require_once($ControllerFile);
        $Controller = new $Controller();

        if(method_exists($Controller, $Method)){
            $Controller->{$Method}($Params);
        }else{
            require_once("Controllers/ErrorController.php");
        }

    }else{
        require_once("Controllers/ErrorController.php");
    }

?>