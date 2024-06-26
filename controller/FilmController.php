<?php
namespace Controller;
use Model\Connect;

class FilmController {
    // lister les films
    public function listFilms() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT id_film, titre, anneeSortie,affiche
            FROM film
            WHERE deleted = 0
            ORDER BY anneeSortie DESC
        ");

        if (isset($_POST['sup'])) {
            $pdo = Connect::seConnecter();
            $genre = $_POST['film'];
            $requeteformFilm = $pdo->prepare("
                UPDATE film
                SET deleted = TRUE
                WHERE id_film = ?
            ");
            $requeteformFilm->execute([$genre]);
        }
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


        $requeteGenre = $pdo->query("
        SELECT *
        FROM genre
        ");
        
        if(isset($_POST['bouton'])){
            $pdo = Connect::seConnecter();



            $titre = $_POST['titre'];
            $anneeSortie = $_POST['anneeSortie'];
            $duree = $_POST['duree'];
            $resume = $_POST['resume'];
            $note = $_POST['note'];
            $affiche = $_POST['affiche'];
            
            
            $requeteformFilm = $pdo->prepare("
            INSERT INTO film(titre,anneeSortie,duree,resume,note,affiche)
            VALUES (?,?,?,?,?,?)
            ");
            $requeteformFilm->execute([$titre, $anneeSortie, $duree, $resume, $note,$affiche]);
            
            $idFilm = $pdo->lastInsertId();
            $genres = isset($_POST['genres']) ? $_POST['genres'] : [];
            $requeteformGenre = $pdo->prepare("
            INSERT INTO posseder(id_film,id_genre)
            VALUES (?,?)
            ");
            foreach($genres as $genre) {
                $requeteformGenre->execute([$idFilm, $genre]);
            }
            
        }
        require "view/formFilm.php";
    }






    public function modifFilm($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT *
        FROM film
        INNER JOIN realisateur ON realisateur.id_realisateur = film.id_realisateur
        INNER JOIN personne ON personne.Id_personne = realisateur.Id_personne
        WHERE id_film = :id
        ");
        $requete->execute(["id"=>$id]);

        $realisateurs = $pdo->query("
        SELECT *
        FROM realisateur
        INNER JOIN personne ON personne.Id_personne = realisateur.Id_personne
        ");



        // Récupérer les genres associés au film
    $requeteGenresFilm = $pdo->prepare("SELECT * FROM posseder WHERE Id_film = :id");
    $requeteGenresFilm->execute(["id" => $id]);
    $filmGenres = $requeteGenresFilm->fetchAll();
        
        $requeteToutGenre = $pdo->query("
        SELECT *
        FROM genre
        ");


        if(isset($_POST['bouton'])){

            $titre = $_POST['titre'];
            $anneeSortie = $_POST['anneeSortie'];
            $duree = $_POST['duree'];
            $resume = $_POST['resume'];
            $note = $_POST['note'];
            $affiche = $_POST['affiche'];
            $realisateur = $_POST['realisateur'];

            $pdo = Connect::seConnecter();
            $requetefilm = $pdo->prepare("
            UPDATE film 
            SET titre = ?,
            anneeSortie = ?,
            duree = ?,
            resume = ?,
            note = ?,
            affiche = ?,
            Id_realisateur = ?
            WHERE id_film = ?
            ");
            $requetefilm -> execute([$titre,$anneeSortie,$duree,$resume,$note,$affiche,$realisateur,$id]);
            header("location:index.php?action=modifFilm&id=$id");

        
        }
        require "view/modifFilm.php";
        
        }
}