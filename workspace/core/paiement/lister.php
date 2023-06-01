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
    // Récupération de l'ID du postulat
    $postulatID = $_POST['postulatID'];

    // Requête SQL pour récupérer les paiements par postulat
    $sql = "SELECT * FROM paiement WHERE postulat_paiement = '$postulatID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Affichage des paiements
        while ($row = $result->fetch_assoc()) {
            echo "Montant: " . $row["montant_paiement"] . "<br>";
            echo "Monnaie: " . $row["monnaie_paiement"] . "<br>";
            echo "Date de Règlement: " . $row["date_reglement_paiement"] . "<br>";
            echo "<br>";
        }
    } else {
        echo "Aucun paiement trouvé pour ce postulat.";
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
