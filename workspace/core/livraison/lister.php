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

// Récupération de l'ID du postulat à partir de la requête GET
$idPostulat = $_GET["idPostulat"];

// Requête SQL pour récupérer les livraisons associées à l'ID du postulat
$sql = "SELECT * FROM livraison WHERE id_postulat = $idPostulat";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Affichage des livraisons
    while ($row = $result->fetch_assoc()) {
        echo "ID Livraison : " . $row["id_livraison"] . "<br>";
        echo "Numéro de livraison : " . $row["numero_livraison"] . "<br>";
        echo "Manière de livraison : " . $row["maniere_livraison"] . "<br>";
        echo "Lien de livraison : " . $row["lien_livraison"] . "<br>";
        echo "Date de saisie de livraison : " . $row["date_saisie_livraison"] . "<br>";
        echo "État de livraison : " . $row["etat_livraison"] . "<br>";
        echo "<br>";
    }
} else {
    echo "Aucune livraison trouvée pour cet ID de postulat.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
