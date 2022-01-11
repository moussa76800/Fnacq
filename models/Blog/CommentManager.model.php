<?php
require_once  "./models/MainManager.model.php";
require_once "Comment.class.php";



class CommentManager extends MainManager
{

    private $comments;

    public function chargementComments()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM comments ");
        $req->execute();
        $mesComments = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($mesComments as $comment) {
            $comments = new Comment($comment['id'], $comment['articleId'], $comment['author'], $comment['comment'], $comment['created_at']);
            $this->ajoutComment($comments);
        }
    }

    public function ajoutComment($comment)
    {
        $this->comments[] = $comment;
    }



    public function getComment($id)
    {
        $comment = $this->comments;
        for ($i = 0; $i < count($comment); $i++) {
            if ($comment[$i]->getArticleId() === $id) {
                $commentId[] = $comment[$i];
            }
        }
        if (isset($commentId)) {
            return $commentId;
        } else {
            return null;
        }
    }

    //  public function getCommentById($id)
    //  {
    //      for ($i = 0; $i < count($this->comments); $i++) {
    //          if ($this->comments[$i]->getArticleId() === $id) {
    //              return $this->comments[$i];
    //          }
    //      }
    //  }
    public function preview($id)
    {
        if ($this->blogManager->getCommentById($id)) {
        }
    }



    public function ajoutCommentBd($author, $comment, $idPost)
    {

        $req = "INSERT INTO `comments`(`articleId`, `author`, `comment`, `created_at`)
    VALUES ( :articleId, :author, :comment, NOW() )";
        $stmt = $this->getBdd()->prepare($req);

        $stmt->bindValue(":articleId", $idPost, PDO::PARAM_INT);
        $stmt->bindValue(":author", $author, PDO::PARAM_STR);
        $stmt->bindValue(":comment", $comment, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $comment = new Comment($this->getBdd()->lastInsertId(), $idPost, $author, $comment, localtime());
            $this->ajoutComment($comment);
        }
    }
}
