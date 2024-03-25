<?php ob_start(); ?>
<?php $realisateur = $requeteRealisateur->fetch() ?>
<h1><?= $realisateur["prenom"]." ".$realisateur["nom"]?></h1>
<img src="<?= $realisateur["photo"] ?>" alt=""><br>

<strong>Date de naissance :</strong>
<p><?= $realisateur["dateNaissance"]?></p>

<h3>Filmographie</h3>

<table>
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE DE SORTIE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requeteFilm->fetchall() as $film) { ?>
            <tr>

                <td><a href="index.php?action=detailFilm&id=<?= $film["Id_film"] ?>"><?= $film["titre"] ?></td>
                <td><?= $film["anneeSortie"] ?></td>
                
            </tr>
        <?php } ?>
    </tbody>   
</table>

<?php
$titre = "details $realisateur[prenom].' '.$realisateur[nom]";
$titre_secondaire = "details $realisateur[prenom] $realisateur[nom]";
$contenu = ob_get_clean();
require "view/template.php";
?>