<?php
require_once "./models/Blog/CommentManager.model.php ";
require_once "./controllers/MainController.controller.php";

class CommentController extends MainController
{

    private $commentManager;



    public function __construct()
    {
        $this->commentManager = new CommentManager();
        $this->commentManager->chargementComments();
    }

    public function afficherComment($id)
    {
        return $this->commentManager->getComment($id);
    }



    public function ajoutCommentValidation($author,$comment,$idPost)
    {
        
        $this->commentManager->ajoutCommentBd($author,$comment,$idPost);
    }
}