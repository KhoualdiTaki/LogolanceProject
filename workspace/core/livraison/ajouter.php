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

// Vérification de la soumission du formulaire d'ajout de livraison
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeroLivraison = md5(date('Y-m-d H:i:s.u'));
    $maniereLivraison = $_POST["maniereLivraison"];
    $lienLivraison = $_POST["lienLivraison"];
    $etatLivraison = $_POST["etatLivraison"];
    $idPostulat = $_POST["idPostulat"];

    // Requête SQL pour insérer une nouvelle livraison dans la table
    $sql = "INSERT INTO livraison (numero_livraison, maniere_livraison, lien_livraison, etat_livraison, id_postulat)
            VALUES ('$numeroLivraison', '$maniereLivraison', '$lienLivraison', '$etatLivraison', $idPostulat)";

    if ($conn->query($sql) === TRUE) {
        echo "La livraison a été ajoutée avec succès.";
    } else {
        echo "Erreur lors de l'ajout de la livraison : " . $conn->error;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
