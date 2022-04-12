
<?php
require_once  "./models/MainManager.model.php";
require_once "Blog.class.php";



class BlogManager extends MainManager
{

    private $posts;

    public function chargementBlogs()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM posts ");
        $req->execute();
        $mesPosts = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($mesPosts as $post) {
            $posts = new Blog($post['id'],  $post['title'], $post['author'], $post['content'], $post['image'], $post['created_at']);
            $this->ajoutPost($posts);
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



<<<<<<< HEAD
    public function ajoutPostBd($title, $author, $content, $created_at, $image)
    {

        $req = "INSERT INTO posts (title,author,content,image,created_at)
    values (:title,:author,:content,:image,: NOW() )";
=======
    public function ajoutPostBd($title, $author, $content, $image, $created_at)
    {

        $req = "INSERT INTO posts (title,author,content,image,created_at)
    values (:title,:author,:content,:image,now() )";
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
        $stmt = $this->getBdd()->prepare($req);


        $stmt->bindValue(":title", $title, PDO::PARAM_STR);
        $stmt->bindValue(":author", $author, PDO::PARAM_STR);
        $stmt->bindValue(":content", $content, PDO::PARAM_STR);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
<<<<<<< HEAD
=======


>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
<<<<<<< HEAD
            $post = new Blog($this->getBdd()->lastInsertId(), $title, $author, $content, localtime(), $image);
=======
            $post = new Blog($this->getBdd()->lastInsertId(), $title, $author, $content,$image, localtime() );
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
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
            $post = $this->getPostById($id);
            unset($post);
        }
    }

<<<<<<< HEAD
    public function modificationPostBD($id, $author, $title, $content, $created_at, $image)
    {

        $req = 'update posts
        SET author = :author,title = :title, content = :content,created_at = :created_at,image = :image 
=======
    public function modificationPostBD($id, $author, $title, $content,$image, $created_at )
    {

        $req = 'update posts
        SET author = :author,title = :title, content = :content,image = :image,created_at = :created_at 
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
    where id = :id';

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":author", $author, PDO::PARAM_STR);
        $stmt->bindValue(":title", $title, PDO::PARAM_STR);
        $stmt->bindValue(":content", $content, PDO::PARAM_STR);
<<<<<<< HEAD
        $stmt->bindValue(":created_at", $created_at, PDO::PARAM_STR);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
=======
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $stmt->bindValue(":created_at", $created_at, PDO::PARAM_STR);
        
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $this->getPostById($id)->setTitle($title);
            $this->getPostById($id)->setAuthor($author);
            $this->getPostById($id)->setContent($content);
            $this->getPostById($id)->setImage($image);
            $this->getPostById($id)->setCreated_at($created_at);
        }
    }



<<<<<<< HEAD
     public function getPostByTitle($title)
    {
        for ($i = 0; $i < count($this->posts); $i++) {
            if ( strpos(strtolower($this->posts[$i]->getTitle()), strtolower($title)) !== false) {
=======
    public function getPostByTitle($title)
    {
        for ($i = 0; $i < count($this->posts); $i++) {
            if (strpos(strtolower($this->posts[$i]->getTitle()), strtolower($title)) !== false) {
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
                $ArrayPost[] = $this->posts[$i];
            }
        }
        if (isset($ArrayPost)) {
            return $ArrayPost;
<<<<<<< HEAD
        }else {
            return null;
        }
    } 
     /* public function findBlogDb($title)
=======
        } else {
            return null;
        }
    }
    /* public function findBlogDb($title)
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
    {

        $req =  "SELECT  `id`, `title`,`author`, `content`,`image`, `created_at` FROM `posts` WHERE `title` LIKE '%title%'";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":title", $title, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
           return  $resultat;
        }
    }  */
}
