<?php
require_once  "./models/MainManager.model.php";


class InformatiqueManager extends MainManager{

    public function getInformatique()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM informatique");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }


}