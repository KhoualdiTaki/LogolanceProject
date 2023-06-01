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

// Requête SQL pour récupérer les réalisations par prestataire
$sql = "SELECT r.id_realisation, r.objet_realisation, r.description_realisation, r.image_realisation, r.lien_realisation, r.date_saisie_realisation, p.nom_prestataire, p.prenom_prestataire
        FROM realisation r
        INNER JOIN prestataire p ON r.prestataire_realisation = p.id_prestataire
        ORDER BY r.date_saisie_realisation DESC";
$result = $conn->query($sql);

// Vérification du résultat de la requête
if ($result->num_rows > 0) {
    // Affichage des réalisations par prestataire
    while ($row = $result->fetch_assoc()) {
        echo "ID : " . $row["id_realisation"] . "<br>";
        echo "Objet : " . $row["objet_realisation"] . "<br>";
        echo "Description : " . $row["description_realisation"] . "<br>";
        echo "Image : " . $row["image_realisation"] . "<br>";
        echo "Date de saisie : " . $row["date_saisie_realisation"] . "<br>";
        echo "Prestataire : " . $row["nom_prestataire"] . " " . $row["prenom_prestataire"] . "<br>";
        echo "<br>";
    }
} else {
    echo "Aucune réalisation trouvée.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
