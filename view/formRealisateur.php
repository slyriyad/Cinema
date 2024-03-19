<?php ob_start(); ?>
<h1>Ajout Réalisateur</h1>

<form action="" method="post">
    <label for="name">Nom:<br></label>
    <input type="text" placeholder="Nom" name="nom"><br>
    <label for="name">prenom:<br></label>
    <input type="text" placeholder="prenom" name="prenom"><br>
    <label for="name">sexe:<br></label>
    <input type="text" placeholder="sexe" name="sexe"><br>
    <label for="date">date de naissance:<br></label>
    <input type="date" placeholder="date de naissance" name="dateNaissance"><br>
    <label for="name">photo:<br></label>
    <input type="text" placeholder="photo" name="photo"><br>
    <input type="submit" pvalue="ajouter" class="bouton" name="bouton">
</form>

<?php
$titre = "Ajout de réalisateur";
$titre_secondaire = "Ajout de réalisateur";
$contenu = ob_get_clean();
require "view/template.php";
?>