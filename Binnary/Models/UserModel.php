<?php

class UserModel extends Mysql{
    private $name;
    private $username;
    public function __construct(){
        parent::__construct();
    }
    public function RegisterUser(string $Username, string $Email, string $Pass, string $Phone_Number){
        $sql = "INSERT INTO users (Username,Email,Password,Phone_number,role,user_status) VALUES (?, ?, ?, ?, ?, ?)";
        $arrData = array($Username,$Email,$Pass,$Phone_Number,1,1);
        $query_result = $this->Post($sql,$arrData);
        return $query_result;
    }
    public function LoginUser(string $username,string $password){
        $sql = "SELECT * from users where username = '".$username."' AND password = '".$password."'";
        $result = $this->GetUnique($sql);
        return $result;
    }
    public function setUser($user){
        $sql = "SELECT * from users where username = '".$user['username']."'";
        $result = $this->GetUnique($sql);
        // return $result;
        $this->name = $result['NAME'];
        $this->username = $result['USERNAME'];
    }

    public function getUser(){
        return $this->username;
    }

}
?>