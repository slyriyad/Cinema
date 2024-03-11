<?php
namespace Controller;
use Model\Connect;

class RealisateurController {
    // lister les Realisateurs
    public function listRealisateurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT *,DATE_FORMAT(personne.dateNaissance, '%d/%m/%Y') AS dateNaissance
        FROM realisateur
        INNER JOIN personne ON personne.id_personne = realisateur.Id_personne
        ORDER BY nom ASC
        ");

        require "view/listRealisateurs.php";
    }


    // detail les realisatuer
    public function detailRealisateur($id) {
        $pdo = Connect::seConnecter();
        $requeteRealisateur = $pdo->prepare("
            SELECT *,DATE_FORMAT(personne.dateNaissance, '%d/%m/%Y') AS dateNaissance
            FROM personne
            INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne 
            WHERE realisateur.Id_realisateur = :id
        ");
        $requeteRealisateur->execute(["id"=>$id]);

        $requeteFilm = $pdo->prepare("
        SELECT *
        FROM film
        INNER JOIN realisateur ON realisateur.Id_realisateur = film.Id_realisateur
        INNER JOIN personne ON personne.Id_personne = realisateur.Id_personne
        WHERE realisateur.Id_realisateur = :id
        "); // renvoie potentiellement plusieurs lignes
        $requeteFilm->execute(["id"=>$id]);
        require "view/detailRealisateur.php";
    }
}