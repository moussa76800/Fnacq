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
        $result = json_decode($_COOKIE['panier'], true);
        return $result;
    }

    public function delLivre($id){
        $panier = json_decode($_COOKIE['panier'], true);
        foreach ($panier as $key => $value) {
            if ($panier[$key]['Valeur_Id'] == $id) {
                unset($panier[$key]);
                $chaine = json_encode($panier);
                setcookie("panier", $chaine, time() + 365 * 24 * 3600, '/');
            }
        }
    }
    
    public function addLivre($id, $quantity)
    {
        $livre = $this->livres->addPanierLivre($id);
        if ($quantity > 10) {
            $quantity = 10;
        }
        if (isset($_COOKIE['panier'])) {
            $panier = json_decode($_COOKIE['panier'], true);
        } else {
            $panier = array();
        }
         // si ce $livre existe déja dans le $panier
        $item_id_list = array_column($panier, 'Valeur_Id');
        if (in_array($id, $item_id_list)) {
            foreach ($panier as $key => $valeur) {
                if ($panier[$key]['Valeur_Id'] == $id) {
                    if (($panier[$key]['Valeur_Quantity']+$quantity) < 10) {
                        $panier[$key]['Valeur_Quantity'] = $panier[$key]['Valeur_Quantity'] + $quantity;
                    }else {
                        $panier[$key]['Valeur_Quantity'] = 10;
                        Toolbox::ajouterMessageAlerte("Le maximum est de 10 articles !!", Toolbox::COULEUR_ROUGE);
                    }
                }
            }
        } else {
            $valeur = array(
                'Valeur_Id' => $livre->getId(),
                'Valeur_Title' => $livre->getTitle(),
                'Valeur_Image' => $livre->getImage(),
                'Valeur_Price' => $livre->getPrice(),
                'Valeur_Quantity' => $quantity
            );
            $panier[] = $valeur;
        }
        $chaine = json_encode($panier);
        setcookie("panier", $chaine, time() + 365 * 24 * 3600, '/');
    }
}
