<?php
// Variables contenant les informations d'authentification du prestataire
$login = $_POST['login']; // Supposons que le nom d'utilisateur soit envoyé via un formulaire POST
$password = $_POST['password']; // Supposons que le mot de passe soit envoyé via un formulaire POST

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "logolence_db";

$conn = new mysqli($servername, $username, $password_db, $dbname);

// Vérification des erreurs de connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Requête SQL pour authentifier le prestataire
$sql = "SELECT * FROM prestataire WHERE login_prestataire = '$login' AND password_prestataire = '$password'";
$result = $conn->query($sql);

// Vérification du résultat de la requête
if ($result->num_rows > 0) {
    // Authentification réussie
    $row = $result->fetch_assoc();
    echo "Authentification réussie pour le prestataire : " . $row['nom_prestataire'];
    $_SESSION['prestataire'] = $row;
    header('location: ../../index_prestataire.php');
} else {
    // Authentification échouée
    echo "Identifiants de connexion incorrects.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
