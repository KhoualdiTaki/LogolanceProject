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

// Vérification si les données ont été soumises via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération de l'ID du postulat à valider
    $postulatID = $_POST['idp'];

    // Requête SQL pour mettre à jour le statut et la date de validation du postulat
    $sql = "UPDATE postulat SET date_validation_postulat = NOW() WHERE id_postulat = '$postulatID'";

    if ($conn->query($sql) === TRUE) {
        echo "Le postulat a été validé avec succès.";
    } else {
        echo "Erreur lors de la validation du postulat : " . $conn->error;
    }
} else {
    echo "Erreur : aucune donnée reçue.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
