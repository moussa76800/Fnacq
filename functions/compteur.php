<?php

function ajouter_vue(): void
{
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'compteur';
    $fichier_journalier=$fichier.'-'. date('y-m-d');
    incrementer_compteur($fichier);
    incrementer_compteur($fichier_journalier);
    
}

function incrementer_compteur(string $fichier):void {
    $compteur = 1;

    if (file_exists($fichier)) {
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
}

file_put_contents($fichier,$compteur);
} 
function nb_vues() {
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'compteur';
    return file_get_contents($fichier);
}

