<?php ob_start(); ?>
<link rel="stylesheet" type="text/css" href="public/css/home.css" /> 
<div class="gauche">
    <div class="gHaut">
            <img class="imgGH" src="data:image/jpeg;base64,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" alt="">
            <div class="text">
                <p class="titre">DUNE</p>
                <p class="article">pziiznfzrfzefzefzrefrfr rf fe re rf e re re ref ef erferferf ref erferfer fef erf</p>
        </div>
    </div>
    <div class="gBas">
        <div class="card">
            <div class="card-header">
                <img src="public/img/al-pacino-scarface-i146734.jpg" alt="">
            </div>
            <div class="card-text">
                <p class="card-titre">scarface</p>
                <p class="card-article">
                    Credibly brand stanaads compliant user<br> exteible services college anibh 
                </p >
            </div>
            <button href="" class="cardBtn">Learn More</button>
        </div>
        <div class="card">
            <div class="card-header">
                <img src="public/img/al-pacino-scarface-i146734.jpg" alt="">
            </div>
            <div class="card-text">
                <p class="card-titre">scarface</p>
                <p class="card-article">
                    Credibly brand stanaads compliant user<br> exteible services college anibh 
                </p >
            </div>
            <button href="" class="cardBtn">Learn More</button>
        </div>
        <div class="card">
            <div class="card-header">
                <img src="public/img/al-pacino-scarface-i146734.jpg" alt="">
            </div>
            <div class="card-text">
                <p class="card-titre">scarface</p>
                <p class="card-article">
                    Credibly brand stanaads compliant user<br> exteible services college anibh 
                </p >
            </div>
            <button href="" class="cardBtn">Learn More</button>
        </div>
    </div>
</div>
<div class="droite">
    <div class="dHaut">
        <div class="acteur">
            <p class="categ">Acteurs</p>
            <div class="ImgDH">
                <img src="public/img/al pacino.jpg" alt="">
                <img src="public/img/al pacino.jpg" alt="">
                <img src="public/img/al pacino.jpg" alt="">
                <img src="public/img/al pacino.jpg" alt="">
            </div>
        </div>
        <div class="producteur">
            <p class="categ">Producteurs</p>
            <div class="ImgDH">
                <img src="public/img/al pacino.jpg" alt="">
                <img src="public/img/al pacino.jpg" alt="">
                <img src="public/img/al pacino.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="dBas">
        
    </div>
</div>


<?php

$contenu = ob_get_clean();
require "view/template.php";
?>