<?php

require_once  "./models/MainManager.model.php";
require_once  "./controllers/Livre/Livrecontroller.controller.php";
require_once "./models/Livre/Livre.class.php";


class PanierManager extends  MainManager
{

    private $livres;

    public function __construct()
    {
        $this->livres = new LivreController();
        $this->panier = array();
    }

    public function panier_data()
    {
        $result = json_decode($_COOKIE['panier'],true);
        return $result;
    }

    public function addLivre($id, $quantity)
    {
        $livre = $this->livres->addPanierLivre($id);

        if (isset($_COOKIE['panier'])) {
            $panier = json_decode($_COOKIE['panier']);
        } else {
            $panier = array();
        }


        // si ce livre existe déja dans le panier

        // alors ajouter la quantity + ( 10 ? )

        // sinon 

        // ajouter le livre dans la panier





        $valeur = array(
            'Valeur_Title' => $livre->getTitle(),
            'Valeur_Image' => $livre->getImage(),
            'Valeur_Price' => $livre->getPrice(),
            'Valeur_Quantity' => $quantity
        );
        $panier[] = $valeur;
        $chaine = json_encode($panier);



        setcookie("panier", $chaine, time() + 365 * 24 * 3600, '/');
    }
}
