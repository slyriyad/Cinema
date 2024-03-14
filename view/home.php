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
                <div class="card-text">
                    <p class="card-titre"><?=$film["titre"]?></p>
                    <p class="card-article">
                    <?=$film["resume"]?>
                    </p >
                </div>
                <a href="index.php?action=detailFilm&id=<?= $film["Id_film"] ?>"><button href="" class="cardBtn">Learn More</button></a>
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
                    <a href="index.php?action=detailActeur&id=<?= $act["Id_acteur"] ?>"><img src="<?=$act["photo"]?>" alt=""></a>
                <?php } ?>
            </div>
        </div>
        <div class="producteur">
            <p class="categ">Producteurs</p>
            <div class="ImgDH">
                <?php foreach($realisateur as $real ){ ?>
                    <a href="index.php?action=detailRealisateur&id=<?= $real["Id_realisateur"] ?>"><img src="<?=$real["photo"]?>" alt=""></a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="dBas">
        <p class="categ1">Films Populaires</p>
        <div class="carousel">
            <div class="carousel__scene">
                <ol class="carousel__list">
                <?php foreach($filmPopulaire as $filmpop ){ ?>
                    <li class="carousel__cell"><a href="index.php?action=detailFilm&id=<?= $filmpop["Id_film"] ?>"><img src="<?= $filmpop["affiche"]?>" alt=""></li></a>
                <?php } ?>
                </ol>
            </div>
            <div class="carousel__controls">
                <button class="previous-button"><i class="fa-solid fa-circle-up"></i></button>
                <button class="next-button"><i class="fa-solid fa-circle-down"></i></button>
            </div>
        </div>
    </div>    
</div>
<script  src="public/js/home.js"></script>


<?php

$contenu = ob_get_clean();
require "view/template.php";
?>