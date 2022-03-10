<?php

require_once "./controllers/MainController.controller.php";
require_once "./models/Informatique/InformatiqueManager.model.php";


class InformatiqueController extends MainController
{

    private $informatiqueManager;


    public function __construct()
    {
        $this->informatiqueManager = new InformatiqueManager();
    }


    
    public function afficherInformatique()
    {
        $data_page = [
            "page_description" => "La page du materiels informatiques",
            "page_title" => "La page du materiels informatiques",
            "view" => "views/Materiel Informatique/informatique.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
}