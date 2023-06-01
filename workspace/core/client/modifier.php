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

// Récupération des données mises à jour du client à partir d'un formulaire (exemples de données)
$idClient = $_POST['id_client'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$dateNaissance = $_POST['date_naissance'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$adresse = $_POST['adresse'];
$raisonSociale = $_POST['raison_sociale'];
$login = $_POST['login'];
$password = $_POST['password'];

// Requête SQL de mise à jour du client
$sql = "UPDATE client SET
        nom_client = '$nom',
        prenom_client = '$prenom',
        date_naissance_client = '$dateNaissance',
        mobile_client = '$mobile',
        email_client = '$email',
        adresse_client = '$adresse',
        raison_sociale_client = '$raisonSociale',
        login_client = '$login',
        password_client = '$password'
        WHERE id_client = $idClient";

if ($conn->query($sql) === TRUE) {
    echo "Client mis à jour avec succès !";
} else {
    echo "Erreur lors de la mise à jour du client : " . $conn->error;
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
