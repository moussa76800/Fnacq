<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Administrateur/Administrateur.model.php");
<<<<<<< HEAD
=======
require_once("./models/Livre/LivreManager.model.php");
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69

class AdministrateurController extends MainController
{
    private $administrateurManager;
<<<<<<< HEAD
=======
    private $livreManager;
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69

    public function __construct()
    {
        $this->administrateurManager = new AdministrateurManager();
<<<<<<< HEAD
=======
        $this->livreManager=new LivreManager();
        $this->livreManager ->chargementLivres();
        $this->blogManager=new BlogManager();
        $this->blogManager ->chargementBlogs();
    }

    public function accueilDash()
    {

        $data_page = [
            "page_description" => "Gestion des droits",
            "page_title" => "Gestion des droits",
            "view" => "views/Administrateur/accueilDash.view.php",
            "template" => "views/common.dashboard/templateDash.php"
        ];
        $this-> genererPageDashboard($data_page);
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
    }

    public function droits()
    {
        $utilisateurs = $this->administrateurManager->getUtilisateurs();

        $data_page = [
            "page_description" => "Gestion des droits",
            "page_title" => "Gestion des droits",
            "utilisateurs" => $utilisateurs,
            "view" => "views/Administrateur/droits.view.php",
<<<<<<< HEAD
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
=======
            "template" => "views/common.dashboard/templateDash.php"
        ];
        $this-> genererPageDashboard($data_page);
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
    }

    public function validation_modificationRole($login, $role, $est_valide)
    {
        if ($this->administrateurManager->bdModificationRoleUser($login, $role, $est_valide)) {
            Toolbox::ajouterMessageAlerte("La modification a été prise en compte", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::ajouterMessageAlerte("La modification n'a pas été prise en compte", Toolbox::COULEUR_ROUGE);
        }
        header("Location: " . URL . "administration/droits");
    }

    

<<<<<<< HEAD
    public function showProfilUser($login)
    {
=======
    public function showProfilUser($login){   
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
        $utilisateurs = $this->administrateurManager->getUtilisateurByLogin($login);
                
        $data_page = [
            "page_description" => "Comments for One person",
            "page_title" => "Comments for One person",
            "utilisateur" =>$utilisateurs, 
            "view" => "views/Administrateur/showProfilUser.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
<<<<<<< HEAD

    public function showCommentUser($author)
    { 
        $comments = $this->administrateurManager->getCommentForUser($author);
        
=======
    public function showCommentUser($author)
    { 
        $comments = $this->administrateurManager->getCommentForUser($author);
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
        var_dump($comments);
    
        $data_page = [
            "page_description" => "Comments for One person",
            "page_title" => "Comments for One person",
            "comments" =>$comments, 
            "view" => "views/Administrateur/showCommentUser.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function showConnexionUser($author)
<<<<<<< HEAD
    
    { 
       
=======
    {  
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
        $data_page = [
            "page_description" => "Comments for One person",
            "page_title" => "Comments for One person",
            "view" => "views/Administrateur/showConnexionUser .view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
<<<<<<< HEAD
    

=======

    public function afficherLivres()
    {
        $livres = $this->administrateurManager->getLivres();
        $data_page = [
            "page_description" => "La liste des livres",
            "page_title" => "La liste des livres",
            "livres"=>$livres,
            "view" => "views/Administrateur/livres.view.php",
            "template" => "views/common.dashboard/templateDash.php"
        ];
        $this->genererPageDashboard($data_page);
    }

    public function afficherUnLivre($id)
    {
        $livre = $this->administrateurManager->getLivreById($id);
        $data_page = [
            "page_description" => "Affichage du livre",
            "page_title" => "Affichage du livre",
            "livre"=>$livre,
            "view" => "views/Administrateur/afficherUnLivre.view.php",
            "template" => "views/common.dashboard/templateDash.php"
        ];
        $this->genererPageDashboard($data_page);
    }
    

    public function ajoutLivre()
    {
        $data_page = [
            "page_description" => "Ajout d'un livre",
            "page_title" => "Ajout d'un livre",
            "view" => "views/Administrateur/ajoutLivre.view.php",
            "template" => "views/common.dashboard/templateDash.php"
        ];
        $this->genererPageDashboard($data_page);
    }
       
    


    public function ajoutLivreValidation()
    {

        $file = $_FILES['image'];
        $repertoire = "public/Assets/images/livres/";
        $nomImageAjoute = $this->ajoutImage($file, $repertoire);
        $this->livreManager->ajoutLivreBd($_POST['title'], $_POST['author'], $_POST['numbersOfPages'], $_POST['price'], $nomImageAjoute);

       

        header('Location: ' . URL . "administration/livres");
    }


    private function ajoutImage($file, $dir)
    {
        if (!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");

        if (!file_exists($dir)) mkdir($dir, 0777);

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $random = rand(0, 99999);
        $target_file = $dir . $random . "_" . $file['name'];

        if (!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if (file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if ($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if (!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random . "_" . $file['name']);
    }


    
    public function suppressionLivre($id)
    {
        $nomImage = $this->administrateurManager->getLivreById($id)->getImage();
        unlink("public/Assets/images/livres/" . $nomImage);
        $this->livreManager->suppressionLivreBD($id);

        
        header('Location: ' . URL .  "administration/livres");
    }



    public function modificationLivre($id)
    {
        $livre = $this->administrateurManager->getLivreById($id);
        $data_page = [
            "page_description" => "Ajout d'un livre",
            "page_title" => "Ajout d'un livre",
            "livre"=>$livre,
            "view" => "views/Administrateur/modifierLivre.view.php",
            "template" => "views/common.dashboard/templateDash.php"
        ];
        $this-> genererPageDashboard($data_page);
    }

    

    public function modifLivreValidation()
    {
        $imageActuelle = $this->administrateurManager->getLivreById($_POST['identifiant'])->getImage();
        $file = $_FILES['image'];

        if ($file['size'] > 0) {

            unlink("public/Assets/images/livres/".$imageActuelle);
            $repertoire = "public/Assets/images/livres/";
            $nomImageAjoute = $this->ajoutImage($file, $repertoire);
        } else {
            $nomImageAjoute = $imageActuelle;
        }
        $this->livreManager->modificationLivreBD($_POST['identifiant'],$_POST['title'],$_POST['author'],$_POST['numbersOfPages'],$_POST['price'],$nomImageAjoute);
        
        header('Location: '. URL .  "administration/livres");
    }
    public function afficherBlogDash()
    {
        $posts = $this->blogManager->getPosts();
        $data_page = [
            "page_description" => "Page du Blog",
            "page_title" => "Page du Blog",
            "posts" => $posts,
            "view" => "views/Administrateur/blogDash.view.php",
            "template" => "views/common.dashboard/templateDash.php"
        ];
        $this->genererPageDashboard($data_page);
    }

>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69

    public function pageErreur($msg)
    {
        parent::pageErreur($msg);
    }
}
