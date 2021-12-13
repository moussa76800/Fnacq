<?php

require_once "./controllers/MainController.controller.php";
require_once "./models/Visiteur/VisiteurModel.model.php";

class VisiteurController extends MainController
{
    private $visiteurManager;

    public function __construct()
    {

        $this->visiteurManager = new VisiteurManager();
    }



    public function accueil()
    {
        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Titre de la page d'accueil",
            "view" => "views/Visiteur/accueil.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function login()
    {
        $data_page = [
            "page_description" => "La page de connexion",
            "page_title" => "La page de connexion",
            "view" => "views/Visiteur/login.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function inscription()
    {
        $data_page = [
            "page_description" => "La page d'inscription",
            "page_title" => "La page d'inscription",
            "view" => "views/Visiteur/inscription.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }


    public function validation_inscription($login, $password, $email )
    {
        if ($this->visiteurManager->verifLoginDisponible($login)) {
            $passwordCrypte=password_hash($password,PASSWORD_DEFAULT);
            $clef=rand(0,9999);
            if($this->visiteurManager->InscriptionBD($login,$passwordCrypte,$email,$clef)){

            }else{
                Toolbox::ajouterMessageAlerte("Une erreur est intervenue lors de la création du compte,veuillez recommencez l'inscription", Toolbox::COULEUR_ROUGE);
                 header('location: '.URL."inscription");
            }
        } else {
            Toolbox::ajouterMessageAlerte("Le login est déja utilisé !!", Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . "inscription");
        }
    }

    public function pageErreur($msg)
    {
        parent::pageErreur($msg);
    }
}
