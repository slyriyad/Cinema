<?php ob_start(); ?>
<h1>Ajout Role</h1>

<form action="" method="post">
<label for="film">Film</label><br>
<select name="film">
    <?php foreach ($films as $film) { ?>
        <option value="<?= $film['Id_film'] ?>"><?= $film['titre'] ?></option>
    <?php } ?>
</select><br>
<label for="acteur">Acteur</label><br>
<select name="acteur">
    <?php foreach ($acteurs as $acteur) { ?>
        <option value="<?= $acteur['Id_acteur'] ?>"><?= $acteur['prenom']." ".$acteur['nom'] ?></option>
    <?php } ?>
</select><br>
<label for="role">Rôle</label><br>
<select name="role">
    <?php foreach ($roles as $role) { ?>
        <option value="<?= $role['Id_role'] ?>"><?= $role['nom']?></option>
    <?php } ?>
</select><br>
    <input type="submit" pvalue="ajouter" class="bouton" name="bouton">
</form>

<?php
$titre = "Ajout de Role";
$titre_secondaire = "Ajout de Role";
$contenu = ob_get_clean();
require "view/template.php";
?>


