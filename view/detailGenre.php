<?php ob_start(); ?>
<?php $genre = $requeteGenre->fetch() ?>
<link rel="stylesheet" type="text/css" href="public/css/detailGenre.css" /> 

<p class="nom"><?=$genre["nom"]?></p>

<h3>Films</h3>

<table>
    <thead>
        <tr>
            <th>TITRE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requeteFilm->fetchall() as $film) { ?>
            <tr>

                <td><a href="index.php?action=detailFilm&id=<?= $film["Id_film"] ?>"><img src="<?= $film["affiche"] ?>" alt=""><?= $film["titre"] ?><?= $film["anneeSortie"] ?></td>
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