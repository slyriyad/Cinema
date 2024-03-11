<?php ob_start(); ?>
<?php $genre = $requeteGenre->fetch() ?>

<h1><?=$genre["nom"]?></h1>

<h3>Films</h3>

<table>
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE DE SORTIE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requeteFilm->fetchall() as $film) { ?>
            <tr>

                <td><a href="index.php?action=detailFilm&id=<?= $film["Id_film"] ?>"><?= $film["titre"] ?></td>
                <td><?= $film["anneeSortie"] ?></td>
                
            </tr>
        <?php } ?>
    </tbody>   
</table>

<?php
$titre = "$genre[nom]";
$titre_secondaire = "$genre[nom]";
$contenu = ob_get_clean();
require "view/template.php";
?>