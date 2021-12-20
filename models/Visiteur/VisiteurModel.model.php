<?php
require_once  "./models/MainManager.model.php";


class VisiteurManager extends MainManager
{

    public function getUtilisateurs()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM utilisateur");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    public function verifLoginDisponible($login)
    {

        $req = "SELECT * FROM utilisateur WHERE login=:login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return empty($resultat);
    }

    public function InscriptionBD($login, $passwordCrypte, $email, $clef,$nom,$prenom,$adresse,$code_postal,$date_de_naissance)
    {

        $req = "INSERT INTO utilisateur (login,password,email,role,image,est_valide,clef,nom,prenom,adresse,code_postal,date_de_naissance)
 VALUES (:login,:password,:email,'utilisateur','', 0,:clef,:nom,:prenom,:adresse,:code_postal,:date_de_naissance)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":password", $passwordCrypte, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":clef", $clef, PDO::PARAM_INT);
        $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $stmt->bindValue(":adresse", $adresse, PDO::PARAM_STR);
        $stmt->bindValue(":code_postal", $code_postal, PDO::PARAM_INT);
        $stmt->bindValue(":date_de_naissance", $date_de_naissance, PDO::PARAM_INT);
        $stmt->execute();
        $estModifier = ($stmt -> rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }
    public function getUserInformation($login)
    {
        $req = "SELECT * FROM utilisateur WHERE login=:login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }
}
