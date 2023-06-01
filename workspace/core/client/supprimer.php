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

// Récupération de l'ID du client à supprimer (exemples de données)
$idClient = $_GET['id_client'];

// Requête SQL de suppression du client
$sql = "DELETE FROM client WHERE id_client = $idClient";

if ($conn->query($sql) === TRUE) {
    echo "Client supprimé avec succès !";
} else {
    echo "Erreur lors de la suppression du client : " . $conn->error;
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
