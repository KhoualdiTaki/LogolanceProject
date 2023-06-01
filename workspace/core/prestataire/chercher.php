<?php
// Variable contenant le nom ou prénom à rechercher
$searchQuery = $_POST['searchQuery']; // Supposons que la recherche soit envoyée via un formulaire POST

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

// Requête SQL pour rechercher le prestataire par nom ou prénom
$sql = "SELECT * FROM prestataire WHERE nom_prestataire LIKE '%$searchQuery%' OR prenom_prestataire LIKE '%$searchQuery%'";
$result = $conn->query($sql);

// Vérification du résultat de la requête
if ($result->num_rows > 0) {
    // Affichage des résultats de la recherche
    while ($row = $result->fetch_assoc()) {
        echo "ID : " . $row['id_prestataire'] . "<br>";
        echo "Nom : " . $row['nom_prestataire'] . "<br>";
        echo "Prénom : " . $row['prenom_prestataire'] . "<br>";
        echo "Date de naissance : " . $row['date_naissance_prestataire'] . "<br>";
        echo "Mobile : " . $row['mobile_prestataire'] . "<br>";
        echo "Email : " . $row['email_prestataire'] . "<br>";
        echo "Adresse : " . $row['adresse_prestataire'] . "<br>";
        echo "Date de début : " . $row['date_debut_prestataire'] . "<br>";
        echo "Expérience : " . $row['experience_prestataire'] . "<br>";
        echo "Niveau : " . $row['niveau_prestataire'] . "<br>";
        echo "<br>";
    }
} else {
    echo "Aucun résultat trouvé pour la recherche : " . $searchQuery;
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
