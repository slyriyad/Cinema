<?php ob_start(); ?>
<link rel="stylesheet" type="text/css" href="public/css/listFilms.css">
<p>Il y a <?= $requete->rowcount() ?> acteurs </p>

<table>
    <thead>
        <tr>
            <th></th>
            <th>TITRE</th>
            <th>ANNEE SORTIE</th>
            <th>supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchall() as $film) { ?>
            <tr>
                <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"></a><img src="<?= $film["affiche"]?>" alt=""></td>
                <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></td>
                <td><?= $film["anneeSortie"] ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="film" value="<?= $film["id_film"] ?>">
                        <button type="submit" name="sup">supprimer</button>
                    </form>
                </td>
                <td>
                    <a href="index.php?action=modifFilm&id=<?= $film["id_film"] ?>"><button type="submit" name="">modifier</button></a>
                </td>
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