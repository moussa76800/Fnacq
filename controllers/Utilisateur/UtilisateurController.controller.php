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


    public function deconnection()
    {
        Toolbox::ajouterMessageAlerte("La déconnexion a été établie avec succès", Toolbox::COULEUR_VERTE);
        unset($_SESSION['profil']);
        header('Location: ' . URL . "accueil");
    }

    public function modifPassword()
    {
        $data_page = [
            "page_description" => "Page de modification du mot de passe",
            "page_title" => "Page de modification du mot de passe",
            "page_javascript" => ["modificationPassword.js"],
            "view" => "views/Utilisateur/modificationPassword.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function validation_modificationPassword($oldPassword,$newPassword,$confirmNewPassword)
    {
        if ($newPassword === $confirmNewPassword) {
            if ($this->utilisateurManager->isCombinaisonValide($_SESSION['profil']['login'], $oldPassword)) {
               $passwordCrypte= password_hash($newPassword,PASSWORD_DEFAULT);
               if($this->utilisateurManager->modificationPasswordDB($_SESSION['profil']['login'],$passwordCrypte)){
                   Toolbox::ajouterMessageAlerte("La modification du mot de passe à été effectuée avec succes !!",Toolbox::COULEUR_VERTE);
                   header("Location: ".URL."compte/profil");
               }else{
                Toolbox::ajouterMessageAlerte("La modification a échouée!!!", Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."compte/modificationPassword");
               }
            } else {
                Toolbox::ajouterMessageAlerte("La combinaison login et du mot de passe d'origine ne correspondent pas  !!!", Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."compte/modificationPassword");
            }
        } else {
            Toolbox::ajouterMessageAlerte("Les mots de passes ne correspondent pas !!!", Toolbox::COULEUR_ROUGE);
            header("Location: " . URL . "compte/modificationPassword");
        }
    }



    public function pageErreur($msg)
    {
        parent::pageErreur($msg);
    }
}
