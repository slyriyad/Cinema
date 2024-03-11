<?php ob_start(); ?>

<p>Il y a <?= $requete->rowcount() ?> films </p>

<table>
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANEE SORTIE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchall() as $film) { ?>
            <tr>
                <td><?= $film["titre"] ?></td>
                <td><?= $film["anneeSortie"] ?></td>
            </tr>
        <?php } ?>
    </tbody>   
</table>

<?php
$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";