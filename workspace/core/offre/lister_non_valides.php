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


// Requête SQL pour récupérer les offres du client spécifié
$sql = "SELECT * FROM offre WHERE date_validation_offre IS NULL";
$result = $conn->query($sql);
$html = '<h6 class="text-left">LISTE DES OFFRES A VALIDER</h6>';
if ($result->num_rows > 0) {
    // Affichage des offres
    while ($row = $result->fetch_assoc()) {
        $html .= '
        <table class="table">
            <tr>
                <td style="width: 50%;">
                    <small><b>' . $row["intitule_offre"] . '</b> <br> ' . $row["description_offre"] . '</small>
                </td>
                <td style="width: 35%;">
                    <small><b>' . $row["montant_offre"] . '</b> ' . $row["monnaie_offre"] . '/' . $row["unite_offre"].'</small>
                </td>            
                <td style="width: 15%; text-align: right;">
                    <a href="#" class="btn btn-sm btn-primary" onclick="valider_offre(' . $row["id_offre"] . ');">
                        <i class="bi bi-plus"></i>
                        Valider
                    </a>
                </td>
            </tr>
        </table>';
    }
}     

echo $html;

// Fermeture de la connexion à la base de données
$conn->close();
?>
