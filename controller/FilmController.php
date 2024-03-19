<?php
namespace Controller;
use Model\Connect;

class FilmController {
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


    // ajout les film
    public function formFilm() {
        $pdo = Connect::seConnecter();
        $requeteRealisateur = $pdo->query("
        SELECT * 
        FROM realisateur 
        INNER JOIN personne ON realisateur.Id_personne = personne.Id_personne
        ");


        $requeteActeur = $pdo->query("
        SELECT * 
        FROM acteur 
        INNER JOIN personne ON acteur.Id_personne = personne.Id_personne
        ");
        
        if(isset($_POST['bouton'])){
            $pdo = Connect::seConnecter();



            $titre = $_POST['titre'];
            $anneeSortie = $_POST['anneeSortie'];
            $duree = $_POST['duree'];
            $resume = $_POST['resume'];
            $note = $_POST['note'];
            $affiche = $_POST['affiche'];
            $realisateur = $_POST['realisateur'];
            
            $requeteformFilm = $pdo->prepare("
            INSERT INTO film(titre,anneeSortie,duree,resume,note,affiche,Id_realisateur)
            VALUES (?,?,?,?,?,?,?)
            ");
            $requeteformFilm->execute([$titre, $anneeSortie, $duree, $resume, $note,$affiche,$realisateur]);
            
        }
        require "view/formFilm.php";
    }
}