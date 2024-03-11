<?php ob_start(); ?>

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