<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération de l'ID de la réalisation à supprimer depuis le formulaire
    $idRealisation = $_POST["id_realisation"];

    // Requête SQL pour supprimer la réalisation
    $sql = "DELETE FROM realisation WHERE id_realisation = $idRealisation";
    $result = $conn->query($sql);

    // Vérification du résultat de la requête
    if ($result === TRUE) {
        echo "La réalisation a été supprimée avec succès.";
    } else {
        echo "Une erreur s'est produite lors de la suppression de la réalisation : " . $conn->error;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
