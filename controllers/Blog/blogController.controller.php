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
    
        $data_page = [
            "page_description" => "Page du Blog",
            "page_title" => "Page du Blog",
            "view" => "views/Blog/blog.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
    
    public function ajoutBlog($user,$message)
    {
        $this->tchatManager->ajoutTchatdb($user,$message);
    }
   
}