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
        WHERE deleted = 0
        ORDER BY nom ASC
        ");


        if (isset($_POST['sup'])) {
            $pdo = Connect::seConnecter();
            $real = $_POST['realisateur'];
            $requeteformReal = $pdo->prepare("
                UPDATE realisateur
                SET deleted = TRUE
                WHERE Id_realisateur = ?
            ");
            $requeteformReal->execute([$real]);
            header("location:index.php?action=listRealisateurs");
        }
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


     // ajout les realisateur
     public function formRealisateur() {
        if(isset($_POST['bouton'])){

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $sexe = $_POST['sexe'];
            $dateNaissance = $_POST['dateNaissance'];
            $photo = $_POST['photo'];

            $pdo = Connect::seConnecter();
            $requeteformPersonne = $pdo->prepare("
            INSERT INTO personne(nom,prenom,sexe,dateNaissance,photo)
            VALUES (?,?,?,?,?)
            ");
            $requeteformPersonne->execute([$nom, $prenom, $sexe, $dateNaissance, $photo]);
            
            $idPersonne = $pdo->lastInsertId();
            $requeteformRealisateur = $pdo->prepare("
            INSERT INTO Realisateur(Id_personne)
            VALUES (?)
            ");
            $requeteformRealisateur -> execute([$idPersonne]);
        }
        require "view/formRealisateur.php";
    }
}