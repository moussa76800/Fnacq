<?php
require_once  "./models/MainManager.model.php";
require_once "Livre.class.php";

class LivreManager extends MainManager
{


    private $livres; // TABLEAU DE LIVRE


    public function ajoutLivre($livre)
    {
        $this->livres[] = $livre;
    }

    public function chargementLivres()
    {
        $req = $this->getBdd()->prepare("SELECT*FROM livres");
        $req->execute();
        $meslivres = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($meslivres as $livre) {
            $liste = new Livre($livre['id'], $livre['title'], $livre['authors'], $livre['numbersOfPages'], $livre['price'], $livre['image']);
            $this->ajoutLivre($liste);
        }
    }

    public function getLivreById($id)
    {

        $req = "SELECT title FROM livres WHERE id= :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['id'];
    }
}
