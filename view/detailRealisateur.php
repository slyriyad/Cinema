<?php ob_start(); ?>
<link rel="stylesheet" type="text/css" href="public/css/detailRealisateur.css" />


<?php $realisateur = $requeteRealisateur->fetch() ?>
<p class="nomAct" ><?= $realisateur["prenom"]." ".$realisateur["nom"]?></p >
<div class="photo">
    <img src="<?= $realisateur["photo"] ?>" alt="">
</div>

<p class="cat" >Date de naissance :</p>
<p><?= $realisateur["dateNaissance"]?></p>

<p class="cat">Filmographie</p>

<div class="swipper">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
        <?php foreach($requeteFilm->fetchall() as $film) { ?>
                <div class="swiper-slide"><a href="index.php?action=detailFilm&id=<?= $film["Id_film"] ?>"><img src="<?= $film["affiche"] ?>" alt=""><div class="nom"><?= $film["titre"] ?></div></a></div>
            <?php } ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>



<?php
$titre = "details $realisateur[prenom].' '.$realisateur[nom]";
$titre_secondaire = "details $realisateur[prenom] $realisateur[nom]";
$contenu = ob_get_clean();
require "view/template.php";
?>