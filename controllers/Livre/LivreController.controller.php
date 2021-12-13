<?php

require_once "./controllers/MainController.controller.php";
require_once "./models/Livre/LivreManager.model.php";


class LivreController extends MainController
{

    private $livreManager;


    public function __construct()
    {
        $this->livreManager = new LivreManager();
        $this->livreManager->chargementLivres();
    }

    public function afficherLivres()
    {
        $livres = $this->livreManager->getLivres();
        require "views/Livre/livres.view.php";
        
    }

 
    public function afficherLivre()
    {
        $data_page = [
            "page_description" => "La page des livres",
            "page_title" => "La page des livres",
            "view" => "views/Livre/livre.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function afficherUnLivre($id)
    {
        $livre = $this->livreManager->getLivreById($id);
        
        require "views/Livre/afficherUnLivre.view.php";
    }
   
}
