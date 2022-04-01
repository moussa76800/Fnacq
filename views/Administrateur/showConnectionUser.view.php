<?php
require_once ("./functions/compteur.php");

function ajouter_vue(): void
{
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'compteur';
    $fichier_journalier = $fichier . '-' . date('y-m-d');
    incrementer_compteur($fichier);
    incrementer_compteur($fichier_journalier);
}

function incrementer_compteur(string $fichier,string $fichier_journalier): void
{
    $compteur = 1;

    if (file_exists($fichier) && file_exists($fichier_journalier) ) {
        $compteur = (int)file_get_contents($fichier,$fichier_journalier);
        $compteur++;
    }
    file_put_contents($fichier, $fichier_journalier,$compteur);
}

function nb_vues()
{
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'compteur';
        return file_get_contents($fichier);
}
function nb_vuesDate()
{
    $fichier_journalier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'compteur';
        return file_get_contents($fichier_journalier);
}