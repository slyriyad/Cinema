<?php
namespace Controller;
use Model\Connect;

class GenreController {
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

    // ajout les genre
    public function formGenre() {
        if(isset($_POST['bouton'])){

            $nom = $_POST['nom'];

            $pdo = Connect::seConnecter();
            $requeteformGenre = $pdo->prepare("
            INSERT INTO genre(nom)
            VALUES (?)
            ");
            $requeteformGenre -> execute([$nom]);

        
        }
        require "view/formGenre.php";
    }
}
