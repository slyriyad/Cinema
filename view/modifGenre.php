<?php ob_start(); ?>
<h1>modif Genre</h1>
<form action="" method="post">
    <label for="name">Nom:<br></label>
    <?php foreach($requete->fetchall() as $genre) { ?>
    <input type="text" placeholder="<?=$genre["nom"]?>" name="nom">
    <?php } ?>
    <input type="submit" value="modifier" class="bouton" name="bouton">
</form>

<?php
$titre = "Ajout de genre";
$titre_secondaire = "Ajout de genre";
$contenu = ob_get_clean();
require "view/template.php";
?>