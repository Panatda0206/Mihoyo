<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="public/css/main.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->e($title) ?></title>
</head>

<body>
<header>
    <!-- Menu -->
   <nav class="navbar">
    <a href="index.php">Accueil</a>
    <a href="index.php?action=add-perso">Ajouter un personnage</a>
    <a href="index.php?action=add-perso-element">Ajouter par élément</a>
    <a href="index.php?action=logs">Logs</a>
    <a href="index.php?action=login">Login</a>
</nav>

</header>
<!-- #contenu -->
<main id="contenu">
<?=$this->section('content')?>
</main>
<footer>

</footer>
</body>

</html>