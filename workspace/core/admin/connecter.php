<?php session_start(); ob_start();

// Variables contenant les informations d'authentification de l'administrateur
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

// Requête SQL pour récupérer l'administrateur correspondant au nom d'utilisateur saisi
$sql = "SELECT * FROM administrateur WHERE login_administrateur = '$login'";
$result = $conn->query($sql);

// Vérification du résultat de la requête
if ($result->num_rows > 0) {
    // Administrateur trouvé, vérification du mot de passe
    $admin = $result->fetch_assoc();
    if ($password == $admin['password_administrateur']) {
        // Mot de passe correct, authentification réussie
        echo "Authentification réussie pour l'administrateur : " . $admin['nom_administrateur'];
        // Autres actions à effectuer après l'authentification réussie
        $_SESSION['admin'] = $admin;
        header('location: ../../index.php');
    } else {
        // Mot de passe incorrect
        echo "Mot de passe incorrect.";
    }
} else {
    // Administrateur non trouvé
    echo "Nom d'utilisateur incorrect.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
