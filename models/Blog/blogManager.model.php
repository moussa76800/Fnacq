
<?php
require_once  "./models/MainManager.model.php";
require_once "blog.class.php";



class blogManager extends MainManager
{

    private $posts;

    public function chargementBlogs()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM posts ");
        $req->execute();
        $mesPosts = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($mesPosts as $post) {
            $mesPosts = new Blog($post['id'],  $post['title'],$post['author'], $post['content'], $post['image'],$post['created_at']);
            $this->ajoutPost($mesPosts);
        }
    }

    public function ajoutPost($post)
    {
        $this->posts[] = $post;
    }


    public function getPosts()
    {
        return $this->posts;
    }


    public function getPostById($id)
    {
        for ($i = 0; $i < count($this->posts); $i++) {
            if ($this->posts[$i]->getId() === $id) {
                return $this->posts[$i];
            }
        }
    }

    public function ajoutPostBd( $id,$title,$author,$content,$image,$created_at)
    {
       
        $req = "INSERT INTO posts (id,author,title,content,image,created_at)
    values (:id,:author,:title,:content,:image,:created_at )";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":author", $author, PDO::PARAM_STR);
        $stmt->bindValue(":title", $title, PDO::PARAM_STR);
        $stmt->bindValue(":content", $content, PDO::PARAM_STR);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $stmt->bindValue(":created_at", $created_at, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $post = new Blog($this->getBdd()->lastInsertId(), $title, $author,$content,$image,$created_at);
            $this->ajoutPost($post);
        }
    
    }


    public function  suppressionPostBd($id)
    {

        $req = " Delete from posts where id = :idPost ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idPost", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $livre = $this->getPostById($id);
            unset($livre);
        }
    }

    public function modificationPostBD( $id,$author,$title,$content,$image,$created_at)
    {
        $req = 'update posts 
    title = :title, author = :author, content = content, image = :image, created_at = :created_at 
    where id = :id';

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":title", $title, PDO::PARAM_STR);
        $stmt->bindValue(":author", $author, PDO::PARAM_STR);
        $stmt->bindValue(":content", $content, PDO::PARAM_STR);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $stmt->bindValue(":created_at", $created_at, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0) {
            $this->getPostById($id)->setTitle($title);
            $this->getPostById($id)->setAuthor($author);
            $this->getPostById($id)->setContent($content);
            $this->getPostById($id)->setImage($image);
            $this->getPostById($id)->setCreated_at($created_at);
           
        }
    }

}


