<?php

require_once "./controllers/MainController.controller.php";
require_once "./models/Hifi/HifiManager.model.php";


class HifiController extends MainController
{

    private $hifiManager;


    public function __construct()
    {
        $this->hifiManager = new HifiManager();
    }
    
    public function afficherHifi()
    {
        $data_page = [
            "page_description" => "La page du materiels hifi",
            "page_title" => "La page du materiels hifi",
            "view" => "views/Materiel-Hifi/hifi.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
}