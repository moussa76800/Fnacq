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

$visiteurController = new VisiteurController();
$utilisateurController = new UtilisateurController();
$livreController = new LivreController();
$informatiqueController = new InformatiqueController();
$hifiController = new HifiController();
$tchatController = new TchatsControllers();
$blogController = new BlogController();

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
        case "livres":
            if (empty($url[1])) {
                $livreController->afficherLivres();
            } else if ($url[1] === "display") {
                $livreController->afficherUnLivre($url[2]);
            } else if ($url[1] === "modify") {
                $livreController->modificationLivre($url[2]);
            } else if ($url[1] === "validationModif") {
                $livreController->modifLivreValidation();
            } else if ($url[1] === "add") {
                $livreController->ajoutLivre();
            } else if ($url[1] === "validationAjout") {
                $livreController->ajoutLivreValidation();
            } else if ($url[1] === "delete") {
                $livreController->suppressionLivre($url[2]);
            } else {

                throw new Exception("La page est inéxistante..");
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
                $visiteurController->validation_inscription($login, $password, $email, $nom, $prenom, $adresse, $code_postal, $date_de_naissance);
            } else {
                Toolbox::ajouterMessageAlerte("Veuillez insérer toutes les informations recquises !!", Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . "inscription");
            }
            break;
        case "validationMail":
            echo "test";
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
                        $utilisateurController->deconnection();
                        break;
                    case "validation_modificationMail":
                        echo "walou";
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
                    case "suppressionCompte":
                        break;
                    default:
                        throw new Exception("Veuillez transmettre la bonne rubrique !!");
                }
            }
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
            if (isset($_POST['submit'])) {
                $blogController->ajoutBlog($_POST['user'], $_POST['titre'], $_POST['contenu'], $_POST['date_time_publication']);
            }
            break;
        default:
            throw new Exception("La page n'existe pas");
    }
} catch (Exception $e) {
    $visiteurController->pageErreur($e->getMessage());
}
