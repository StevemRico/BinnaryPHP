<?php

    class UserModel extends Model implements IModel{

        private $id, $username, $password, $email, $phone, $role;

        public function __construct(){
            parent::__construct();
            $this->username = '';
            $this->password = '';
            $this->email = '';
            $this->phone = '';
            $this->role = '';
            $this->picture_profile = '';
            $this->profile_description = '';
        }

        public function save(){
            try{
                $query = $this->prepare('INSERT INTO users (username, password, role, email, phone_number, user_status) VALUES(:username, :password, :role, :email, :phone, 1 )');
                $query->execute([
                    'username'  => $this->username, 
                    'password'  => $this->password,
                    'role'      => $this->role,
                    'email'      => $this->email,
                    'phone'     => $this->phone
                    ]);
                    $query2 = $this->prepare('INSERT INTO profile (register_date,fk_user,profile_image) VALUES (CURRENT_TIMESTAMP,(SELECT id_user FROM users ORDER BY id_user DESC LIMIT 1),"./public/img/profile/picture-profile.png")');
                    $query2->execute();
                return true;
            }catch(PDOException $e){
                error_log($e);
                return false;
            }
        }

        public function getAll(){
            $items = [];
            try{
                $query = $this->query('SELECT * FROM users');

                while($p = $query->fetch(PDO::FETCH_ASSOC)){
                    $item = new UserModel();
                    $item->setId($p['id_user']);
                    $item->setUsername($p['username']);
                    $item->setPassword($p['password'], false);
                    $item->setPhone($p['phone']);
                    $item->setRole($p['role']);

                    array_push($items, $item);
                }
                return $items;
            }catch(PDOException $e){
                error_log($e);
            }
        }

        public function get($id){
            try{
                $query = $this->prepare('SELECT * FROM users INNER JOIN profile on users.id_user = profile.fk_user WHERE id_user = :id');
                $query->execute([ 'id' => $id]);
                $user = $query->fetch(PDO::FETCH_ASSOC);
                
                $this->id = $user['id_user'];
                $this->username = $user['username'];
                $this->password = $user['password'];
                $this->role = $user['role'];
                $this->phone = $user['phone_number'];
                $this->picture_profile = $user['profile_image'];
                $this->profile_description = $user['description_profile'];
                
                return $this;
            }catch(PDOException $e){
                error_log($e);
                return false;
            }
        }

        public function delete($id){
            try{
                $query = $this->prepare('DELETE FROM users WHERE id_user = :id');
                $query->execute([ 'id' => $id]);
                return true;
            }catch(PDOException $e){
                error_log($e);
                return false;
            }
        }

        public function update(){
            // De momento nos toca generar la logica para hacer el cambio del email y el phone
            try{
                $query = $this->prepare('UPDATE users SET username = :username, password = :password, email = :email, phone_number = phone WHERE id_user = :id');
                $query->execute([
                    'id'        => $this->id,
                    'username' => $this->username,
                    'password' => $this->password,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    ]);
                return true;
            }catch(PDOException $e){
                error_log($e);
                return false;
            }
        }

        public function from($array){
            $this->id = $array['id_user'];
            $this->username = $array['username'];
            $this->password = $array['password'];
            $this->role = $array['role'];
            $this->phone = $array['phone_number'];
            $this->picture_profile = $array['profile_image'];
            $this->profile_description = $array['description_profile'];
        }

        public function existsUsername($username){
            try{
                $query = $this->prepare('SELECT username FROM users WHERE username = :username');
                $query->execute( ['username' => $username]);
                
                if($query->rowCount() > 0){
                    return true;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                echo $e;
                return false;
            }
        }

        public function existsEmail($email){
            try{
                $query = $this->prepare('SELECT email FROM users WHERE email = :email');
                $query->execute( ['email' => $email]);
                if($query->rowCount() > 0){ 
                    return true;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                echo $e;
                return false;
            }
        }

        public function existsPhone($phone){
            try{
                $query = $this->prepare('SELECT phone_number FROM users WHERE phone_number = :phone');
                $query->execute( ['phone' => $phone]);
                if($query->rowCount() > 0){ 
                    return true;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                echo $e;
                return false;
            }
        }

        public function setId($id){ $this->id = $id; }
        public function setUsername($username){ $this->username = $username; }
        public function setEmail($email){ $this->email = $email; }
        public function setPhone($phone){ $this->phone = $phone; }
        public function setRole($role){ $this->role = $role; }
        public function setPicture($picture_profile){ $this->picture_profile = $picture_profile; }
        public function setPassword($password, $hash = true){ 
            if($hash){
                $this->password = $this->getHashedPassword($password);
            }else{
                $this->password = $password;
            }
        }

        private function getHashedPassword($password){
            return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
        }

        function comparePasswords($current, $id_user){
            try{
                $user = $this->get($id_user);
                return password_verify($current, $user->getPassword());
                return NULL;
            }catch(PDOException $e){
                return NULL;
            }
        }

        public function getId(){        return $this->id; }
        public function getUsername(){  return $this->username; }
        public function getPassword(){  return $this->password;}
        public function getEmail(){     return $this->email; }
        public function getPhone(){     return $this->phone; }
        public function getRole(){      return $this->role; }
        public function getPicture(){      return $this->picture_profile; }
        public function getProfileDescription(){      return $this->profile_description; }

    }

?>