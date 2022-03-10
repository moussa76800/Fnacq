<?php

require_once "./controllers/MainController.controller.php";
require_once "./models/Panier/panierManager.model.php";


class PanierController extends MainController
{

    private $panierManager;

    public function __construct()
    {
        $this->panierManager = new PanierManager();
    }

public function afficherPanier(){
        $data_page = [
            "page_description" => "Panier",
            "page_title" => "Panier",
            "view" => "views/Panier/panier.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    

    public function addLivre($id,$quantity)
    {
        $this->panierManager->addLivre($id,$quantity);
        
    }
}