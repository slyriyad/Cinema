<?php
namespace Controller;
use Model\Connect;

class ActeurController {
    // lister les Acteurs
    public function listActeurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT id_acteur, personne.photo,nom, personne.prenom, DATE_FORMAT(personne.dateNaissance, '%d/%m/%Y') AS dateNaissance
        FROM acteur
        INNER JOIN personne ON personne.id_personne = acteur.Id_personne
        WHERE deleted = 0
        ORDER BY nom ASC
        ");


        if (isset($_POST['sup'])) {
            $pdo = Connect::seConnecter();
            $acteur = $_POST['acteur'];
            $requeteformActeur = $pdo->prepare("
                UPDATE acteur
                SET deleted = TRUE
                WHERE Id_acteur = ?
            ");
            $requeteformActeur->execute([$acteur]);
            header("location:index.php?action=listActeurs");
        }
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


    // ajout les acteur
    public function formActeur() {
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
            $requeteformActeur = $pdo->prepare("
            INSERT INTO acteur(Id_personne)
            VALUES (?)
            ");
            $requeteformActeur -> execute([$idPersonne]);
        }
        require "view/formActeur.php";
    }








    public function modifActeur($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT *, DATE_FORMAT(personne.dateNaissance, '%Y-%m-%d') AS dateNaissance
        FROM acteur
        INNER JOIN personne ON personne.id_personne = acteur.Id_personne
        WHERE acteur.id_acteur = :id");
        $requete->execute(["id"=>$id]);

        if(isset($_POST['bouton'])){

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $sexe = $_POST['sexe'];
            $dateNaissance = $_POST['dateNaissance'];
            $photo = $_POST['photo'];

            $pdo = Connect::seConnecter();
            $requeteformActeur = $pdo->prepare("
            UPDATE personne
            INNER JOIN acteur ON personne.id_personne = acteur.Id_personne 
            SET nom = ?,
            prenom = ?,
            sexe = ?,
            dateNaissance = ?,
            photo = ?
            WHERE id_acteur = ?
            ");
            $requeteformActeur -> execute([$nom,$prenom,$sexe,$dateNaissance,$photo,$id]);
            header("location:index.php?action=modifActeur&id=$id");

        
        }
        require "view/modifActeur.php";
        
        }


}

