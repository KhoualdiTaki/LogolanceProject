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
    // Récupération des données du formulaire
    $postulatID = $_POST['postulatID'];
    $appreciation = $_POST['appreciation'];

    // Requête SQL pour mettre à jour l'appréciation du postulat
    $sql = "UPDATE postulat SET appreciation_postulat = '$appreciation' WHERE id_postulat = '$postulatID'";

    if ($conn->query($sql) === TRUE) {
        echo "L'appréciation du postulat a été mise à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour de l'appréciation du postulat : " . $conn->error;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
