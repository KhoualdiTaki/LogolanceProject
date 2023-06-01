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

// Vérification de la soumission du formulaire de modification de domaine
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idDomaine = $_POST["idDomaine"];
    $intituleDomaine = $_POST["intituleDomaine"];

    // Requête SQL pour mettre à jour le domaine dans la table
    $sql = "UPDATE domaine SET intitule_domaine = '$intituleDomaine' WHERE id_domaine = $idDomaine";

    if ($conn->query($sql) === TRUE) {
        echo "Le domaine a été modifié avec succès.";
        header('location: ../../index.php');
    } else {
        echo "Erreur lors de la modification du domaine : " . $conn->error;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
