<?php ob_start(); ?>
<?php $role = $requeteRole->fetch() ?>
<link rel="stylesheet" type="text/css" href="public/css/detailRole.css" /> 

<p class="nom"><?= $role["nom"]?></p >

<table>
    <thead>
        <tr>
            <th>ACTEUR</th>
            <th>FILM</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requeteActeur->fetchall() as $acteur) { ?>
            <tr>

                <td><a href="index.php?action=detailActeur&id=<?= $acteur["Id_acteur"] ?>"><img src="<?= $acteur["photo"] ?>" alt=""><?= $acteur["prenom"]." ".$acteur["nom"] ?></td>
                <td><a href="index.php?action=detailFilm&id=<?= $acteur["Id_film"] ?>"><img src="<?= $acteur["affiche"] ?>" alt=""><?= $acteur["titre"] ?><br><?= $acteur["anneeSortie"] ?></td>   
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