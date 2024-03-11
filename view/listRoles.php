<?php ob_start(); ?>

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