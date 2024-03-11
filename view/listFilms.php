<?php ob_start(); ?>

<p>Il y a <?= $requete->rowcount() ?> acteurs </p>

<table>
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE SORTIE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchall() as $film) { ?>
            <tr>
                <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></td>
                <td><?= $film["anneeSortie"] ?></td>
            </tr>
        <?php } ?>
    </tbody>   
</table>

<?php
$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";
?>