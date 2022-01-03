<?php
session_start();

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));

require_once "./controllers/Toolbox.class.php";
require_once "./controllers/Securite.class.php";
require_once("./controllers/Visiteur/VisiteurController.controller.php");
require_once("./controllers/Utilisateur/UtilisateurController.controller.php");
require_once("./controllers/Livre/LivreController.controller.php");
require_once("./controllers/Informatique/InformatiqueController.controller.php");
require_once("./controllers/Hifi/HifiController.controller.php");
require_once("./controllers/Tchat/TchatsControllers.controller.php");
require_once("./controllers/Blog/blogController.controller.php");
require_once("./controllers/Administrateur/AdministrateurController.controller.php");



$visiteurController = new VisiteurController();
$utilisateurController = new UtilisateurController();
$livreController = new LivreController();
$informatiqueController = new InformatiqueController();
$hifiController = new HifiController();
$tchatController = new TchatsControllers();
$blogController = new BlogController();
$administrateurController = new AdministrateurController();

try {
    if (empty($_GET['page'])) {
        $page = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page = $url[0];
    }

    switch ($page) {
        case "accueil":
            $visiteurController->accueil();
            break;

        case "materielsHifi":
            $hifiController->afficherHifi();
            break;

        case "materielsInformatiques":
            $informatiqueController->afficherInformatique();
            break;

        case "livres":
            if (empty($url[1])) {
                $livreController->afficherLivres();
            } else if ($url[1] === "display") {
                $livreController->afficherUnLivre($url[2]);
            } else if (Securite::estAdministrateur()) {

                if ($url[1] === "modify") {
                    $livreController->modificationLivre($url[2]);
                }
                if ($url[1] === "validationModif") {
                    $livreController->modifLivreValidation();
                }
                if ($url[1] === "add") {
                    $livreController->ajoutLivre();
                }
                if ($url[1] === "validationAjout") {
                    $livreController->ajoutLivreValidation();
                }
                if ($url[1] === "delete") {
                    $livreController->suppressionLivre($url[2]);
                } else {
                    throw new Exception("La page est inéxistante..");
                }
            } else {
                Toolbox::ajouterMessageAlerte("Vous ne pouvez pas accéder à ces options car vous n'êtes pas l'administrateur !!", Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . "accueil");
            }

            break;

        case "login":
            $visiteurController->login();
            break;

        case "validation_login":
            if (!empty($_POST['login']) && !empty($_POST['password'])) {
                $login = Securite::secureHTML($_POST['login']);
                $password = Securite::secureHTML($_POST['password']);
                $utilisateurController->validation_login($login, $password);
            } else {
                Toolbox::ajouterMessageAlerte("Login ou mot de passe non renseigné", Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . "login");
            }
            break;

        case "inscription":
            $visiteurController->inscription();
            break;

        case "validation_inscription":
            if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['code_postal']) && !empty($_POST['date_de_naissance'])) {
                $login = Securite::secureHTML($_POST['login']);
                $password = Securite::secureHTML($_POST['password']);
                $email = Securite::secureHTML($_POST['email']);
                $nom = Securite::secureHTML($_POST['nom']);
                $prenom = Securite::secureHTML($_POST['prenom']);
                $adresse = Securite::secureHTML($_POST['adresse']);
                $code_postal = Securite::secureHTML($_POST['code_postal']);
                $date_de_naissance = Securite::secureHTML($_POST['date_de_naissance']);
                $utilisateurController->validation_inscription($login, $password, $email, $nom, $prenom, $adresse, $code_postal, $date_de_naissance);
            } else {
                Toolbox::ajouterMessageAlerte("Veuillez insérer toutes les informations recquises !!", Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . "inscription");
            }
            break;

        case "renvoyerMailValidation":
            $utilisateurController->renvoyerMailValidation($url[1]);
            break;

        case "validationMail":
            $utilisateurController->validation_mailCompte($url[1], $url[2]);
            break;

        case "tchat":
            if (isset($_POST['submit'])) {
                if (!Securite::estConnecte()) {
                    Toolbox::ajouterMessageAlerte("Veuillez-vous connecter ou vous inscrire pour intéragir dans le chat !!!", Toolbox::COULEUR_ROUGE);
                    $tchatController->afficherTchat();
                } else {
                    $tchatController->ajoutTchat($_POST['user'], $_POST['message']);
                    Toolbox::ajouterMessageAlerte("votre message est enregistré.", Toolbox::COULEUR_VERTE);
                    $tchatController->afficherTchat();
                }
            } else {
                $tchatController->afficherTchat();
            }
            break;

        case "blog":
            if (empty($url[1])) {
                $blogController->afficherBlog();
            } else if ($url[1] === "afficherUnPost") {
                $blogController->afficherUnPost($url[2]);
            } else if (Securite::estAdministrateur() || Securite::estConnecte()) {
                if ($url[1] === "add" || $url[1] === "validationAjout") {
                    $blogController->ajoutPost();
                    $blogController->ajoutPostValidation();
                } else {
                    Toolbox::ajouterMessageAlerte("Vous ne pouvez avoir acces à ces options car vous n'êtes pas l'administrateur ou membre !! Veuillez-vous inscrire pour inntéragir dans le blog !!", Toolbox::COULEUR_ROUGE);
                    header('Location: ' . URL . "inscription");
                }
            } else if (Securite::estAdministrateur()) {
                if ($url[1] === "modify" || $url[1] === "validationModif" || $url[1] === "delete") {
                    $blogController->modificationPost($url[2]);
                    $blogController->modifPostValidation();
                    $blogController->suppressionPost($url[2]);
                } else {
                    Toolbox::ajouterMessageAlerte("Vous ne pouvez avoir acces à ces options car vous n'êtes pas l'administrateur !!", Toolbox::COULEUR_ROUGE);
                    header('Location: ' . URL . "blog");
                }
            } else {
                Toolbox::ajouterMessageAlerte("La page n'éxiste pas !!", Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . "accueil");
            }

            break;

        case "compte":
            if (!Securite::estConnecte()) {
                Toolbox::ajouterMessageAlerte("Veuillez vous connecter !!", Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . "login");
            } else {
                switch ($url[1]) {
                    case "profil":
                        $utilisateurController->profil();
                        break;

                    case "deconnection":
                        $utilisateurController->deconnexion();
                        break;

                    case "modificationPostal":
                        $utilisateurController->modifPostal();

                        break;
                    case "validation_modificationCodePostal":
                        if (!empty($_POST['oldPostal']) && !empty($_POST['newPostal'])) {
                            $oldPostal = Securite::secureHTML($_POST['oldPostal']);
                            $newPostal = Securite::secureHTML($_POST['newPostal']);
                            $utilisateurController->validation_modificationPostal($oldPostal, $newPostal);
                        }
                        break;

                    case "validation_modificationMail":
                        $utilisateurController->validation_modificationMail(Securite::secureHTML($_POST['email']));
                        break;

                    case "modificationPassword":
                        $utilisateurController->modifPassword();
                        break;

                    case "validation_modificationPassword":
                        if (!empty($_POST['oldPassword']) && !empty($_POST['newPassword']) && !empty($_POST['confirmNewPassword'])) {
                            $oldPassword = Securite::secureHTML($_POST['oldPassword']);
                            $newPassword = Securite::secureHTML($_POST['newPassword']);
                            $confirmNewPassword = Securite::secureHTML($_POST['confirmNewPassword']);
                            $utilisateurController->validation_modificationPassword($oldPassword, $newPassword, $confirmNewPassword);
                        } else {
                            Toolbox::ajouterMessageAlerte("vous n'avez pas renseigné toutes les informations necessaires pour la modification du mot de passe !!!", Toolbox::COULEUR_ROUGE);
                            header("Location: " . URL . "compte/modificationPassword");
                        }
                        break;

                    case "validation_modificationImage":
                        if ($_FILES['image']['size'] > 0) {
                            $utilisateurController->validation_modificationImage($_FILES['image']);
                        } else {
                            Toolbox::ajouterMessageAlerte("Vous n'avez pas modifié l'image", Toolbox::COULEUR_ROUGE);
                            header("Location: " . URL . "compte/profil");
                        }
                        break;

                    case "validation_suppressionCompte":
                        $utilisateurController->validation_suppressionCompte();
                        break;

                    default:
                        throw new Exception("Veuillez transmettre la bonne rubrique !!");
                }
            }
            break;

        case "administration":
            if (!Securite::estConnecte()) {
                Toolbox::ajouterMessageAlerte("Veuillez vous connecter !", Toolbox::COULEUR_ROUGE);
                header("Location: " . URL . "Login");
            } else if (!Securite::estAdministrateur()) {
                Toolbox::ajouterMessageAlerte("Accès inaccessible pour les utilisateurs !!!", Toolbox::COULEUR_ROUGE);
                header("Location: " . URL . "accueil");
            } else {
                switch ($url[1]) {
                    case "droits":
                        $administrateurController->droits();
                        break;
                    case "validation_modificationRole":
                        $administrateurController->validation_modificationRole($_POST['login'], $_POST['role'], $_POST['est_valide']);

                        break;
                    default:
                        throw new Exception("La page n'existe pas");
                }
            }
            break;
        default:
            throw new Exception("La page n'existe pas");
    }
} catch (Exception $e) {
    $visiteurController->pageErreur($e->getMessage());
}
