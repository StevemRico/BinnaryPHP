<?php
    // Errores en logs
    error_reporting(E_ALL); 
    ini_set('ignore_repeated_errors', TRUE );
    ini_set('display_errors', FALSE);
    ini_set('log-errors', TRUE);
    ini_set("error_log", "./php-error.log");
    error_log("Inicio de la webaplication");

    //Require_Once
    require_once 'libs/database.php';
    require_once 'libs/controller.php';
    require_once 'libs/model.php';
    require_once 'libs/view.php';
    require_once 'class/sessionController.php';
    require_once 'libs/app.php';
    require_once 'class/errormessages.php';
    require_once 'class/successmessages.php';

    require_once 'config/config.php';
    


    $app = new App();


?>