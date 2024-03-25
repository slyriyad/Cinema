<?php
namespace Controller;
use Model\Connect;

class CastingController {

    // ajout les casting
    public function formCasting() {

        $pdo = Connect::seConnecter();
        $films = $pdo->query("
        SELECT * 
        FROM film 
        ");

        $pdo = Connect::seConnecter();
        $acteurs = $pdo->query("
        SELECT * 
        FROM acteur 
        INNER JOIN personne ON acteur.Id_personne = personne.Id_personne
        ");


        $pdo = Connect::seConnecter();
        $roles = $pdo->query("
        SELECT * 
        FROM role 
        ");


        if(isset($_POST['bouton'])){

            $film = $_POST['film'];
            $acteur = $_POST['acteur'];
            $role = $_POST['role'];

            $pdo = Connect::seConnecter();
            $requeteformCasting = $pdo->prepare("
            INSERT INTO jouer(Id_film,Id_acteur,Id_role)
            VALUES (?,?,?)
            ");
            $requeteformCasting -> execute([$film,$acteur,$role]);

        
        }
        require "view/formCasting.php";
    }
}