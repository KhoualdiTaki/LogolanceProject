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

// Vérification de la soumission du formulaire de suppression de domaine
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idDomaine = $_POST["idDomaine"];

    // Requête SQL pour supprimer le domaine de la table
    $sql = "DELETE FROM domaine WHERE id_domaine = $idDomaine";

    if ($conn->query($sql) === TRUE) {
        echo "Le domaine a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du domaine : " . $conn->error;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
