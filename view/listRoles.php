<?php ob_start(); ?>
<link rel="stylesheet" type="text/css" href="public/css/listRoles.css">
<p>Il y a <?= $requete->rowcount() ?> rôles </p>

<table>
    <thead>
        <tr>
            <th>NOM</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchall() as $role) { ?>
            <tr>
                <td><a href="index.php?action=detailRole&id=<?= $role["Id_role"] ?>"><?= $role["nom"] ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="role" value="<?= $role["Id_role"] ?>">
                        <button type="submit" name="sup">supprimer</button>
                    </form>
                </td>
                <td>
                    <a href="index.php?action=modifRole&id=<?= $role["Id_role"] ?>"><button type="submit" name="">modifier</button></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>   
</table>

<?php
$titre = "Liste des rôles";
$titre_secondaire = "Liste des rôles";
$contenu = ob_get_clean();
require "view/template.php";
?>