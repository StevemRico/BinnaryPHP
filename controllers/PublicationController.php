
<?php

// require_once 'models/UserModel.php';

class Publication extends SessionController{

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    function render(){
        $this->view->errorMessage = '';
        $this->view->render('header/index', [
            'user' => $this->user
        ]);
        $this->view->render('publication/index', []);
    }

    function newPublication(){
        if($this->existPOST(['description'])){
            $description = $this->getPost('description');
            $fileR = getimagesize($_FILES["file"]["tmp_name"]);
            if($fileR !== false){
            $image = $_FILES['file']['name'];
            $imageR = $_FILES['file']['tmp_name'];
            $destino = './public/img/publications/'.$image;
            copy($imageR,$destino);
            $file = $destino;
            }
            
            $Publi = new PublicationModel();
            $Publi->setDescription($description);
            $Publi->setFile($file);
            
            $this->redirect('');
            if($description == '' || empty($description) || $file == '' || empty($file)){
                $this->redirect('publication', ['error' => ErrorsMessages::ERR_POSTPUBLI_NEWPUBLICATION_EMPTY]);
            }else if($Publi->save()){
                    $this->redirect('');
            }
        }else{
            $this->redirect('signup', ['error' => ErrorsMessages::ERR_SIGNUP_USERNAME_EXISTS]);
        }
    }
}

?>