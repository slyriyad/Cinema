<?php
namespace Controller;
use Model\Connect;

class CinemaController {

    // lister les films
    public function listFilms() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT titre, anneeSortie
        FROM film
        ");

        require "view/listFilms.php";
    }
}