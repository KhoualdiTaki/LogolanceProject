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

// Vérification de la soumission du formulaire d'ajout de domaine
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $intituleDomaine = $_POST["intituleDomaine"];

    // Requête SQL pour ajouter un domaine à la table
    $sql = "INSERT INTO domaine (intitule_domaine, etat_domaine) VALUES ('$intituleDomaine', 1)";

    if ($conn->query($sql) === TRUE) {
        echo "Le domaine a été ajouté avec succès.";
        header('location: ../../index.php');
    } else {
        echo "Erreur lors de l'ajout du domaine : " . $conn->error;
        echo '<br><br><a href="../../index.php>Retour</a>';
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
