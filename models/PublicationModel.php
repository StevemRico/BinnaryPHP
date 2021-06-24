<?php

class PublicationModel extends Model implements IModel{

    private $id_publication,$description,$file,$id_user,$username;

    
    public function __construct(){
        parent::__construct();
    }
    
    public function saveImg(){
        
    }
    
    public function save(){
        try{
            $query = $this->prepare('INSERT INTO publication () VALUES()');
            $query->execute([
                '$description'  => $this->description, 
                'file'          => $this->file,
                'id_user'       => $this->id_user
            ]);
            return true;
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }
    public function getAll(){
        $items = [];
        try{
            $query = $this->query('SELECT * FROM publications INNER JOIN users on publications.id_user = users.id_user');
            
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new PublicationModel();
                $item->from($p);
                array_push($items, $item);
            }
            error_log("GetAllPublication");
            return $items;
        }catch(PDOException $e){
            error_log($e);
        }
    }

    public function get($id_publication){
        try{
            $query = $this->prepare('SELECT * FROM publications WHERE id_publication = :id');
            $query->execute([ 'id' => $id_publication]);
            $publication = $query->fetch(PDO::FETCH_ASSOC);
            $this->from($publication);
            
            return $this;
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }

    public function delete($id_publication){
        try{
            $query = $this->prepare('DELETE FROM publications WHERE id_publication = :id');
            $query->execute([ 'id' => $id_publication]);
            return true;
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }

    public function update(){
        try{
            $query = $this->prepare('UPDATE publications SET description = :description WHERE id_publication = :id');
            $query->execute([
                'id'        => $this->id_publication,
                'description' => $this->description
                ]);
            return true;
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }

    public function from($array){
        $this->id_publication = $array['id_publication'];
        $this->description = $array['description'];
        $this->file = $array['file'];
        $this->id_user = $array['id_user'];
        $this->username = $array['username'];
    }

    public function setId($id_publication){         $this->id_publication = $id_publication; }
    public function setDescription($description){   $this->description = $description; }
    public function setFile($file){                 $this->file = $file; }
    public function setUserId($id_user){            $this->id_user = $id_user; }
    
    public function getId(){                return $this->id_publication; }
    public function getDescription(){       return $this->description; }
    public function getFile(){              return $this->file; }
    public function getUserId(){            return $this->id_user; }
    public function getUsernameP(){         return $this->username; }
}

?>