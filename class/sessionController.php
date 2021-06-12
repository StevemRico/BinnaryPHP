<?php

require_once 'class/session.php';

    class SessionController extends Controller{

        private $userSession;
        private $username;
        private $user_id;
        
        private $session;
        private $sites;
        private $user;


        public function __construct(){
            parent::__construct();
            $this->init();
        }

        function init(){
            $this->session = new Session();

            $json = $this->getJSONFileConfig();

            $this->sites = $json['sites'];
            $this->defaultSites = $json['default-sites'];

            $this->validateSession();
        }


        private function getJSONFileConfig(){
            $string = file_get_contents('config/access.json');
            $json = json_decode($string, true);

            return $json;
        }

        public function validateSession(){
            error_log('SESSIONCONTROLLER::ValidateSession');
            //Si existe la session
            if($this->existsSession()){
                $role = $this->getUserSessionData()->getRole();
                // Si la pagina es publica
                if($this->isPublic()) {
                    $this->redirectDefaultSiteByRole($role);
                }else{
                    if($this->isAuthorized($role)){
                        //Se deja pasar
                    }else{
                        $this->redirectDefaultSiteByRole($role);
                    }
                }
            }else{
                // No hay Session
                if($this->isPublic()){
                    // Lo deja entrar
                }else{
                    header('Location: ' . constant('URL') . '');
                }
            }
        }

        function existsSession(){
            if(!$this->session->exists()) return false;
            if($this->session->getCurrentUser() == NULL) return false;

            $user_id = $this->sesssion->getCurrentUser();

            if($user_id) return true;

            return false;

        }

        function getUserSessionData(){
            $id = $this->user_id;
            $this->user = new UserModel();
            $this->user->get($id);
            error_log('SESSIONCONTROLLER::getUserSessionData -> '. $this->user->getUsername());
            return $this->user;
        }

        function isPublic(){
            $currentURL =  $this->getCurrentPage();
            $currentURL = preg_replace("/\?.*/", "", $currentURL);
            for($i = 0; $i < sizeof($this->sites); $i++){
                if($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['access'] == 'public'){
                    return true;
                }
            }
            return false;
        }

        function getCurrentPage(){
            $acutalLink = trim("$_SERVER[REQUEST_URI]");
            $url = explode('/', $acutalLink);
            error_log('SESSIONCONTROLLER::getCurrentPage -> '. $url[2]);
            return $url[2];

        }

        private function redirectDefaultSiteByRole($role){
            $url = '';
            for ($i=0; $i < sizeof($this->sites); $i++) { 
                if($this->sites[$i]['role'] == $role){
                    $url = '/binnary/' . $this->sites[$i]['site'];
                    break;
                }
            }
            header('Location:' . $url);
        }

        private function isAuthorized($role){
            $currentURL =  $this->getCurrentPage();
            $currentURL = preg_replace("/\?.*/", "", $currentURL);
            for($i = 0; $i < sizeof($this->sites); $i++){
                if($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['role'] == $role){
                    return true;
                }
            }
            return false;
        }

        function initialize($user){
            $this->session->setCurrentUser($user->getId());
            $this->authorizeAccess($user->getRole());
        }

        function authorizeAccess($role){
            switch($role){
                case 'user':
                    $this->redirect($this->defaultSites['user'], []);
                break;
                case 'admin':
                    $this->redirect($this->defaultSites['admin'], []);
                break;
            }
        }

        function logout(){
            $this->session->closeSession();
        }

    }

?>