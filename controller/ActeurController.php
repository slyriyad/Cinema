<?php
namespace Controller;
use Model\Connect;

class ActeurController {
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

}