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
    $appreciation = 0;
    $prestataireID = $_POST['prestataireID'];
    $offreID = $_POST['offreID'];

    // Requête SQL pour ajouter le postulat
    $sql = "INSERT INTO postulat (appreciation_postulat, prestataire_postulat, offre_postulat)
            VALUES ('$appreciation', '$prestataireID', '$offreID')";

    if ($conn->query($sql) === TRUE) {
        echo "Le postulat a été ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du postulat : " . $conn->error;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
