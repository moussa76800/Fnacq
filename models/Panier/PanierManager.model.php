<?php

require_once  "./models/MainManager.model.php";
require_once  "./controllers/Livre/Livrecontroller.controller.php";
require_once "./models/Livre/Livre.class.php";


class PanierManager extends  MainManager{

    private $panier;
    private $livres;

    public function __construct()
    {
        $this->livres = new LivreController();
    }

public function addLivre($id,$quantity){
    $livre = $this->livres->addPanierLivre($id);
    $valeur = array($livre->getTitle(),$livre->getImage(),$livre->getPrice(),$quantity);
    $chaine = serialize($valeur);
    setcookie("panier[livres]",$chaine,'','/Fnacq/panier','localhost');
    
}
}
