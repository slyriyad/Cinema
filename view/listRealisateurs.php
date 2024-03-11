<?php ob_start(); ?>

<p>Il y a <?= $requete->rowcount() ?> realisateur </p>

<table>
    <thead>
        <tr>
            <th>SEXE</th>
            <th>REALISATEUR</th>
            <th>DATE NAISSANCE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchall() as $realisateur) { ?>
            <tr>
                <td><?= $realisateur["sexe"] ?></td>
                <td><a href="index.php?action=detailRealisateur&id=<?= $realisateur["Id_realisateur"] ?>"><?= $realisateur["prenom"] ?> <?= $realisateur["nom"] ?> </td>
                <td><?= $realisateur["dateNaissance"] ?></td>
            </tr>
        <?php } ?>
    </tbody>   
</table>

<?php
$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";
?>