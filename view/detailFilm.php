<?php ob_start(); ?>
<?php $film = $requeteFilm->fetch() ?>
<link rel="stylesheet" type="text/css" href="public/css/detailFilm.css" />

<p class="titre" ><?= $film["titre"] ?></p >
<div class="affiche">
    <img src="<?= $film["affiche"]?>" alt="">
</div>

<div class="text">
    <div class="realisateur">
        <p class="cat" >Realisateur </p>
        <img src="<?= $film["photo"] ?>" alt="">
        <p><a class="nom" href="index.php?action=detailRealisateur&id=<?= $film["Id_realisateur"] ?>"><?= $film["prenom"]." ".$film["nom"]?></a></p>
    </div>
    <p class="cat">Année de sortie :</p>
    <p><?= $film["anneeSortie"]?></p>
    <p class="cat">Durée :</p>
    <p><?= $film["duree"]?></p>
    <p class="cat">Note :</p>
    <p><?= $film["note"]?></p>
</div>


<p class="cat" >Casting</p>
<div class="swipper">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                <?php foreach($requeteCasting->fetchall() as $cast) { ?>
                        <div class="swiper-slide"><a href="index.php?action=detailActeur&id=<?= $cast["Id_acteur"] ?>"><img src="<?= $cast["photo"] ?>  " alt=""><div class="nom"><?= $cast["prenom"] ?> <?= $cast["nomAct"] ?>  </div><a  href="index.php?action=detailRole&id=<?= $cast["Id_role"] ?>"><p class="role"><?= $cast["roleNom"] ?><p></a></div>
                    <?php } ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>


<?php
$titre = "details $film[titre]";
$titre_secondaire = "Details $film[titre]";
$contenu = ob_get_clean();
require "view/template.php";
?>