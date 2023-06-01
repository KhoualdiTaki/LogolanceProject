<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logolence_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération de l'ID de l'offre à supprimer
    $offreID = $_POST['idf'];

    // Requête SQL pour supprimer l'offre
    $sql = "DELETE FROM offre WHERE id_offre = $offreID";

    if ($conn->query($sql) === TRUE) {
        echo "L'offre a été supprimée avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'offre : " . $conn->error;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
