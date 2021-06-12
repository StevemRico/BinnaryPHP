<?php

class UserModel extends Model implements IModel{

    private $id_user;
    private $username;
    private $password;
    private $email;
    private $phone_number;
    private $role;
    private $birthday_date;
    private $login_date;

    public function __construct(){ 
        parent::__construct();

        $this->username = '';
        $this->email = '';
        $this->phone_number = '';
        $this->role = '';
        $this->birthday_date = '';
        $this->login_date = '';
    }

    public function save(){ 
        try {
            $query = $this->prepare('INSERT INTO users (Username,Email,Password,Phone_number,role,user_status) VALUES (:username, :email, :password, :phone_number,"1", "1")');
            $query->execute([
                'username' => $this->username,
                'email' => $this->email,
                'password' => $this->password,
                'phone_number' => $this->phone_number
            ]);

            return true;
        } catch (PDOException $e) {
            error_log('USERMODEL::save->PDOException'. $e);
            return false;
        }
    }

    public function getAll(){
        $items = [];
        try {
            $query = $this->query('SELECT * FROM users');
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new UserModel();
                $item->setId($p['id_user']);
                $item->setUsername($p['username']);
                $item->setEmail($p['email']);
                $item->setPassword($p['password']);
                $item->setPhoneNumber($p['phone_numer']);
                $item->setRole($p['role']);
                $item->setBirthyDate($p['birthday_date']);
                $item->setLoginDate($p['login_date']);

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log('USERMODEL::getAll->PDOException'. $e);
        }
    }

    public function get($id){
        try {
            $query = $this->prepare('SELECT * FROM users WHERE id_user = :id_user');
            $query->execute([
                'id_user' => $id
            ]);

            $user = $query->fetch(PDO::FETCH_ASSOC);

            $this->setId($user['id_user']);
            $this->setUsername($user['username']);
            $this->setEmail($user['email']);
            $this->setPassword($user['password']);
            $this->setPhoneNumber($user['phone_numer']);
            $this->setRole($user['role']);
            $this->setBirthyDate($user['birthday_date']);
            $this->setLoginDate($user['login_date']);
                
            return $this;

        } catch (PDOException $e) {
            error_log('USERMODEL::getID->PDOException'. $e);
        }
    }

    public function delete($id){
        try {
            $query = $this->prepare('DELETE FROM users WHERE id_user = :id_user');
            $query->execute([
                'id_user' => $id
            ]);
            return true;
        } catch (PDOException $e) {
            error_log('USERMODEL::Delete->PDOException'. $e);  
            return false;
        }
    }

    public function update(){
        try {
            $query = $this->prepare('UPDATE users SET username = :username WHERE id_user = :id_user');
            $query->execute([
                'id_user' => $this->id,
                'username' => $this->username
            ]);

            return true;

        } catch (PDOException $e) {
            error_log('USERMODEL::getID->PDOException'. $e);
            return true;
        }
    }

    public function from($array){
        // De momento yo no le veo uso, pero dejarlo para mas adelante del tutorial
        // $this->$username = $array['username'];
    }

    public function exists($username){
        try {
            $query = $this->prepare('SELECT username FROM users WHERE username = :username');
            $query->execute(['usernanme' => $username] );
            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            error_log('USERMODEL::exists->PDOException'. $e);
            return false;
        }
    }

    public function comparePasswords($password, $id_user){
        try {
            $user = $this->get($id_user);
            return password_verify($password, $user->getPassword());
        } catch (PDOException $e) {
            error_log('USERMODEL::comparePasswords->PDOException'. $e);
            return false;
        }
    }
    
    private function getHashedPassword($password){
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
    }

    #SET
    public function setId($id){ $this->id_user = $id; }
    public function setUsername($username){ $this->username = $username; }
    public function setEmail($email){ $this->email = $email; }
    
    public function setPassword($password){ 
        $this->password = $this->getHashedPassword($password); 
    }

    public function setPhoneNumber($phone_number){ $this->phone_number = $phone_number; }
    public function setRole($role){ $this->role = $role; }
    public function setBirthyDate($birthday_date){ $this->birthday_date = $birthday_date; }
    public function setLoginDate($login_date){ $this->login_date = $login_date; }

    #GET
    public function getId(){ return $this->id_user; }
    public function getUsername(){ return $this->username; }
    public function getEmail(){ return $this->email; }
    public function getPassword(){ return $this->password; }
    public function getPhoneNumber(){ return $this->phone_number; }
    public function getRole(){ return $this->role; }
    public function getUserStatus(){ return $this->user_status; }
    public function getBirthyDate(){ return $this->birthday_date; }
    public function getLoginDate(){ return $this->login_date; }
    
}

?>