<?php ob_start(); ?>
<h1>modif Genre</h1>
<form action="" method="post">
    <?php foreach($requete->fetchall() as $realisateur) { ?>
    <label for="name">Nom:<br></label>
    <input type="text" value="<?= $realisateur["nom"]?>" name="nom"><br>
    <label for="name">prenom:<br></label>
    <input type="text" value="<?= $realisateur["prenom"]?>" name="prenom"><br>
    <label for="name">sexe:<br></label>
    <input type="text" value="<?= $realisateur["sexe"]?>" name="sexe"><br>
    <label for="date">date de naissance:<br></label>
    <input type="date" value="<?= $realisateur["dateNaissance"]?>" name="dateNaissance"><br>
    <label for="name">photo:<br></label>
    <input type="text" value="<?= $realisateur["photo"]?>" name="photo"><br>
    <input type="submit" pvalue="ajouter" class="bouton" name="bouton">
    <?php } ?>
</form>

<?php
$titre = "Ajout de genre";
$titre_secondaire = "Ajout de genre";
$contenu = ob_get_clean();
require "view/template.php";
?>


