<?php
use Controller\ActeurController;
use Controller\RoleController;
use Controller\RealisateurController;
use Controller\GenreController;
use Controller\FilmController;
use Controller\HomeController;

spl_autoload_register(function($class_name) {
    include $class_name . '.php';
});

$ctrlActeur = new ActeurController();
$ctrlRole = new RoleController();
$ctrlRealisateur = new RealisateurController();
$ctrlGenre = new GenreController();
$ctrlFilm = new FilmController();
$ctrlHome = new HomeController();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])) {
    switch ($_GET["action"]) {

        case "listFilms" : $ctrlFilm->listFilms(); break;
        case "detailFilm" : $ctrlFilm->detailFilm($id); break;
        case "listActeurs" : $ctrlActeur->listActeurs(); break;
        case "detailActeur" : $ctrlActeur->detailActeur($id); break;
        case "listRealisateurs" : $ctrlRealisateur->listRealisateurs(); break;
        case "detailRealisateur" : $ctrlRealisateur->detailRealisateur($id); break;
        case "listRoles" : $ctrlRole->listRoles(); break;
        case "detailRole" : $ctrlRole->detailRole($id); break;
        case "listGenres" : $ctrlGenre->listGenres(); break;
        case "detailGenre" : $ctrlGenre->detailGenre($id); break;
        case "home" : $ctrlHome->home(); break;
    }
}