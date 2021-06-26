<?php

class Home extends SessionController{

    // private $id, $username, $password, $email, $phone, $role;
    private $id_publication,$description,$file,$id_user,$publicationsM;

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }
    
    function render(){
        $publications = $this->getPublications();
        
        $this->view->render('header/index', [
            'user' => $this->user
        ]);
        $this->view->render('home/index', [
            'publications' => $publications,
            'user' => $this->user
        ]);
    }

    function getPublications(){
        $res = [];
        $this->publicationsM = new PublicationModel();
        error_log("GetPublications::Home -> ". $this->publicationsM->getDescription());

        $publications = $this->publicationsM->getAll();
        // $publications = array( "1" => "bar", "2" => "foo", "3" => "foo", "4" => "foo", "5" => "foo", "6" => "foo", "7" => "foo", );
        
        foreach ($publications as $publication) {
            // var_dump($publication);
            $categoryArray = [];
            $categoryArray['description'] = $publication->getDescription();
            $categoryArray['file'] = $publication->getFile();
            $categoryArray['username'] = $publication->getUsernameP();
            $categoryArray['profile_image'] = $publication->getProfileImage();
            array_push($res, $categoryArray);
        }
        return $res;
    }

}