<?php ob_start(); ?>
<?php $role = $requeteRole->fetch() ?>

<h1><?= $role["nom"]?></h1>
<strong>Date de naissance :</strong>

<h3>Acteurs</h3>

<table>
    <thead>
        <tr>
            <th>ACTEUR</th>
            <th>FILM</th>
            <th>ANNEE SORTIE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requeteActeur->fetchall() as $acteur) { ?>
            <tr>

                <td><a href="index.php?action=detailActeur&id=<?= $acteur["Id_acteur"] ?>"><?= $acteur["prenom"]." ".$acteur["nom"] ?></td>
                <td><a href="index.php?action=detailFilm&id=<?= $acteur["Id_film"] ?>"><?= $acteur["titre"] ?></td>
                <td><?= $acteur["anneeSortie"] ?></td>
                
            </tr>
        <?php } ?>
    </tbody>   
</table>

<?php
$titre = "details $role[nom]";
$titre_secondaire = "details$role[nom]";
$contenu = ob_get_clean();
require "view/template.php";
?>