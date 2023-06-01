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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $objet = $_POST["objet_realisation"];
    $description = $_POST["description_realisation"];
    $image = $_POST["image_realisation"];
    $prestataire = $_POST["prestataire_realisation"];
    $domaine = $_POST["domaine_realisation"];

    // Requête SQL pour ajouter une nouvelle réalisation
    $sql = "INSERT INTO realisation (objet_realisation, description_realisation, image_realisation, prestataire_realisation, domaine_realisation) VALUES ('$objet', '$description', '$image', '$lien', '$prestataire', '$domaine')";
    $result = $conn->query($sql);

    // Vérification du résultat de la requête
    if ($result === TRUE) {
        echo "La réalisation a été ajoutée avec succès.";
    } else {
        echo "Une erreur s'est produite lors de l'ajout de la réalisation : " . $conn->error;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
