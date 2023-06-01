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
    $idPrestataire = $_POST["id_prestataire"];
    $nom = $_POST["nom_prestataire"];
    $prenom = $_POST["prenom_prestataire"];
    $dateNaissance = $_POST["date_naissance_prestataire"];
    $mobile = $_POST["mobile_prestataire"];
    $email = $_POST["email_prestataire"];
    $adresse = $_POST["adresse_prestataire"];
    $dateDebut = $_POST["date_debut_prestataire"];
    $experience = $_POST["experience_prestataire"];
    $niveau = $_POST["niveau_prestataire"];
    $login = $_POST["login_prestataire"];
    $password = $_POST["password_prestataire"];
    $dateConnexion = $_POST["date_connexion_prestataire"];
    $dateSaisie = $_POST["date_saisie_prestataire"];
    $etat = $_POST["etat_prestataire"];

    // Requête SQL pour modifier les informations du prestataire
    $sql = "UPDATE prestataire SET nom_prestataire = '$nom', prenom_prestataire = '$prenom', date_naissance_prestataire = '$dateNaissance', mobile_prestataire = '$mobile', email_prestataire = '$email', adresse_prestataire = '$adresse', date_debut_prestataire = '$dateDebut', experience_prestataire = '$experience', niveau_prestataire = '$niveau', login_prestataire = '$login', password_prestataire = '$password', date_connexion_prestataire = '$dateConnexion', date_saisie_prestataire = '$dateSaisie', etat_prestataire = '$etat' WHERE id_prestataire = $idPrestataire";
    $result = $conn->query($sql);

    // Vérification du résultat de la requête
    if ($result === TRUE) {
        echo "Le prestataire a été modifié avec succès.";
    } else {
        echo "Une erreur s'est produite lors de la modification du prestataire : " . $conn->error;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
