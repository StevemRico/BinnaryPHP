<?php

require_once 'models/usermodel.php';

class LoginModel extends Model{

    function __construct(){
        parent::__construct();
    }

    function login($username, $password){
        try {
            $query = $this->prepare('SELECT * FROM users WHERE username = :username');
            $query->execute(['username' => $username]);
            if($query->rowCount() == 1){
                $item = $query->fetch(PDO::FETCH_ASSOC);
                
                $user = new UserModel();
                $user->from($item);

                if(password_verify($password, $user->getPassword())){
                    error_log('LOGINMODEL::login->success');
                    return $user;
                }else{
                    error_log('LOGINMODEL::login->PASSWORD INCORRECT');
                    return NULL;
                }
            }
        } catch (PDOException $e) {
            error_log('LOGINMODEL::login -> '. $e);
            return NULL;
        }
    }
}

?>