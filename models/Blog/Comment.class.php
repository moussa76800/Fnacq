<?php
class Comment {

    private $id;
    private $articleId;
    private $author;
    private $comment;
    private $created_at;

   

    public function __construct($id, $articleId, $author, $comment,$date){
    
        $this->id = $id;
        $this->articleId = $articleId;
        $this->author = $author;
        $this->comment = $comment;
        $this->created_at = $date;
       
    }

    public function getId() { return $this->id;}
    public function setId($id) { $this->id=$id;}
     
    public function getArticleId() { return $this->articleId;}
    public function setArticleId($articleId) { $this->articleId=$articleId;}

    public function getAuthor() { return $this->author;}
    public function setAuthor($author) { $this->author=$author;}

    public function getComment() { return $this->comment;}
    public function setComment($comment) { $this->comment=$comment;}

    public function getCreated_at() { return $this->created_at;}
    public function setCreated_at($created_at) { $this->created_at=$created_at;}

    
}