<?php

// require_once 'models/UserModel.php';

class Profile extends SessionController{

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    function render(){
        $publications = $this->getPublications();
        $this->view->errorMessage = '';
        $this->view->render('header/index', [
            'user' => $this->user
        ]);
        $this->view->render('profile/index', [
            'publications' => $publications,
            'user' => $this->user,
            'hole' => 'Hola'
        ]);
    }

    function getPublications(){
        $res = [];
        $this->publicationsM = new PublicationModel();
        $publications = $this->publicationsM->getUserPublication($this->user->getId());
        // $publications = array( "1" => "bar", "2" => "foo", "3" => "foo", "4" => "foo", "5" => "foo", "6" => "foo", "7" => "foo", );
        foreach ($publications as $publication) {
            $categoryArray = [];
            $categoryArray['file'] = $publication->getFile();
            array_push($res, $categoryArray);
        }
        return $res;
    }
    
}

?>