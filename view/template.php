<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/template.css" /> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?= $titre ?></title>
</head>
<body>
    <div id="wrapper">
        <header>
            <img class="logo" src="public/img/logo_cinéma.png" alt="">
            <form action="/action_page.php">
                <input class="searchBar" type="text" placeholder="Search.." name="search">
                <button class="searchBtn" type="submit"><i class="fa fa-search"></i></button>
            </form>
            <nav>
                <ul>
                    <li><a href="index.php?action=listFilms">Films</a></li>
                    <li><a href="index.php?action=listActeurs">Acteurs</a></li>
                    <li><a href="index.php?action=listRealisateurs">Réalisateurs</a></li>
                    <li><a href="index.php?action=listRoles">Rôles</a></li>
                    <li><a href="index.php?action=listGenres">Genres</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div id="contenu">
                <?= $contenu ?>
            </div>
        </main>
        <footer>
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
            <!-- <img class="footerImg" src="public/img/footer.png" alt=""> -->
        </footer>
    </div>
</body>
</html>