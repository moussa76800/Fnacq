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
                $msg = "Le compte " . $login . " n'a pas été activé par mail !!";
                $msg .= "<a href='renvoyerMailValidaton/" . $login . "'>Renvoyez le mail de validation</a>";
                Toolbox::ajouterMessageAlerte($msg, Toolbox::COULEUR_ROUGE);
                header("Location: " . URL . "login");
            }
        } else {
            Toolbox::ajouterMessageAlerte("Combinaison Login / Mot de passe non valide", Toolbox::COULEUR_ROUGE);
            header("Location: " . URL . "login");
        }
        if  ($this->utilisateurManager->userBloque($login)) {
            Toolbox::ajouterMessageAlerte("Vous êtes un membre indésirable !! fouteur de merde", Toolbox::COULEUR_ROUGE);
            header("Location: " . URL . "login");
        }
    }

    public function validation_inscription($login, $password, $email, $nom, $prenom, $adresse, $code_postal, $date_de_naissance)
    {
        if ($this->utilisateurManager->verifLoginDisponible($login)) {
            $passwordCrypte = password_hash($password, PASSWORD_DEFAULT);
            $clef = rand(0, 9999);
            if ($this->utilisateurManager->InscriptionBD($login, $passwordCrypte, $email, "utilisateur", "profil/homme.jpg", $clef, $nom, $prenom, $adresse, $code_postal, $date_de_naissance)) {

                Toolbox::ajouterMessageAlerte("Le compte a a bien été crée, validez le mail envoyé pour le valider !", Toolbox::COULEUR_VERTE);
                $this->sendMailValidation($login, $email, $clef);
                Toolbox::ajouterMessageAlerte("La compte a été créé, Un mail de validation vous a été envoyé !", Toolbox::COULEUR_VERTE);
                header("Location: " . URL . "login");
            } else {
                Toolbox::ajouterMessageAlerte("Une erreur est intervenue lors de la création du compte,veuillez recommencez l'inscription", Toolbox::COULEUR_ROUGE);
                header('location: ' . URL . "inscription");
            }
        } else {
            Toolbox::ajouterMessageAlerte("Le login est déja utilisé !!", Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . "inscription");
        }
    }

    private function sendMailValidation($login, $mail, $clef)
    {
        $urlVerification = URL . "validationMail/" . $login . "/" . $clef;
        $sujet = "Création du compte sur le site xxx";
        $message = "Pour valider votre compte veuillez cliquer sur le lien suivant " . $urlVerification;
        Toolbox::sendMail($mail, $sujet, $message);
    }


    public function renvoyerMailValidation($login)
    {
        $utilisateur = $this->utilisateurManager->getUserInformation($login);
        $this->sendMailValidation($login, $utilisateur['mail'], $utilisateur['clef']);
        header("Location: " . URL . "login");
    }

    public function validation_mailCompte($login, $clef)
    {
        if ($this->utilisateurManager->bdValidationMailCompte($login, $clef)) {
            Toolbox::ajouterMessageAlerte("Le compte a été activé !", Toolbox::COULEUR_VERTE);
            $_SESSION['profil'] = [
                "login" => $login,
            ];
            header('Location: ' . URL . 'compte/profil');
        } else {
            Toolbox::ajouterMessageAlerte("Le compte n'a pas été activé !", Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . 'creerCompte');
        }
    }

    public function validation_modificationMail($email)
    {
        if ($this->utilisateurManager->bdModificationMailUser($_SESSION['profil']['login'], $email)) {
            Toolbox::ajouterMessageAlerte("La modification est effectuée", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::ajouterMessageAlerte("Aucune modification effectuée", Toolbox::COULEUR_ROUGE);
        }
        header("Location: " . URL . "compte/profil");
    }


    public function profil()
    {
        $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['login']);
        $_SESSION['profil']['role'] = $datas['role'];

        $data_page = [
            "page_description" => "Page du Profil",
            "page_title" => "Page du Profil",
            "utilisateur" => $datas,
            "page_javascript" => ["profil.js"],
            "view" => "views/Utilisateur/profil.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function validation_modificationImage($file)
    {
        try {
            $repertoire = "public/Assets/images/profil/" . $_SESSION['profil']['login'] . "/";
            $nomImage = Toolbox::ajoutImage($file, $repertoire); //ajout image dans le répertoire
            //Supression de l'ancienne image
            $this->dossierSuprresionImageUtilisateur($_SESSION['profil']['login']);
            //Ajout de la nouvelle image dans la BD
            $nomImageBD = "profil/" . $_SESSION['profil']['login'] . "/" . $nomImage;
            if ($this->utilisateurManager->bdAjoutImage($_SESSION['profil']['login'], $nomImageBD)) {
                Toolbox::ajouterMessageAlerte("La modification de l'image est effectuée", Toolbox::COULEUR_VERTE);
            } else {
                Toolbox::ajouterMessageAlerte("La modification de l'image n'a pas été effectuée", Toolbox::COULEUR_ROUGE);
            }
        } catch (Exception $e) {
            Toolbox::ajouterMessageAlerte($e->getMessage(), Toolbox::COULEUR_ROUGE);
        }

        header("Location: " . URL . "compte/profil");
    }
    private function dossierSuprresionImageUtilisateur($login)
    {
        $ancienneImage = $this->utilisateurManager->getImageUtilisateur($_SESSION['profil']['login']);
        if ($ancienneImage !== "profil/profil.png") {
            unlink("public/Assets/images/" . $ancienneImage);
        }
    }

    public function deconnexion()
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

    public function modifPostal()
    {
        $data_page = [
            "page_description" => "Page de modification du code postal",
            "page_title" => "Page de modification  du code postal",
            "page_javascript" => ["modificationPostal.js"],
            "view" => "views/Utilisateur/modificationPostal.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function validation_modificationPostal($oldPostal, $newPostal)
    {

        if ($this->utilisateurManager->isCombinaisonPostalValide($_SESSION['profil']['login'], $oldPostal)) {
            if ($this->utilisateurManager->bdmodifPostal($_SESSION['profil']['login'], $newPostal)) {
                toolbox::ajouterMessageAlerte("La modification du code postal à été effectuée avec succes !!", Toolbox::COULEUR_VERTE);
                header("Location: " . URL . "compte/profil");
            } else {

                toolbox::ajouterMessageAlerte("La modification du code postal n'a pas été effectuée !!", Toolbox::COULEUR_ROUGE);
                header("Location: " . URL . "compte/profil");
            }
        } else {
            toolbox::ajouterMessageAlerte("L'ancien code postal ne correspond pas à celui indiqué dans le formulaire !!", Toolbox::COULEUR_ROUGE);
            header("Location: " . URL . "compte/profil");
        }
    }




    public function validation_modificationPassword($oldPassword, $newPassword, $confirmNewPassword)
    {
        if ($newPassword === $confirmNewPassword) {
            if ($this->utilisateurManager->isCombinaisonValide($_SESSION['profil']['login'], $oldPassword)) {
                $passwordCrypte = password_hash($newPassword, PASSWORD_DEFAULT);
                if ($this->utilisateurManager->modificationPasswordDB($_SESSION['profil']['login'], $passwordCrypte)) {
                    Toolbox::ajouterMessageAlerte("La modification du mot de passe à été effectuée avec succes !!", Toolbox::COULEUR_VERTE);
                    header("Location: " . URL . "compte/profil");
                } else {
                    Toolbox::ajouterMessageAlerte("La modification a échouée!!!", Toolbox::COULEUR_ROUGE);
                    header("Location: " . URL . "compte/modificationPassword");
                }
            } else {
                Toolbox::ajouterMessageAlerte("La combinaison login et du mot de passe d'origine ne correspondent pas  !!!", Toolbox::COULEUR_ROUGE);
                header("Location: " . URL . "compte/modificationPassword");
            }
        } else {
            Toolbox::ajouterMessageAlerte("Les mots de passes ne correspondent pas !!!", Toolbox::COULEUR_ROUGE);
            header("Location: " . URL . "compte/modificationPassword");
        }
    }

    public function validation_suppressionCompte()
    {

        $this->dossierSuprresionImageUtilisateur($_SESSION['profil']['login']);
        rmdir("public/Assets/images/profil/" . $_SESSION['profil']['login']);
        if ($this->utilisateurManager->validation_suppressionCompteDB($_SESSION['profil']['login'])) {
            Toolbox::ajouterMessageAlerte("La suppression a été effectuée avec succes", Toolbox::COULEUR_VERTE);
            $this->deconnexion();
        } else {
            Toolbox::ajouterMessageAlerte("La suppression n'a pas aboutie,contactez l'administrateur", Toolbox::COULEUR_ROUGE);
            header("Location: " . URL . "compte/profil");
        }
    }

    public function pageErreur($msg)
    {
        parent::pageErreur($msg);
    }
}
