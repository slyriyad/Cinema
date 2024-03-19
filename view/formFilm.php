<?php ob_start(); ?>
<h1>Ajout Film</h1>

<form action="" method="post">
    <label for="name">titre:<br></label>
    <input type="text" placeholder="titre" name="titre"><br>
    <label for="name">anneeSortie:<br></label>
    <input type="text" placeholder="anneeSortie" name="anneeSortie"><br>
    <label for="name">duree(en minutes):<br></label>
    <input type="text" placeholder="duree" name="duree"><br>
    <label for="date">resume:<br></label>
    <input type="date" placeholder="resume" name="resume"><br>
    <label for="name">note:<br></label>
    <input type="text" placeholder="note" name="note"><br>
    <label for="name">affiche:<br></label>
    <input type="text" placeholder="affiche" name="affiche"><br>
    <label for="pet-select">Choose a pet:</label>
    <select name="realisateur" multiple>
        <?php foreach($requeteFilm->fetchall() as $film) { ?>
        <option value="<?= $film['Id_realisateur'] ?>"><?=$film['prenom']?></option>
        <?php } ?>
    </select>
    <input type="submit" value="ajouter" class="bouton" name="bouton">
</form>

<?php
$titre = "Ajout de Film";
$titre_secondaire = "Ajout de Film";
$contenu = ob_get_clean();
require "view/template.php";
?>