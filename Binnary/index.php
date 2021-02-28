<link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php

    require_once("Config/Config.php");
    require_once("Helpers/Helpers.php");
    require_once("Libraries/Core/Sessions.php");

    $url = !empty($_GET['url']) ? $_GET['url'] : 'Home/Home';
    $arrUrl = explode("/",$url);
    $Controller = $arrUrl[0];
    $Method = $arrUrl[0];
    $Params = "";

    if(!empty($arrUrl[1])){
        if($arrUrl[1] != ""){
            $Method = $arrUrl[1];
        }
    }

    if(!empty($arrUrl[2])){
        if($arrUrl[2] != ""){
            for ($i=2; $i < count($arrUrl); $i++) { 
                $Params .= $arrUrl[$i].',';
            }
            $Params = trim($Params,',');
        }
    }

    require_once("Components/Header.php");
    require_once("Libraries/Core/Autoload.php");
    require_once("Libraries/Core/Load.php");

?>