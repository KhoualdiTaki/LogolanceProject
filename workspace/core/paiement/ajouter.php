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
    // Récupération des données du paiement
    $montantPaiement = $_POST['montantPaiement'];
    $monnaiePaiement = $_POST['monnaiePaiement'];
    $postulatID = $_POST['postulatID'];

    // Requête SQL pour insérer le paiement
    $sql = "INSERT INTO paiement (montant_paiement, monnaie_paiement, date_reglement_paiement, postulat_paiement) VALUES ('$montantPaiement', '$monnaiePaiement', NOW(), '$postulatID')";

    if ($conn->query($sql) === TRUE) {
        echo "Le paiement a été ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du paiement : " . $conn->error;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
