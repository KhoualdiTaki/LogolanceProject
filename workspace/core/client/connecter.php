<?php session_start(); ob_start();

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logolence_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupération des informations d'authentification du client à partir d'un formulaire (exemples de données)
$login = $_POST['login'];
$password = $_POST['password'];

// Requête SQL pour récupérer les informations du client
$sql = "SELECT * FROM client WHERE login_client = '$login' AND password_client = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Authentification réussie
    $client = $result->fetch_assoc();
    echo "Authentification réussie ! Bienvenue, " . $client['prenom_client'] . " " . $client['nom_client'];
    $_SESSION['client'] = $client;
    header('location: ../../index_client.php');
} else {
    // Authentification échouée
    echo "Échec de l'authentification. Veuillez vérifier vos identifiants.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
