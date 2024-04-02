<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/template.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?= $titre ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body>
    <div id="wrapper">
        <header>
        <button id="hamburger-logo" for="hamburger">☰</button>
            <a class="logo1" href="index.php?action=home"><img class="logo" src="public/img/logo_cinéma.png" alt=""></a>
            <form class="templateForm" action="/action_page.php">
                <input class="searchBar" type="text" placeholder="Search.." name="search">
                <button class="searchBtn" type="submit"><i class="fa fa-search"></i></button>
            </form>
            <nav>
                <ul>
                    <li class="dropdown">
                        <button class="dropbtn">Ajouter</button>
                        <div class="dropdown-content">
                            <a class="drop" href="index.php?action=formFilm">Film</a>
                            <a class="drop" href="index.php?action=formActeur">Acteur</a>
                            <a class="drop" href="index.php?action=formRealisateur">Réalisateur</a>
                            <a class="drop" href="index.php?action=formRole">Rôle</a>
                            <a class="drop" href="index.php?action=formGenre">Genre</a>
                            <a class="drop" href="index.php?action=formCasting">Casting</a>
                        </div>
                    </li>
                    <li><a href="index.php?action=listFilms">Films</a></li>
                    <li><a href="index.php?action=listActeurs">Acteurs</a></li>
                    <li><a href="index.php?action=listRealisateurs">Réalisateurs</a></li>
                    <li><a href="index.php?action=listRoles">Rôles</a></li>
                    <li><a href="index.php?action=listGenres">Genres</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="menu-burger">
    
                <div class="burger">
                <a href="index.php?action=listFilms">Film</a>
                <a href="index.php?action=listActeurs">Acteur</a>
                <a href="index.php?action=listRealisateurs">Réalisateur</a>
                <a href="index.php?action=listRoles">Rôle</a>
                <a href="index.php?action=listGenres">Genre</a>
                    <a href="index.php?action=formFilm">Ajouter film</a>
                    <a href="index.php?action=formActeur">Ajouter acteur</a>
                    <a href="index.php?action=formRealisateur">Ajouter réalisateur</a>
                    <a href="index.php?action=formRole">Ajouter rôle</a>
                    <a href="index.php?action=formGenre">Ajouter genre</a>
                    <a href="index.php?action=formCasting">Ajouter casting</a>
                </div>
            </div>  
            <div id="contenu">
                <?= $contenu ?>
            </div>
        </main>
        <footer>
        <button class="searchBtnF" type="submit"><i class="fa fa-search"></i></button>
            <!-- <img src="public/img/footer2.png" alt=""> -->
            <div class="footer-reso">
                <div class="reso">
                    <i class="fa-brands fa-facebook-f"></i>
                </div>
                <div class="reso">
                    <i class="fa-brands fa-twitter"></i>
                </div>
                <div class="reso">
                    <i class="fa-brands fa-instagram"></i>
                </div>
            </div>
        </footer>
    </div>
    
    <script>
        // JavaScript pour afficher/cacher le menu déroulant au survol
        document.addEventListener("DOMContentLoaded", function() {
            var dropdowns = document.querySelectorAll('.dropdown');
            
            dropdowns.forEach(function(dropdown) {
                dropdown.addEventListener('mouseenter', function() {
                    this.querySelector('.dropdown-content').style.display = "block";
                });
                
                dropdown.addEventListener('mouseleave', function() {
                    this.querySelector('.dropdown-content').style.display = "none";
                });
            });
        });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // JavaScript pour initialiser Swiper
        document.addEventListener("DOMContentLoaded", function() {
            const swiper = new Swiper('.swiper', {
                // Vos options Swiper ici
            });
        });
    </script>
        <script  src="public/js/template.js"></script>
</body>
</html>