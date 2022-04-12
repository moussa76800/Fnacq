<?php
require_once  "./models/MainManager.model.php";
<<<<<<< HEAD


class HifiManager extends MainManager{

    public function getHifi()
=======
require_once "Hifi.class.php";

class HifiManager extends MainManager{

    /* public function getHifi()
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
    {
        $req = $this->getBdd()->prepare("SELECT * FROM hifi");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
<<<<<<< HEAD
    }


}
=======
    } */
    
        private $hifis; // TABLEAU DE Hifi
    
    
        public function ajoutHifi($hifi)
        {
            $this->hifis[] = $hifi;
        }
    
    
        public function getHifi()
        {
            return $this->hifis;
        }
    
    
    
        public function chargementHifi()
        {
            $req = $this->getBdd()->prepare("SELECT * FROM hifi");
            $req->execute();
            $meshifis = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
    
    
            foreach ($meshifis as $hifi) {
                $hifis = new Hifi($hifi['id'], $hifi['article'], $hifi['marque'], $hifi['price'], $hifi['image']);
                $this->ajoutHifi($hifis);
            }
        }
    
    
        public function getHifiById($id)
        {
            for ($i = 0; $i < count($this->hifis); $i++) {
                if ($this->hifis[$i]->getId() === $id) {
                    return $this->hifis[$i];
                }
            }
        }
    
        public function ajoutLivreBd( $article, $marque, $price, $image)
        {
            $req = "INSERT INTO hifi (article,marque,price,image)
                    values (:article, :marque, :price, :image)";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(":article", $article, PDO::PARAM_STR);
            $stmt->bindValue(":marque", $marque, PDO::PARAM_STR);
            $stmt->bindValue(":price", $price, PDO::PARAM_INT);
            $stmt->bindValue(":image", $image, PDO::PARAM_STR);
            $resultat = $stmt->execute();
            $stmt->closeCursor();
    
            if ($resultat > 0) {
                $hifi = new Hifi($this->getBdd()->lastInsertId(), $article, $marque, $price, $image);
                $this->ajoutHifi($hifi);
            }
        }
    
        public function  suppressionLivreBD($id)
        {
    
            $req = " Delete from hifi where id = :idhifi ";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(":idhifi", $id, PDO::PARAM_INT);
            $resultat = $stmt->execute();
            $stmt->closeCursor();
    
            if ($resultat > 0) {
                $livre = $this->getHifiById($id);
                unset($hifi);
            }
        }
    
        public function modificationLivreBD($id, $article, $marque, $price, $image)
        {
            $req = 'update hifi
        SET article = :article, marque = :marque, price = :price, image = :image 
        WHERE id = :id';
    
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->bindValue(":article", $article, PDO::PARAM_STR);
            $stmt->bindValue(":marque", $marque, PDO::PARAM_STR);
            $stmt->bindValue(":price", $price, PDO::PARAM_INT);
            $stmt->bindValue(":image", $image, PDO::PARAM_STR);
            $resultat = $stmt->execute();
            $stmt->closeCursor();
    
            if($resultat > 0) {
                $this->getHifiById($id)->setArticle($article);
                $this->getHifiById($id)->setMarque($marque);
                $this->getHifiById($id)->setPrice($price);
                $this->getHifiById($id)->setImage($image);
               
            }
        }
    
    }
    
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
