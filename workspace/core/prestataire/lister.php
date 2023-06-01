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

// Requête SQL pour récupérer tous les prestataires
$sql = "SELECT * FROM prestataire";
$result = $conn->query($sql);
$html = '<h6>LISTE DES PRESTATAIRES</h6>';
// Vérification du résultat de la requête
if ($result->num_rows > 0) {
    // Affichage des prestataires
    while ($row = $result->fetch_assoc()) {
        $html .= "<p>ID : " . $row['id_prestataire'] . " | ";
        $html .=  "Nom : " . $row['nom_prestataire'] . " | ";
        $html .=  "Prénom : " . $row['prenom_prestataire'] . " | ";
        $html .=  "Date de naissance : " . $row['date_naissance_prestataire'] . " | ";
        $html .=  "Mobile : " . $row['mobile_prestataire'] . " | ";
        $html .=  "Email : " . $row['email_prestataire'] . " | ";
        $html .=  "Adresse : " . $row['adresse_prestataire'] . " | ";
        $html .=  "Date de début : " . $row['date_debut_prestataire'] . " | ";
        $html .=  "Expérience : " . $row['experience_prestataire'] . " | ";
        $html .=  "Niveau : " . $row['niveau_prestataire'] . "</p>";
    }
} 

echo $html;

// Fermeture de la connexion à la base de données
$conn->close();
?>