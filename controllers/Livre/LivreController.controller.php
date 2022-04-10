<?php

require_once "./controllers/MainController.controller.php";
require_once "./models/Livre/LivreManager.model.php";


class LivreController extends MainController
{

    private $livreManager;
    


    public function __construct()
    {
        $this->livreManager = new LivreManager();
        $this->livreManager ->chargementLivres();
    }


    public function afficherLivres()
    {
        $livres = $this->livreManager->getLivres();
        $data_page = [
            "page_description" => "La liste des livres",
            "page_title" => "La liste des livres",
            "livres"=>$livres,
            "view" => "views/Livre/livre.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    // panier
    public function addPanierLivre($id)
    {
        return $this->livreManager->getLivreById($id);
    }
    // panier

    public function afficherUnLivre($id)
    {
        $livre = $this->livreManager->getLivreById($id);
        $data_page = [
            "page_description" => "Affichage du livre",
            "page_title" => "Affichage du livre",
            "livre"=>$livre,
            "view" => "views/Livre/afficherUnLivre.view.php",
            "template" => "views/common.dashboard/templateDash.php"
        ];
        $this->genererPage($data_page);
    }
    
    public function buyLivre($id){
        $livree = $this->livreManager->getLivreById($id);
        $data_page = [
            "page_description" => "Panier",
            "page_title" => "Panier",
            "livree"=>$livree,
            "view" => "views/Livre/addPanierLivre.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    

    public function ajoutLivre()
    {
        $data_page = [
            "page_description" => "Ajout d'un livre",
            "page_title" => "Ajout d'un livre",
            "view" => "views/Livre/ajoutLivre.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
       
    


    public function ajoutLivreValidation()
    {

        $file = $_FILES['image'];
        $repertoire = "public/Assets/images/livres/";
        $nomImageAjoute = $this->ajoutImage($file, $repertoire);
        $this->livreManager->ajoutLivreBd($_POST['title'], $_POST['author'], $_POST['numbersOfPages'], $_POST['price'], $nomImageAjoute);
        header('Location: ' . URL . "administration/articles");
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
        $nomImage = $this->livreManager->getLivreById($id)->getImage();
        unlink("public/Assets/images/livres/" . $nomImage);
        $this->livreManager->suppressionLivreBD($id);

        
        header('Location: ' . URL . "administration/articles");
    }



    public function modificationLivre($id)
    {
        $livre = $this->livreManager->getLivreById($id);
        $data_page = [
            "page_description" => "Ajout d'un livre",
            "page_title" => "Ajout d'un livre",
            "livre"=>$livre,
            "view" => "views/Livre/modifierLivre.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    

    public function modifLivreValidation()
    {
        $imageActuelle = $this->livreManager->getLivreById($_POST['identifiant'])->getImage();
        $file = $_FILES['image'];

        if ($file['size'] > 0) {

            unlink("public/Assets/images/livres/".$imageActuelle);
            $repertoire = "public/Assets/images/livres/";
            $nomImageAjoute = $this->ajoutImage($file, $repertoire);
        } else {
            $nomImageAjoute = $imageActuelle;
        }
        $this->livreManager->modificationLivreBD($_POST['identifiant'],$_POST['title'],$_POST['author'],$_POST['numbersOfPages'],$_POST['price'],$nomImageAjoute);
        
        header('Location: '. URL . "administration/articles");
    }
}
