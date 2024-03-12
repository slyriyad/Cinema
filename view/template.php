<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/template.css" /> 
    <title><?= $titre ?></title>
</head>
<body>
    <div id="wrapper">
        <nav>
            <ul>
                <li><a href="index.php?action=listFilms">Films</a></li>
                <li><a href="index.php?action=listActeurs">Acteurs</a></li>
                <li><a href="index.php?action=listRealisateurs">Réalisateurs</a></li>
                <li><a href="index.php?action=listRoles">Rôles</a></li>
                <li><a href="index.php?action=listGenres">Genres</a></li>
            </ul>
        </nav>
        <main>
            <div id="contenu">
                <h1 class="uk-heading-divider">CINEMA</h1>
                <h2 class="uk-heading-bullet"></h2>
                <?= $contenu ?>
            </div>
        </main>
    </div>
</body>
</html>