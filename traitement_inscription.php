<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "footclub";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST['ok'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $requete = $bdd->prepare("INSERT INTO users (username, email, mdp) 
                              VALUES (:username, :email, :mdp)");
    $success = $requete->execute([
        'username' => $username,
        'email' => $email,
        'mdp' => $password
    ]);

    if ($success) {
        echo "Inscription réussie !";
        ?> <a href="connexion.php">Cliquez ici pour vous connecter !</a> <?php
    } else {
        echo "Erreur lors de l'inscription.";
    }
} else {
    echo "Veuillez remplir le formulaire d'inscription.";
}
?>
