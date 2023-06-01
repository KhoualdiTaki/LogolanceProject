<?php
// Connexion à la base de données
$servername = "localhost";
$username = "nom_utilisateur";
$password = "mot_de_passe";
$dbname = "nom_base_de_données";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération de l'ID du domaine à partir du formulaire
    $domaineID = $_POST['domaineID'];

    // Requête SQL pour récupérer les offres du domaine spécifié
    $sql = "SELECT * FROM offre WHERE domaine_offre = $domaineID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Affichage des offres
        while ($row = $result->fetch_assoc()) {
            echo "ID offre : " . $row["id_offre"] . "<br>";
            echo "Intitulé : " . $row["intitule_offre"] . "<br>";
            echo "Description : " . $row["description_offre"] . "<br>";
            echo "Montant : " . $row["montant_offre"] . "<br>";
            echo "Monnaie : " . $row["monnaie_offre"] . "<br>";
            echo "Unité : " . $row["unite_offre"] . "<br>";
            echo "<br>";
        }
    } else {
        echo "Aucune offre trouvée pour ce domaine.";
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
