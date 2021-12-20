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


    public function validation_inscription($login, $password, $email, $nom, $prenom, $adresse, $code_postal, $date_de_naissance)
    {
        if ($this->visiteurManager->verifLoginDisponible($login)) {
            $passwordCrypte = password_hash($password, PASSWORD_DEFAULT);
            $clef = rand(0, 9999);
            if ($this->visiteurManager->InscriptionBD($login, $passwordCrypte, $email, $clef, $nom, $prenom, $adresse, $code_postal, $date_de_naissance)) {
                $this->sendMailValidation($login, $email, $clef);

                Toolbox::ajouterMessageAlerte("Le compte a a bien été crée,validez le mail envoyé pour le valider !", Toolbox::COULEUR_VERTE);
                header('location: ' . URL . "login");
            } else {
                Toolbox::ajouterMessageAlerte("Une erreur est intervenue lors de la création du compte,veuillez recommencez l'inscription", Toolbox::COULEUR_ROUGE);
                header('location: ' . URL . "inscription");
            }
        } else {
            Toolbox::ajouterMessageAlerte("Le login est déja utilisé !!", Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . "inscription");
        }
    }

    private function sendMailValidation($login, $email, $clef)
    {
        $urlVerification = URL . "validationMail/" . $login . "/" . $clef;
        $sujet = "création du compte sur le site FNACQ";
        $message = "pour valider votre compte,veuillez cliquer sur le lien suivant " . $urlVerification;
        Toolbox::sendMail($email, $sujet, $message);
    }

    public function pageErreur($msg)
    {
        parent::pageErreur($msg);
    }

    public function profil()
    {
        $datas = $this->visiteurManager->getUserInformation($_SESSION['profil']['login']);
        $_SESSION['profil']['role'] = $datas['role'];

        $data_page = [
            "page_description" => "Page du Profil",
            "page_title" => "Page du Profil",
            "utilisateurProfil" => $datas,
            "view" => "views/Visiteur/profil.view.php",
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
}
