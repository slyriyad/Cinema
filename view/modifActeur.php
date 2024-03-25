<?php ob_start(); ?>
<h1>modif Acteur</h1>
<form action="" method="post">
    <?php foreach($requete->fetchall() as $acteur) { ?>
    <label for="name">Nom:<br></label>
    <input type="text" value="<?= $acteur["nom"]?>" name="nom"><br>
    <label for="name">prenom:<br></label>
    <input type="text" value="<?= $acteur["prenom"]?>" name="prenom"><br>
    <label for="name">sexe:<br></label>
    <input type="text" value="<?= $acteur["sexe"]?>" name="sexe"><br>
    <label for="date">date de naissance:<br></label>
    <input type="date" value="<?= $acteur["dateNaissance"]?>" name="dateNaissance"><br>
    <label for="name">photo:<br></label>
    <input type="text" value="<?= $acteur["photo"]?>" name="photo"><br>
    <input type="submit" pvalue="ajouter" class="bouton" name="bouton">
    <?php } ?>
</form>

<?php
$titre = "Ajout de Acteur";
$titre_secondaire = "Ajout de Acteur";
$contenu = ob_get_clean();
require "view/template.php";
?>


