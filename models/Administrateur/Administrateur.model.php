<?php 
require_once("./models/MainManager.model.php");
<<<<<<< HEAD

class AdministrateurManager extends MainManager{
    
=======
require_once "./models/Livre/Livre.class.php";

class AdministrateurManager extends MainManager{
  
    private $livres;

>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
    public function getUtilisateurs(){
        $req = $this->getBdd()->prepare("SELECT * FROM utilisateur");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

<<<<<<< HEAD
=======
   

>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
    public function bdModificationRoleUser($login,$role,$est_valide){
        $req = "UPDATE utilisateur set role = :role,est_valide=:est_valide WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $stmt->bindValue(":role",$role,PDO::PARAM_STR);
        $stmt->bindValue(":est_valide",$est_valide,PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }


<<<<<<< HEAD
public function getCommentForUser($author){
    
   $req ="SELECT `author`, `comment`, `created_at` FROM `comments` WHERE author=:author Limit 0,5 ";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":author", $author, PDO::PARAM_STR);
=======
public function showProfilUser($login){
    
   $req ="SELECT `email`, `image`, `nom` , `prenom`, `adresse`, `code_postal`, `date_de_naissance` FROM `utilisateur` WHERE login=:login ";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
    $stmt->execute();
    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultat; 
    
}
<<<<<<< HEAD
=======
public function getCommentForUser($author){
    
    $req ="SELECT `author`, `comment`, `created_at` FROM `comments` WHERE author=:author Limit 0,5 ";
     $stmt = $this->getBdd()->prepare($req);
     $stmt->bindValue(":author", $author, PDO::PARAM_STR);
     $stmt->execute();
     $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $stmt->closeCursor();
     return $resultat; 
     
 }
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69

public function getUtilisateurByLogin($login){
    $req = $this->getBdd()->prepare("SELECT * FROM `utilisateur` WHERE `login`= '$login'");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
}

<<<<<<< HEAD
=======

public function getLivres()
    {
        return $this->livres;
    }

    public function chargementLivres()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM livres");
        $req->execute();
        $meslivres = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();


        foreach ($meslivres as $livre) {
            $livres = new Livre($livre['id'], $livre['title'], $livre['authors'], $livre['numbersOfPages'], $livre['price'], $livre['image']);
            $this->ajoutLivre($livres);
        }
    }

    public function getLivreById($id)
    {
        for ($i = 0; $i < count($this->livres); $i++) {
            if ($this->livres[$i]->getId() === $id) {
                return $this->livres[$i];
            }
        }
    }
public function ajoutLivre($livre)
{
    $this->livres[] = $livre;
}
public function ajoutLivreBd($title, $authors, $numbersOfPages, $price, $image)
    {
        $req = "INSERT INTO livres (title,authors,numbersOfPages,price,image)
                values (:title, :author, :numbersOfPages, :price, :image)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":title", $title, PDO::PARAM_STR);
        $stmt->bindValue(":author", $authors, PDO::PARAM_STR);
        $stmt->bindValue(":numbersOfPages", $numbersOfPages, PDO::PARAM_INT);
        $stmt->bindValue(":price", $price, PDO::PARAM_INT);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $livre = new Livre($this->getBdd()->lastInsertId(), $title, $authors, $numbersOfPages, $price, $image);
            $this->ajoutLivre($livre);
        }
    }
    

>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
}

   



   


    
