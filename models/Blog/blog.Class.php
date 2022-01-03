<?php
class Blog {

    private $id;
    private $title;
    private $author;
    private $content;
    private $image;
    private $created_at;

   

    public function __construct($id, $title, $author, $content, $image,$created_at){
    
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->content = $content;
        $this->created_at = $created_at;
        $this->image = $image;
        
    }

    public function getId() { return $this->id;}
    public function setId($id) { $this->id=$id;}
     
    public function getTitle() { return $this->title;}
    public function setTitle($title) { $this->title=$title;}

    public function getAuthor() { return $this->author;}
    public function setAuthor($author) { $this->author=$author;}

    public function getContent() { return $this->content;}
    public function setContent($content) { $this->content=$content;}

    public function getCreated_at() { return $this->created_at;}
    public function setCreated_at($created_at) { $this->created_at=$created_at;}
    

    public function getImage() { return $this->image;}
    public function setImage($image) { $this->image=$image;}
    
}