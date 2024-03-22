<?php
namespace Controller;
use Model\Connect;

class RoleController {

    // lister les Roles
    public function listRoles() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT *
        FROM role
        WHERE deleted = 0
        ORDER BY nom ASC");


        if (isset($_POST['sup'])) {
            $pdo = Connect::seConnecter();
            $role = $_POST['role'];
            $requeteformRole = $pdo->prepare("
                UPDATE role
                SET deleted = TRUE
                WHERE id_role = ?
            ");
            header("location:index.php?action=listRoles");
            $requeteformRole->execute([$role]);
        }
        require "view/listRoles.php";
    }


    // detail role
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


    // ajout les Role
    public function formRole() {
        if(isset($_POST['bouton'])){

            $nom = $_POST['nom'];

            $pdo = Connect::seConnecter();
            $requeteformRole = $pdo->prepare("
            INSERT INTO Role(nom)
            VALUES (?)
            ");
            $requeteformRole -> execute([$nom]);

        
        }
        require "view/formRole.php";
    }






    public function modifRole($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT *
        FROM role
        WHERE Role.id_role = :id");
        $requete->execute(["id"=>$id]);

        if(isset($_POST['bouton'])){

            $nom = $_POST['nom'];

            $pdo = Connect::seConnecter();
            $requeteformRole = $pdo->prepare("
            UPDATE role
            SET nom = ?
            WHERE Id_role = ?
            ");
            header("location:index.php?action=modifRole&id=$id");
            $requeteformRole -> execute([$nom,$id]);

        
        }
        require "view/modifRole.php";
        
        }

}
    