<?php ob_start(); ?>
<?php $film = $requeteFilm->fetch() ?>

<strong>Realisateur :</strong>
<p><a href="index.php?action=detailRealisateur&id=<?= $film["Id_realisateur"] ?>"><?= $film["prenom"]." ".$film["nom"]?></a></p>
<strong>Année de sortie :</strong>
<p><?= $film["anneeSortie"]?></p>
<strong>Durée :</strong>
<p><?= $film["duree"]?></p>
<strong>Note :</strong>
<p><?= $film["note"]?></p>


<h3>Casting</h3>

<table>
    <thead>
        <tr>
            <th>ACTEUR</th>
            <th>ROLE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requeteCasting->fetchall() as $cast) { ?>
            <tr>

                <td><a href="index.php?action=detailActeur&id=<?= $cast["Id_acteur"] ?>"><?= $cast["prenom"] ?> <?= $cast["nomAct"] ?> </a></td>
                <td><a href="index.php?action=detailRole&id=<?= $cast["Id_role"] ?>"><?= $cast["roleNom"] ?></td>
            </tr>
        <?php } ?>
    </tbody>   
</table>

<?php
$titre = "details $film[titre]";
$titre_secondaire = "Details $film[titre]";
$contenu = ob_get_clean();
require "view/template.php";
?>