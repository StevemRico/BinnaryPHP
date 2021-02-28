<?php

class Mysql extends Conexion{
    private $conexion;
    private $strquery;
    private $arrValues;

    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    }

    public function Post(string $query, array $arrValues){   
        $this->strquery = $query;
        $this->arrValues = $arrValues;
        $Post = $this->conexion->prepare($this->strquery);
        $resPost = $Post->execute($this->arrValues);
        if($resPost){
            $lastPost = $this->conexion->lastInsertId();
        }else{
            $lastPost = 0;
        }
        return $lastPost;
    }

    public function Get(string $query){   
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetchall(PDO::FETCH_ASSOC);
        return $data;
    }

    public function GetUnique(string $query){   
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function Put(string $query){   
        $this->strquery = $query;
        $this->arrValues = $arrValues;
        $Put = $this->conexion->prepare($this->strquery);
        $resPut = $Put->execute($this->arrValues);
        return $resPut;
    }

    public function Delete(string $query){   
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        return $result;
    }
}



?>