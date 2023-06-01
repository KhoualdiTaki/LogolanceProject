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

// Récupération des données du nouveau client à partir d'un formulaire (exemples de données)
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$dateNaissance = $_POST['date_naissance'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$adresse = $_POST['adresse'];
$raisonSociale = $_POST['raison_sociale'];
$login = $_POST['login'];
$password = $_POST['password'];
$dateSaisie = date('Y-m-d H:i:s'); // Date et heure actuelles

// Requête SQL d'insertion du nouveau client
$sql = "INSERT INTO client (nom_client, prenom_client, date_naissance_client, mobile_client, email_client, adresse_client, raison_sociale_client, login_client, password_client, date_saisie_client, etat_client)
        VALUES ('$nom', '$prenom', '$dateNaissance', '$mobile', '$email', '$adresse', '$raisonSociale', '$login', '$password', '$dateSaisie', 1)";

if ($conn->query($sql) === TRUE) {
    echo "Nouveau client ajouté avec succès !";
} else {
    echo "Erreur lors de l'ajout du client : " . $conn->error;
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
