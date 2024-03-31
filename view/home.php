<?php ob_start(); ?>
<?php $dernierFilm = $requeteDernierFilm->fetch() ?>
<?php $ancienFilms = $requeteAncienFilm->fetchall() ?>
<?php $filmPopulaire = $requeteFilmPopulaire->fetchall() ?>
<?php $acteur = $requeteActeur->fetchall() ?>
<?php $realisateur = $requeteRealisateur->fetchall() ?>
<link rel="stylesheet" type="text/css" href="public/css/home.css" /> 
<div class="gauche">
    <div class="gHaut">
    <a href="index.php?action=detailFilm&id=<?= $dernierFilm["Id_film"] ?>"><img class="imgGH" src="<?= $dernierFilm["affiche"]?>" alt=""></a>
            <div class="text">
            <a href="index.php?action=detailFilm&id=<?= $dernierFilm["Id_film"] ?>"><p class="titre"><?= $dernierFilm["titre"]?></p><a/>
                
            <p class="article"><?= $dernierFilm["resume"]?>...</p></a>
        </div>
    </div>
    <div class="gBas">
        <?php foreach($ancienFilms as $film){ ?>
            <div class="card">
                <div class="card-header">
                <img src="<?=$film["affiche"]?>" alt="">
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <p class="card-titre"><?=$film["titre"]?></p>
                        <p class="card-article">
                        <?=$film["resume"]?>
                        </p >
                    </div>
                    <a href="index.php?action=detailFilm&id=<?= $film["Id_film"] ?>"><button href="" class="cardBtn">Learn More</button></a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<div class="droite">
    <div class="dHaut">
        <div class="acteur">
            <p class="categ">Acteurs</p>
            <div class="ImgDH">
                <?php foreach($acteur as $act ){ ?>
                    <a class="photo" href="index.php?action=detailActeur&id=<?= $act["Id_acteur"] ?>">
                    <img src="<?=$act["photo"]?>" alt="">
                    <p class="nom"><?=$act["prenom"]?> <?=$act["nom"]?></p>
                </a>
                <?php } ?>
            </div>
        </div>
        <div class="producteur">
            <p class="categ">Producteurs</p>
            <div class="ImgDH">
                <?php foreach($realisateur as $real ){ ?>
                    <a class="photo" href="index.php?action=detailRealisateur&id=<?= $real["Id_realisateur"] ?>">
                    <img src="<?=$real["photo"]?>" alt="">
                    <p class="nom"><?=$real["prenom"]?> <?=$real["nom"]?></p>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="dBas">
        <p class="categ">Films Populaires</p>
        <div class="swipper">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php foreach($filmPopulaire as $filmpop ){ ?>
                        <div class="swiper-slide"><a href="index.php?action=detailFilm&id=<?= $filmpop["Id_film"] ?>"><img src="<?= $filmpop["affiche"]?>" alt=""></a></div>
                    <?php } ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>    
</div>
<script  src="public/js/home.js"></script>

<?php

$contenu = ob_get_clean();
require "view/template.php";
?>


