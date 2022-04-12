<?php
require_once("models/MainManager.model.php");
require_once("controllers/Toolbox.class.php");

abstract class MainController
{
    private $mainManager;

    // public function __construct(){
    //     $this->mainManager = new MainManager();
    // }

    protected function genererPage($data)
    {
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }

<<<<<<< HEAD
=======
    protected function genererPageDashboard($data)
    {
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once("./views/common.dashboard/templateDash.php");
    }

>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69


    protected function pageErreur($msg)
    {
        $data_page = [
            "page_description" => "Page permettant de gérer les erreurs",
            "page_title" => "Page d'erreur",
            "msg" => $msg,
            "view" => "./views/erreur.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
}
