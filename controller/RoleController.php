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
        ORDER BY nom ASC");

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

}
    