<?php

require_once  "./models/MainManager.model.php";
require_once "Tchat.class.php";

class TchatManager extends MainManager
{
    private $tchats; // TABLEAU DE chats

    public function ajoutTchat($tchat)
    {
        $this->tchats[] = $tchat;
    }

    public function getTchats()
    {
        return $this->tchats;
    }
    public function chargementTchats()
    {
        $req = $this->getBdd()->prepare("SELECT*FROM tchat ORDER BY id DESC LIMIT 10 ");
        $req->execute();
        $mesTchats = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($mesTchats as $tchat) {
            $liste = new Tchat($tchat['id'], $tchat['user'], $tchat['message']);
            $this->ajoutTchat($liste);
        }
    }
    

    public function ajoutTchatdb($user, $message)
    {
        $req = "INSERT INTO tchat (user,message)
                values (:user, :message )";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user", $user, PDO::PARAM_STR);
        $stmt->bindValue(":message", $message, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $tchat = new Tchat($this->getBdd()->lastInsertId(), $user, $message);
            $this->ajoutTchat($tchat);
        }
    }


}