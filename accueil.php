<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue sur la page d'accueil</h1>
    <p>Vous êtes connecté en tant que : <?php echo $_COOKIE['email']; ?></p>
    <a href="deconnexion.php">Se déconnecter</a>
</body>
</html>