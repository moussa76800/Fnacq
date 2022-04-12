<?php

require_once "./controllers/MainController.controller.php";
require_once "./models/Hifi/HifiManager.model.php";


class HifiController extends MainController
{

    private $hifiManager;


    public function __construct()
    {
        $this->hifiManager = new HifiManager();
<<<<<<< HEAD
=======
        $this->hifiManager ->chargementHifi();
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
    }
    
    public function afficherHifi()
    {
<<<<<<< HEAD
        $data_page = [
            "page_description" => "La page du materiels hifi",
            "page_title" => "La page du materiels hifi",
=======
        $hifi = $this->hifiManager->getHifi();
        $data_page = [
            "page_description" => "La page du materiels hifi",
            "page_title" => "La page du materiels hifi",
            "hifi"=>$hifi,
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
            "view" => "views/Materiel-Hifi/hifi.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
<<<<<<< HEAD
}
=======
   

    public function afficherUnHifi($id)
    {
        $hifi = $this->hifiManager->getHifiById($id);
        $data_page = [
            "page_description" => "Affichage d'article hifi",
            "page_title" => "Affichage d'article hifi",
            "hifi"=>$hifi,
            "view" => "views/materiel-Hifi/afficherUnHifi.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
    
    public function buyHifi($id){
        $hifie = $this->hifiManager->getHifiById($id);
        $data_page = [
            "page_description" => "Panier",
            "page_title" => "Panier",
            "hifie"=>$hifie,
            "view" => "views/materiel-Hifi/addPanierHifi.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
     // panier
     public function addPanierHifi($id)
     {
         return $this->hifiManager->getHifiById($id);
     }
}
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
