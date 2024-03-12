<?php
namespace Controller;
use Model\Connect;

class HomeController {
    
    public function home() {
        $pdo = Connect::seConnecter();
        $requeteDernierFilm = $pdo->prepare("
        SELECT * 
        FROM film 
        ORDER BY anneeSortie DESC
        LIMIT 1
        ");
        

        $requeteAncienFilm = $pdo->prepare("
        SELECT * 
        FROM film 
        ORDER BY anneeSortie ASC
        LIMIT 3
        "); // renvoie potentiellement plusieurs lignes
        

        $requeteFilmPopulaire = $pdo->prepare("
        SELECT * 
        FROM film 
        ORDER BY note DESC 
        LIMIT 3
        ");
        

        $requeteActeur = $pdo->prepare("
        SELECT * 
        FROM acteur 
        INNER JOIN personne ON acteur.Id_personne = personne.Id_personne
        ");
        

        $requeteRealisateur = $pdo->prepare("
        SELECT * 
        FROM realisateur 
        INNER JOIN personne ON realisateur.Id_personne = personne.Id_personne
        ");
        
        require "view/home.php";
    }
}