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
    $offreID = $_POST['offreID'];
    $intitule = $_POST['intitule'];
    $description = $_POST['description'];
    $montant = $_POST['montant'];
    $monnaie = $_POST['monnaie'];
    $unite = $_POST['unite'];

    // Requête SQL pour modifier l'offre
    $sql = "UPDATE offre SET intitule_offre = '$intitule', description_offre = '$description', montant_offre = $montant, monnaie_offre = '$monnaie', unite_offre = '$unite' WHERE id_offre = $offreID";

    if ($conn->query($sql) === TRUE) {
        echo "L'offre a été modifiée avec succès.";
    } else {
        echo "Erreur lors de la modification de l'offre : " . $conn->error;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
