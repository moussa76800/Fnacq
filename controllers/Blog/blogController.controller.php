<?php
require_once "models/Blog/blogManager.model.php";
require_once "./controllers/MainController.controller.php";

class BlogController extends MainController
{

    private $blogManager;



    public function __construct()
    {
        $this->blogManager = new BlogManager;
        $this->blogManager->chargementBlogs();
    }

    public function afficherBlog()
    {
        $posts = $this->blogManager->getPosts();
        $data_page = [
            "page_description" => "Page du Blog",
            "page_title" => "Page du Blog",
            "posts" => $posts,
            "view" => "views/Blog/blog.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function afficherUnPost($id)
    {
        $post = $this->blogManager->getPostById($id);
        $data_page = [
            "page_description" => "Affichage d'un article",
            "page_title" => "Affichage d'un article",
            "post"=>$post,
            "view" => "views/Blog/afficherUnPost.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function ajoutPosts($id, $author, $content, $image, $created_at)
    {
        $this->tchatManager->ajoutTchatdb($id, $author, $content, $image, $created_at);
    }


    public function ajoutPost()
    {
        $data_page = [
            "page_description" => "Ajout d'un article",
            "page_title" => "Ajout d'un article",
            "view" => "views/Blog/ajoutPost.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
       
    


     public function ajoutPostValidation()
    {

        $file = $_FILES['image'];
        $repertoire = "public/Assets/images/blog/";
        $nomImageAjoute = $this->ajoutImage($file, $repertoire);
        $this->blogManager->ajoutPostBd($_POST['id'],$_POST['author'],$_POST['title'], $_POST['content'], $_POST['created_at'], $nomImageAjoute);

        header('Location: ' . URL . "blog");
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


    
    public function suppressionPost($id)
    {
        $nomImage = $this->blogManager->getPostById($id)->getImage();
        unlink("public/Assets/images/blog/" . $nomImage);
        $this->blogManager->suppressionPostBD($id);

        
        header('Location: ' . URL . "blog");
    }



    public function modificationPost($id)
    {
        $post = $this->blogManager->getPostById($id);
        $data_page = [
            "page_description" => "Modification d'un article",
            "page_title" => "Modification d'un article",
            "post"=>$post,
            "view" => "views/Blog/modifierPost.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    
      


    public function modifPostValidation()
    {
        $imageActuelle = $this->blogManager->getPostById($_POST['identifiant'])->getImage();
        $file = $_FILES['image'];

        if ($file['size'] > 0) {

            unlink("public/Assets/images/blog/".$imageActuelle);
            $repertoire = "public/Assets/images/blog/";
            $nomImageAjoute = $this->ajoutImage($file, $repertoire);
        } else {
            $nomImageAjoute = $imageActuelle;
        }
        $this->blogManager->modificationPostBD($_POST['identifiant'],$_POST['author'],$_POST['title'],$_POST['content'],$_POST['created_at'],$nomImageAjoute);
        
        header('Location: '. URL . "blog");
    }
}


