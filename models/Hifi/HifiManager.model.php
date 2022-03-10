<?php
require_once  "./models/MainManager.model.php";


class HifiManager extends MainManager{

    public function getHifi()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM hifi");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }


}