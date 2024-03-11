<?php ob_start(); ?>
<?php $acteur = $requeteActeur->fetch() ?>

<strong>Date de naissance :</strong>
<p><?= $acteur["dateNaissance"]?></p>

<h3>Filmographie</h3>

<table>
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE DE SORTIE</th>
            <th>ROLE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requeteFilm->fetchall() as $film) { ?>
            <tr>

                <td><a href="index.php?action=detailFilm&id=<?= $film["Id_film"] ?>"><?= $film["titre"] ?></td>
                <td><?= $film["anneeSortie"] ?></td>
                <td><a href="index.php?action=detailRole&id=<?= $film["Id_role"] ?>"><?= $film["nom"] ?></td>
                
            </tr>
        <?php } ?>
    </tbody>   
</table>

<?php
$titre = "details $acteur[prenom].' '.$acteur[nom]";
$titre_secondaire = "details $acteur[prenom] $acteur[nom]";
$contenu = ob_get_clean();
require "view/template.php";
?>