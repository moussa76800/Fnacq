<?php  
require_once "models/Tchat/TchatManager.class.php";
require_once "./controllers/MainController.controller.php";

class TchatsControllers extends MainController
{
    private $tchatManager;



    public function __construct()
    {
        $this->tchatManager = new TchatManager;
        $this->tchatManager->chargementTchats();
    }


    public function afficherTchat()
    {
        

        $data_page = [
            "page_description" => "Page du mini-tchat",
            "page_title" => "Page du mini-tchat",
            "tchats"=> $this->tchatManager->getTchats(),
            "view" => "views/Tchat/tchat.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
    
    public function ajoutTchat($user,$message)
    {
        $this->tchatManager->ajoutTchatdb($user,$message);
    }
   
}