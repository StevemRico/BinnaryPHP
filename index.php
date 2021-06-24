<?php

error_reporting(E_ALL); // Error/Exception engine, always use E_ALL
ini_set('ignore_repeated_errors', TRUE); // always use TRUE
ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment
ini_set('log_errors', TRUE); // Error/Exception file logging engine.
ini_set("error_log", "php-error.log");

//Carpeta/Archivo/Metodo/Condicional/Linea de codigo -> Comentario

error_log( "binnary/index.php/Line 9 -> Inicio de aplicacion web" );

echo '<link href="./public/css/bootstrap.min.css" rel="stylesheet" type="text/css">';
echo '<link href="./public/css/global.css" rel="stylesheet" type="text/css">';

require_once 'libs/database.php';
require_once 'class/errorMessages.php';
require_once 'class/successMessages.php';
require_once 'libs/controller.php';
require_once 'libs/model.php';
require_once 'libs/view.php';
require_once 'class/sessionController.php';
require_once 'libs/app.php';

require_once 'config/config.php';

include_once 'models/usermodel.php';



$app = new App();

?>