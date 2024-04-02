<?php ob_start(); ?>
<link rel="stylesheet" type="text/css" href="public/css/listFilms.css">


<table>
    <thead>
        <tr>
            <th>FILM</th>
            <th>SUPPRIMER</th>
            <th>MODIFIER</th>
    </thead>
    <tbody>
        <?php foreach($requete->fetchall() as $film) { ?>
            <tr>
                <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><img src="<?= $film["affiche"]?>" alt=""><?= $film["titre"] ?><br><?= $film["anneeSortie"] ?></a></td>
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