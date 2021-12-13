<?php
class Livre {

    private $id;
    private $title;
    private $authors;
    private $numbersOfPages;
    private $price;
    private $image;

    public static $livres;

    public function __construct($id, $title, $authors, $numbersOfPages,$price, $image){
    
        $this->id = $id;
        $this->title = $title;
        $this->authors = $authors;
        $this->numbersOfPages = $numbersOfPages;
        $this->price = $price;
        $this->image = $image;
        
    }

    public function getId() { return $this->id;}
    public function setId($id) { $this->id=$id;}
     
    public function getTitle() { return $this->title;}
    public function setTitle($title) { $this->title=$title;}

    public function getAuthors() { return $this->authors;}
    public function setAuthors($authors) { $this->authors=$authors;}

    public function getNumbersOfPages() { return $this->numbersOfPages;}
    public function setNumbersOfPages($numbersOfPages) { $this->numbersOfPages=$numbersOfPages;}

    public function getPrice() { return $this->price;}
    public function setPrice($price) { $this->price=$price;}
    

    public function getImage() { return $this->image;}
    public function setImage($image) { $this->image=$image;}
    
}
