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
    // Récupération de l'ID du prestataire
    $prestataireID = $_POST['prestataireID'];

    // Requête SQL pour récupérer les postulats du prestataire spécifié
    $sql = "SELECT * FROM postulat WHERE prestataire_postulat = '$prestataireID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Affichage des postulats
        while ($row = $result->fetch_assoc()) {
            echo "Appréciation du postulat : " . $row['appreciation_postulat'] . "<br>";
            echo "Date de saisie du postulat : " . $row['date_saisie_postulat'] . "<br>";
            echo "Date de validation du postulat : " . $row['date_validation_postulat'] . "<br>";
            echo "<br>";
        }
    } else {
        echo "Aucun postulat trouvé pour ce prestataire.";
    }
} else {
    echo "Erreur : aucune donnée reçue.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
