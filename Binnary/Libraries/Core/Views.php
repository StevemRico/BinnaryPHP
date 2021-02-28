<?php

class Views{
    function getView($Controller,$View,$data=""){
        $Controller = get_class($Controller);
        if($Controller == "Home"){
            $View = 'Views/'.$View."Views.php";
        }else {
            $View = 'Views/'.$Controller."/".$View."Views.php";
        }
        require_once($View);
    }
}


?>