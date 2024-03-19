<?php ob_start(); ?>
<h1>Ajout Role</h1>

<form action="" method="post">
    <label for="name">Nom:<br></label>
    <input type="text" placeholder="Nom" name="nom">
    <input type="submit" pvalue="ajouter" class="bouton" name="bouton">
</form>

<?php
$titre = "Ajout de Role";
$titre_secondaire = "Ajout de Role";
$contenu = ob_get_clean();
require "view/template.php";
?>