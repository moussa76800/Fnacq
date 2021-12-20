
<?php
require_once  "./models/MainManager.model.php";


class blogManager extends MainManager
{



    public function ajoutBlogdb($user, $titre, $contenu)
    {

        $req = "INSERT INTO tchat (user,message,contenu,date_time_publication)
    values (:user, :message,:contenu,:now )";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user", $user, PDO::PARAM_STR);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":contenu", $contenu, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        return $resultat;
    }

    public function chargementBlogs()
    {
        $req = $this->getBdd()->prepare("SELECT*FROM blog ");
        $req->execute();
        $mesBlogs = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $mesBlogs;
    }
}
