<?php ob_start(); ?>
<link rel="stylesheet" type="text/css" href="public/css/listActeurs.css">
<p>Il y a <?= $requete->rowcount() ?> acteurs </p>

<table>
    <thead>
        <tr>
            <th>SEXE</th>
            <th>ACTEUR</th>
            <th>DATENAISSANCE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchall() as $acteur) { ?>
            <tr>
                <td><?= $acteur["sexe"] ?></td>
                <td><a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"] ?>"><?= $acteur["prenom"]." ".$acteur["nom"] ?></a></td>
                <td><?= $acteur["dateNaissance"] ?></td>
                <td><form method="post">
                        <input type="hidden" name="acteur" value="<?= $acteur["id_acteur"] ?>">
                        <button type="submit" name="sup">supprimer</button>
                    </form></td>
            </tr>
        <?php } ?>
    </tbody>   
</table>

<?php
$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";
?>