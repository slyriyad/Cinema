<?php
use Controller\ActeurController;
use Controller\RoleController;
use Controller\RealisateurController;
use Controller\GenreController;
use Controller\FilmController;
use Controller\HomeController;
use Controller\CastingController;

spl_autoload_register(function($class_name) {
    include $class_name . '.php';
});

$ctrlActeur = new ActeurController();
$ctrlRole = new RoleController();
$ctrlRealisateur = new RealisateurController();
$ctrlGenre = new GenreController();
$ctrlFilm = new FilmController();
$ctrlHome = new HomeController();
$ctrlCasting = new CastingController();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])) {
    switch ($_GET["action"]) {

        case "listFilms" : $ctrlFilm->listFilms(); break;
        case "detailFilm" : $ctrlFilm->detailFilm($id); break;
        case "formFilm" : $ctrlFilm->formFilm(); break;
        case "modifFilm" : $ctrlFilm->modifFilm($id); break;
        case "listActeurs" : $ctrlActeur->listActeurs(); break;
        case "detailActeur" : $ctrlActeur->detailActeur($id); break;
        case "formActeur" : $ctrlActeur->formActeur(); break;
        case "modifActeur" : $ctrlActeur->modifActeur($id); break;
        case "listRealisateurs" : $ctrlRealisateur->listRealisateurs(); break;
        case "detailRealisateur" : $ctrlRealisateur->detailRealisateur($id); break;
        case "formRealisateur" : $ctrlRealisateur->formRealisateur(); break;
        case "modifRealisateur" : $ctrlRealisateur->modifRealisateur($id); break;
        case "listRoles" : $ctrlRole->listRoles(); break;
        case "detailRole" : $ctrlRole->detailRole($id); break;
        case "formRole" : $ctrlRole->formRole(); break;
        case "modifRole" : $ctrlRole->modifRole($id); break;
        case "listGenres" : $ctrlGenre->listGenres(); break;
        case "detailGenre" : $ctrlGenre->detailGenre($id); break;
        case "formGenre" : $ctrlGenre->formGenre(); break;
        case "modifGenre" : $ctrlGenre->modifGenre($id); break;
        case "formCasting" : $ctrlCasting->formCasting(); break;
        case "home" : $ctrlHome->home(); break;
    }
}