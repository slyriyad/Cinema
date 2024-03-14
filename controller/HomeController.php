<?php
namespace Controller;
use Model\Connect;

class HomeController {
    
    public function home() {
        $pdo = Connect::seConnecter();
        $requeteDernierFilm = $pdo->query("
        SELECT * 
        FROM film 
        ORDER BY anneeSortie DESC
        LIMIT 1
        ");
        

        $requeteAncienFilm = $pdo->query("
        SELECT * 
        FROM film 
        ORDER BY anneeSortie ASC
        LIMIT 3
        "); // renvoie potentiellement plusieurs lignes
        

        $requeteFilmPopulaire = $pdo->query("
        SELECT * 
        FROM film 
        ORDER BY note DESC 
        LIMIT 5
        ");
        

        $requeteActeur = $pdo->query("
        SELECT * 
        FROM acteur 
        INNER JOIN personne ON acteur.Id_personne = personne.Id_personne
        LIMIT 3
        ");
        

        $requeteRealisateur = $pdo->query("
        SELECT * 
        FROM realisateur 
        INNER JOIN personne ON realisateur.Id_personne = personne.Id_personne
        LIMIT 3
        ");
        
        require "view/home.php";
    }
}