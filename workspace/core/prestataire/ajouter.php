<?php
// Variables contenant les informations du nouveau prestataire
$nom = $_POST['nom']; // Supposons que le nom soit envoyé via un formulaire POST
$prenom = $_POST['prenom']; // Supposons que le prénom soit envoyé via un formulaire POST
$dateNaissance = $_POST['date_naissance']; // Supposons que la date de naissance soit envoyée via un formulaire POST
$mobile = $_POST['mobile']; // Supposons que le numéro de mobile soit envoyé via un formulaire POST
$email = $_POST['email']; // Supposons que l'email soit envoyé via un formulaire POST
$adresse = $_POST['adresse']; // Supposons que l'adresse soit envoyée via un formulaire POST
$dateDebut = $_POST['date_debut']; // Supposons que la date de début soit envoyée via un formulaire POST
$experience = $_POST['experience']; // Supposons que l'expérience soit envoyée via un formulaire POST
$niveau = $_POST['niveau']; // Supposons que le niveau soit envoyé via un formulaire POST
$login = $_POST['login']; // Supposons que le nom d'utilisateur soit envoyé via un formulaire POST
$password = $_POST['password']; // Supposons que le mot de passe soit envoyé via un formulaire POST

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

// Requête SQL pour insérer un nouveau prestataire dans la table 'prestataire'
$sql = "INSERT INTO prestataire (nom_prestataire, prenom_prestataire, date_naissance_prestataire, mobile_prestataire, email_prestataire, adresse_prestataire, date_debut_prestataire, experience_prestataire, niveau_prestataire, login_prestataire, password_prestataire) VALUES ('$nom', '$prenom', '$dateNaissance', '$mobile', '$email', '$adresse', '$dateDebut', '$experience', '$niveau', '$login', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Nouveau prestataire ajouté avec succès.";
} else {
    echo "Erreur lors de l'ajout du prestataire : " . $conn->error;
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
