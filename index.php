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


$visiteurController = new VisiteurController();
$utilisateurController = new UtilisateurController();
$livreController = new LivreController();
$informatiqueController = new InformatiqueController();
$hifiController = new HifiController();


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
            $livreController->afficherLivre();
            switch ($url[1]) {
                case "display":
            $livreController->afficherUnLivre($id);
                    break;
                case "modify":

                    break;
                case "validationModif":

                    break;
                case "add":

                    break;
                case "validationAjout":

                    break;
                case "delete":
                    break;

                default:
                    throw new Exception("Veuillez transmettre la bonne rubrique !!");
            }

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
                    default:
                        throw new Exception("Veuillez transmettre la bonne rubrique !!");
                }
            }
            break;
        default:
            throw new Exception("La page n'existe pas");
    }
} catch (Exception $e) {
    $visiteurController->pageErreur($e->getMessage());
}
