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

// Vérification de la soumission du formulaire d'ajout d'offre
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $intituleOffre = $_POST["intituleOffre"];
    $descriptionOffre = $_POST["descriptionOffre"];
    $montantOffre = $_POST["montantOffre"];
    $monnaieOffre = $_POST["monnaieOffre"];
    $uniteOffre = $_POST["uniteOffre"];
    $clientOffre = $_POST["clientOffre"];
    $domaineOffre = $_POST["domaineOffre"];

    // Requête SQL pour insérer une nouvelle offre dans la table
    $sql = "INSERT INTO offre (intitule_offre, description_offre, montant_offre, monnaie_offre, unite_offre, client_offre, domaine_offre)
            VALUES ('$intituleOffre', '$descriptionOffre', $montantOffre, '$monnaieOffre', '$uniteOffre', $clientOffre, $domaineOffre)";

    if ($conn->query($sql) === TRUE) {
        echo "L'offre a été ajoutée avec succès.";
        header('location: ../../index_client.php');
    } else {
        echo "Erreur lors de l'ajout de l'offre : " . $conn->error;
        echo '<br><br>a href="../../index_client.php">Retour</a>';
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
