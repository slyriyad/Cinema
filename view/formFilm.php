<?php ob_start(); ?>
<?php $realisateurs = $requeteRealisateur->fetchAll();?>
<?php $acteurs = $requeteActeur->fetchAll();?>
<h1>Ajout Film</h1>


<form action="" method="post">
    <label for="titre">titre:<br></label>
    <input type="text" placeholder="titre" name="titre"><br>
    <label for="anneeSortie">anneeSortie:<br></label>
    <input type="text" placeholder="anneeSortie" name="anneeSortie"><br>
    <label for="duree">duree(en minutes):<br></label>
    <input type="text" placeholder="duree" name="duree"><br>
    <label for="resume">resume:<br></label>
    <input type="text" placeholder="resume" name="resume"><br>
    <label for="note">note:<br></label>
    <input type="text" placeholder="note" name="note"><br>
    <label for="affiche">affiche:<br></label>
    <input type="text" placeholder="affiche" name="affiche"><br>
    <select name="realisateur">
        <?php foreach ($realisateurs as $realisateur) { ?>
            <option value="<?= $realisateur['Id_realisateur'] ?>"><?= $realisateur['prenom']." ".$realisateur['nom'] ?></option>
        <?php } ?>
    </select><br>
    <!-- <div>
        <div>
        foreach ($acteurs as $acteur) { 
            <label for="< $acteur['Id_acteur'] ?>"><input type="checkbox" id="< $acteur['Id_acteur'] ?>" value="<= $acteur['Id_acteur'] ?>"><= $acteur['prenom']." ".$acteur['nom'] ?></label>
        } 
        </div>
    </div> -->
    <input type="submit" value="ajouter" class="bouton" name="bouton">
</form>

<?php
$titre = "Ajout de Film";
$titre_secondaire = "Ajout de Film";
$contenu = ob_get_clean();
require "view/template.php";
?>