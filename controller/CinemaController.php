<?php
namespace Controller;
use Model\Connect;

class CinemaController {

    // lister les films
    public function listFilms() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT id_film, titre, anneeSortie
            FROM film
            ORDER BY anneeSortie DESC
        ");

        require "view/listFilms.php";
    }


    // detail les films
    public function detailFilm($id) {
        $pdo = Connect::seConnecter();
        $requeteFilm = $pdo->prepare("
            SELECT *,SEC_TO_TIME(duree*60) AS duree
            FROM film
            INNER JOIN realisateur ON realisateur.Id_realisateur = film.Id_realisateur
            INNER JOIN personne ON personne.id_personne = realisateur.id_personne
            WHERE id_film = :id
        ");
        $requeteFilm->execute(["id"=>$id]);

        $requeteCasting = $pdo->prepare("
        SELECT *,personne.nom AS nomAct,role.nom as roleNom
        FROM film
        INNER JOIN jouer ON jouer.id_film = film.Id_film
        INNER JOIN acteur ON acteur.Id_acteur = jouer.Id_acteur
        INNER JOIN personne ON personne.id_personne = acteur.id_personne
        INNER JOIN role ON role.Id_role = jouer.Id_role
        WHERE film.id_film = :id
        "); // renvoie potentiellement plusieurs lignes
        $requeteCasting->execute(["id"=>$id]);
        require "view/detailFilm.php";
    }


    // lister les Acteurs
    public function listActeurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT id_acteur, personne.sexe,nom, personne.prenom, DATE_FORMAT(personne.dateNaissance, '%d/%m/%Y') AS dateNaissance
        FROM acteur
        INNER JOIN personne ON personne.id_personne = acteur.Id_personne
        ORDER BY nom ASC
        ");

        require "view/listActeurs.php";
    }


    // detail les acteurs
    public function detailActeur($id) {
        $pdo = Connect::seConnecter();
        $requeteActeur = $pdo->prepare("
            SELECT *, DATE_FORMAT(personne.dateNaissance, '%d/%m/%Y') AS dateNaissance
            FROM personne
            INNER JOIN acteur ON personne.id_personne = acteur.id_personne 
            WHERE id_acteur = :id
        ");
        $requeteActeur->execute(["id"=>$id]);

        $requeteFilm = $pdo->prepare("
        SELECT *
        FROM film
        INNER JOIN jouer ON jouer.Id_film = film.Id_film
        INNER JOIN acteur ON acteur.Id_acteur = jouer.Id_acteur
        INNER JOIN personne ON personne.Id_personne = acteur.Id_personne
        INNER JOIN role ON role.Id_role = jouer.Id_role
        WHERE acteur.Id_acteur = :id
        ORDER BY anneeSortie DESC
        "); // renvoie potentiellement plusieurs lignes
        $requeteFilm->execute(["id"=>$id]);
        require "view/detailActeur.php";
    }


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


    // lister les Roles
    public function listRoles() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT *
        FROM role
        ORDER BY nom ASC");

        require "view/listRoles.php";
    }


    // detail les role
    public function detailRole($id) {
        $pdo = Connect::seConnecter();
        $requeteRole = $pdo->prepare("
            SELECT *
            FROM role 
            WHERE role.Id_role = :id
        ");
        $requeteRole->execute(["id"=>$id]);

        $requeteActeur = $pdo->prepare("
        SELECT *
        FROM role
        INNER JOIN jouer ON role.Id_role = jouer.Id_role
        INNER JOIN acteur ON acteur.Id_acteur = jouer.Id_acteur
        INNER JOIN film ON film.Id_film = jouer.Id_film
        INNER JOIN personne ON personne.Id_personne = acteur.Id_personne
        WHERE role.Id_role = :id
        "); // renvoie potentiellement plusieurs lignes
        $requeteActeur->execute(["id"=>$id]);
        require "view/detailRole.php";
    }


    // lister les Genres
    public function listGenres() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT *
        FROM genre
        ORDER BY nom");

        require "view/listGenres.php";
    }

    // detail les genre
    public function detailGenre($id) {
        $pdo = Connect::seConnecter();
        $requeteGenre = $pdo->prepare("
            SELECT *
            FROM genre
            WHERE id_genre = :id
        ");
        $requeteGenre->execute(["id"=>$id]);

        $requeteFilm = $pdo->prepare("
        SELECT *
        FROM genre
        INNER JOIN posseder ON posseder.Id_genre = genre.id_genre
        INNER JOIN film ON film.Id_film = posseder.Id_film
        WHERE genre.id_genre = :id
        ORDER BY anneeSortie DESC
        "); // renvoie potentiellement plusieurs lignes
        $requeteFilm->execute(["id"=>$id]);
        require "view/detailgenre.php";
    }
}