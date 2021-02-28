<link rel="stylesheet" href="../Assets/Publication.css">
<?php

class Publication extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function publication($params){
        
    }

    public function Post(){
        if(!isset($_POST["Model"]) || !isset($_POST["Brand"]) || !isset($_POST["Type1"]) || !isset($_POST["Type2"]) || !isset($_POST["Price"]) || !isset($_POST["Imagen"])){
        }else{
            $data = $this->model->PostProduct($_POST['Model'],$_POST['Brand'],$_POST['Type1'],$_POST['Type2'],$_POST['Price'],$_POST['Imagen']);
            header("Location:".base_url()."");
        }
    }
    public function Put($id,$Model,$Brand,$Type1,$Type2,$Price,$Image){
        $data = $this->model->PutProduct($id,$Model,$Brand,$Type1,$Type2,$Price,$Image);
    }
    public function Get(){
        $data = $this->model->GetPublication();
        $this->Views->getView($this,"Publication",$data);
    }
    public function GetUnique($id){
        $data = $this->model->GetUniqueProduct($id);
        $this->Views->getView($this,"Products",$data);
    }
    public function Delete($id){
        $data = $this->model->DeleteProduct($id);
        header("Location:".base_url()."");
    }

}

?>