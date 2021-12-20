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

    public static function sendMail($destinataire, $sujet, $message)
    {
        $headers = "From: moussa76b@gmail.com";
        if (mail($destinataire, $sujet, $message,$headers)) {
            self::ajouterMessageAlerte("email bien envoyé !!", self::COULEUR_VERTE);
        } else {
            self::ajouterMessageAlerte("echec de l'envoie de l'email !!!", self::COULEUR_ROUGE);
        }
    }
}
