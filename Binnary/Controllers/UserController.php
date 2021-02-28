<link rel="stylesheet" href="../Assets/LoginRegister.css">
<?php
class User extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function user($params){
        $this->Views->getView($this,"user");
    }

    public function Login(){
        // session_start();
        if(empty($_SESSION['user'])){
        }else{
            header("Location:".base_url()."");
        }
        $session = new Session();
        echo "
        </br></br></br></br></br></br>
        <div class='grid-loginRegister'>
            <div class='container-loginRegister'>
                <div class='keypad-loginRegister'>
                    <a href='".base_url()."User/Login' class='LoginRegister'>Login</a>
                    <a href='".base_url()."User/Register' class='LoginRegister'>Register</a>
                </div>
                <form action='' class='FormLogin' method='post' enctype='multipart/formdata'>
                    <input class='Username' type='text' name='Username' id='Username' placeholder='Username' autocomplete='off'>
                    <input class='Password' type='Password' name='Password' id='Password' placeholder='Password'>
                    <button class='btn btn-primary btn-block' type='submit' >Login</button>
                    <a href='".base_url()."User/Register'>Don't have account</a>
                </form>
            </div>
        </div>
        ";
        if(!isset($_POST["Username"]) || !isset($_POST["Password"])){
        }else{
            $data = $this->model->LoginUser($_POST['Username'],$_POST['Password']);

            if(!$data){
                ECHO "Usuario y/o contraseña son incorrectos";
                $user = $session->CloseSession();
            }else{
                if(isset($_SESSION['user'])){
                    // echo "hay sesion";
                    $user = $this->model->setUser($session->getCurrentUser());
                    // print_r($_SESSION['user']);
                    header( "Location:".base_url()."");
                }else{
                    // echo "hay que sesion";
                    // $openSession = $session->OpenSession();
                    $User = $session->CurrentUser($data);
                    header( "Location:".base_url()."");
                    // print_r($_SESSION['user']);
                }
            }
        }
        echo $user = $this->model->getUser();
    }

    public function Register(){
        if(empty($_SESSION['user'])){
        }else{
            header("Location:".base_url()."");
        }
        echo "
        </br></br></br></br></br>
        <div class='grid-loginRegister'>
            <div class='container-loginRegister'>
                <div class='keypad-loginRegister'>
                    <a href='".base_url()."User/Login' class='LoginRegister'>Login</a>
                    <a href='".base_url()."User/Register' class='LoginRegister'>Register</a>
                </div>
                
                <form class='FormRegister' action='' method='post' enctype='multipart/formdata'>
                    <input class='' type='text' name='Username' id='Username' placeholder='Username'>
                    <input class='' type='text' name='Email' id='Email' placeholder='Email'>
                    <input class='' type='text' name='Pass' id='Pass' placeholder='Password'>
                    <input class='' type='text' name='RPassword' id='RPassword' placeholder='Repeat Password'>
                    <input class='' type='text' name='Phone_Number' id='Phone_Number' placeholder='Phone Number'>
                    <button class='btn btn-primary btn-block' type='submit' >Registrarse</button>

                    <a href='".base_url()."User/Login'>have account</a>

                </form>
            </div>
        </div>
        ";
        if(!isset($_POST["Username"]) || !isset($_POST["Email"]) || !isset($_POST["Pass"]) || !isset($_POST["Phone_Number"])){
        }else{  
            $data = $this->model->RegisterUser($_POST['Username'],$_POST['Email'],$_POST['Pass'],$_POST['Phone_Number']);
            header("Location:".base_url()."");
        }
    }

    public function getUsers(){
        $session = new Session();
        $user = $this->model->getUser();
        echo $user;
    }

    public function Logout(){
        session_unset();
        session_destroy();
        header("Location:".base_url()."");
    }
}

?>