<?php 
require_once("./models/MainManager.model.php");

class AdministrateurManager extends MainManager{
    
    public function getUtilisateurs(){
        $req = $this->getBdd()->prepare("SELECT * FROM utilisateur");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

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


public function getCommentForUser($author){
    
   $req ="SELECT `author`, `comment`, `created_at` FROM `comments` WHERE author=:author Limit 0,5 ";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":author", $author, PDO::PARAM_STR);
    $stmt->execute();
    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultat; 
    
}

public function getUtilisateurByLogin($login){
    $req = $this->getBdd()->prepare("SELECT * FROM `utilisateur` WHERE `login`= '$login'");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
}

}

   



   


    
