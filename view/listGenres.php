<?php ob_start(); ?>
<link rel="stylesheet" type="text/css" href="public/css/listGenres.css">
<p>Il y a <?= $requete->rowcount() ?> Genres </p>

<table>
    <thead>
        <tr>
            <th>NOM</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchall() as $genre) { ?>
            <tr>
                <td><a href="index.php?action=detailGenre&id=<?= $genre["id_genre"] ?>"><?= $genre["nom"] ?></td>
                <td><form method="post">
                        <input type="hidden" name="genre" value="<?= $genre["id_genre"] ?>">
                        <button type="submit" name="sup">supprimer</button>
                    </form></td>
            </tr>
        <?php } ?>
    </tbody>   
</table>

<?php
$titre = "Liste des Genres";
$titre_secondaire = "Liste des Genres";
$contenu = ob_get_clean();
require "view/template.php";
?>