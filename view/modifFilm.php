<?php ob_start(); ?>
<form action="" method="post">
    <?php foreach($requete->fetchall() as $film) { ?>
        <label for="titre">titcre:<br></label>
        <input type="text" value="<?= $film["titre"]?>" name="titre"><br>
        <label for="anneeSortie">anneeSortie:<br></label>
        <input type="text" value="<?= $film["anneeSortie"]?>" name="anneeSortie"><br>
        <label for="duree">duree(en minutes):<br></label>
        <input type="text" value="<?= $film["duree"]?>" name="duree"><br>
        <label for="resume">resume:<br></label>
        <input type="text" value="<?= $film["resume"]?>" name="resume"><br>
        <label for="note">note:<br></label>
        <input type="text" value="<?= $film["note"]?>" name="note"><br>
        <label for="affiche">affiche:<br></label>
        <input type="text" value="<?= $film["affiche"]?>" name="affiche"><br>
        <select name="realisateur">
            <?php foreach ($realisateurs->fetchall() as $realisateur) { ?>
                <option value="<?= $realisateur['Id_realisateur'] ?>"<?= ($film["Id_realisateur"] == $realisateur['Id_realisateur']) ? 'selected' : '' ?>><?= $realisateur['prenom']." ".$realisateur['nom'] ?></option>
            <?php } ?>
        </select>
        <div>
            <div>
                <?php foreach ($requeteToutGenre->fetchAll() as $genre) { ?>
                    <?php
                    // Vérifier si le genre est associé au film
                    $isChecked = false;
                    foreach ($filmGenres as $filmGenre) {
                        if ($filmGenre['id_genre'] == $genre['id_genre']) {
                            $isChecked = true;
                            break;
                        }
                    }
                    ?>
                    <label for="<?= $genre['id_genre'] ?>">
                        <input type="checkbox" id="<?= $genre['id_genre'] ?>" value="<?= $genre['id_genre'] ?>" name="genre" <?= $isChecked ? 'checked' : '' ?>>
                        <?= $genre['nom'] ?>
                    </label>
                <?php } ?>
            </div>
        </div>
<?php } ?>
    <input type="submit" value="ajouter" class="bouton" name="bouton">
</form>

    <?php
$titre = "Modif de Film";
$titre_secondaire = "Modif de Film";
$contenu = ob_get_clean();
require "view/template.php";
?>

