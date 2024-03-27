<?php ob_start(); ?>
<link rel="stylesheet" type="text/css" href="public/css/listRealisateur.css">

<table>
    <thead>
        <tr>
            <th>PHOTO</th>
            <th>REALISATEUR</th>
            <th>DATE NAISSANCE</th>
            <th>SUPPRIMER</th>
            <th>MODIFIER</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchall() as $realisateur) { ?>
            <tr>
                <td><img src="<?= $realisateur["photo"] ?>" alt=""></td>
                <td><a href="index.php?action=detailRealisateur&id=<?= $realisateur["Id_realisateur"] ?>"><?= $realisateur["prenom"] ?> <?= $realisateur["nom"] ?> </td>
                <td><?= $realisateur["dateNaissance"] ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="realisateur" value="<?= $realisateur["Id_realisateur"] ?>">
                        <button type="submit" name="sup">supprimer</button>
                    </form>
                </td>
                <td>
                    <a href="index.php?action=modifRealisateur&id=<?= $realisateur["Id_realisateur"] ?>"><button type="submit" name="">modifier</button></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>   
</table>

<?php
$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";
?>