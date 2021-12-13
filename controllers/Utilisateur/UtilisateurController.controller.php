<?php

require_once "./controllers/MainController.controller.php";
require_once "./models/Utilisateur/UtilisateurModel.model.php";

class UtilisateurController extends MainController
{
    private $utilisateurManager;



    public function __construct()
    {

        $this->utilisateurManager = new UtilisateurManager();
    }



    public function validation_login($login, $password)
    {
        if ($this->utilisateurManager->isCombinaisonValide($login, $password)) {
            if ($this->utilisateurManager->estCompteActive($login)) {
                Toolbox::ajouterMessageAlerte("Bon retour sur le site " . $login . " !", Toolbox::COULEUR_VERTE);
                $_SESSION['profil'] = ["login" => $login];
                header("Location: " . URL . "compte/profil");
            } else {
                Toolbox::ajouterMessageAlerte("Le compte " . $login . " n'a pas été activé !!", Toolbox::COULEUR_ROUGE);
                //RENVOYER LE MAIL DE VALIDATION:
                header("Location: " . URL . "login");
            }
        } else {
            Toolbox::ajouterMessageAlerte("Combinaison Login / Mot de passe non valide", Toolbox::COULEUR_ROUGE);
            header("Location: " . URL . "login");
        }
    }

    


    public function profil()
    {
        $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['login']);
        $_SESSION['profil']['role'] = $datas['role'];

        $data_page = [
            "page_description" => "Page du Profil",
            "page_title" => "Page du Profil",
            "utilisateurProfil" => $datas,
            "view" => "views/Utilisateur/profil.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
    

    public function deconnection(){
        Toolbox::ajouterMessageAlerte("La déconnexion a été établie avec succès",Toolbox::COULEUR_VERTE);
        unset($_SESSION['profil']);
        header('Location: '.URL."accueil");
    }

    public function pageErreur($msg)
    {
        parent::pageErreur($msg);
    }
}
