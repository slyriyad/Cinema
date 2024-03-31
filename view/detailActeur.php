<?php ob_start(); ?>
<link rel="stylesheet" type="text/css" href="public/css/detailActeur.css" /> 

<?php $acteur = $requeteActeur->fetch() ?>
<p class="nomAct" ><?= $acteur["prenom"]." ".$acteur["nom"]?></p >
<div class="photo">
    <img src="<?= $acteur["photo"] ?>" alt="">
</div>

<p class="cat" >Date de naissance :</p>
<p><?= $acteur["dateNaissance"]?></p>


<p class="cat">Filmographie</p>

<div class="swipper">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                <?php foreach($requeteFilm->fetchall() as $film) { ?>
                        <div class="swiper-slide"><a href="index.php?action=detailFilm&id=<?= $film["Id_film"] ?>"><img src="<?= $film["affiche"] ?>" alt=""><div class="nom"><?= $film["titre"] ?></div></a><a  href="index.php?action=detailRole&id=<?= $film["Id_role"] ?>"><p class="role"><?= $film["nom"] ?><p></a></div>
                    <?php } ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

<?php
$titre = "details $acteur[prenom].' '.$acteur[nom]";
$titre_secondaire = "details $acteur[prenom] $acteur[nom]";
$contenu = ob_get_clean();
require "view/template.php";
?>