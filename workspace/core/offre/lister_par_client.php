<?php session_start(); ob_start();

$client = isset($_SESSION['client']) ? $_SESSION['client'] : header('location: ../client/deconnecter.php');

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logolence_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupération de l'ID du client à partir du formulaire
$clientID = $client['id_client'];

// Requête SQL pour récupérer les offres du client spécifié
$sql = "SELECT * FROM offre WHERE client_offre = $clientID";
$result = $conn->query($sql);
$html = '
<div class="d-flex align-items-center justify-content-between mb-4">
    <h6>Mes offres</h6>
</div>';
if ($result->num_rows > 0) {
    // Affichage des offres
    while ($row = $result->fetch_assoc()) {
        $html .= '
            <table class="table">
                <tr>
                    <td style="width: 45%;">
                        <small><b>' . $row["intitule_offre"] . '</b> <br> ' . $row["description_offre"] . '</small>
                    </td>
                    <td style="width: 30%;">
                        <small><b>' . $row["montant_offre"] . '</b> ' . $row["monnaie_offre"] . '/' . $row["unite_offre"].'</small>
                    </td>            
                    <td style="width: 25%; text-align: right;">
                        <a href="#" class="btn btn-sm btn-primary" onclick="lister_postulats(' . $row["id_offre"] . ');">
                            <i class="bi bi-list"></i>
                            Postulats
                        </a>
                        <a href="#" class="btn btn-sm btn-danger" onclick="supprimer_offre(' . $row["id_offre"] . ');">
                            <i class="bi bi-x"></i>
                            Supprimer
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
