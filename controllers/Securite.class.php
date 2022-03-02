<?php


class Securite
{

    public static function secureHTML($chaine)
    {
        return htmlentities($chaine);
    }



    public static function estConnecte()
    {
        return (!empty($_SESSION['profil']));
    }

    public static function estUtilisateur()
    {
        return (!empty($_SESSION['profil']['role']==="utilisateur"));
    }

    public static function estAdministrateur()
    {
        return (!empty($_SESSION['profil']['role']==="administrateur"));
    }

    public static function utilisateurIndesirable()
    {
        return ($_SESSION['profil']['role']==="utilisateur_Indesirable" &&  $_SESSION['profil']['est_valide']==="0");
        
    }

}
