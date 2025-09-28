<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "footclub";

    try {
        $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    }   
        $email = $_POST['email'];
        $password = $_POST['password'];
        if ($email != "" && $password != "") {
            // Connexion à la bdd
            $req = $bdd->query("SELECT * FROM users WHERE email = '$email' AND mdp = '$password'");
            $rep = $req->fetch();
            if ($rep) {
                setcookie("email", $email, time() + 3600);
                setcookie("mdp", $password, time() + 3600);
                header("Location: accueil.php");
            } else {
                $error_msg = "Email ou mot de passe incorrect.";
            }
        }
           
    ?>
    <form method="POST" action="">
        <label for="email">Adresse e-mail:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Se connecter</button>
    </form>

    <?php
    if (isset($error_msg)) {
        echo "<p style='color:red;'>$error_msg</p>";
    }
    ?>

</body>
</html>