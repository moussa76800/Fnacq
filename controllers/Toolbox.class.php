<?php
class Toolbox
{
    const COULEUR_ROUGE = "alert-danger";
    const COULEUR_ORANGE = "alert-warning";
    const COULEUR_VERTE = "alert-success";

    public static function ajouterMessageAlerte($message, $type)
    {
        $_SESSION['alert'][] = [
            "message" => $message,
            "type" => $type
        ];
    }
}
