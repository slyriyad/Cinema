<?php ob_start(); ?>
<h1>Ajout Genre</h1>

<form action="" method="post">
    <label for="name">Nom:<br></label>
    <input type="text" placeholder="Nom" name="nom">
    <input type="submit" pvalue="ajouter" class="bouton" name="bouton">
</form>

<?php
$titre = "Ajout de genre";
$titre_secondaire = "Ajout de genre";
$contenu = ob_get_clean();
require "view/template.php";
?>