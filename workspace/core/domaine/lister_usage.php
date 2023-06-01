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

// Requête SQL pour récupérer la liste des domaines
$sql = "SELECT * FROM domaine";
$result = $conn->query($sql);
$html = '
<div class="d-flex align-items-center justify-content-between mb-4">
    <h6>Domaines</h6>
</div>';
if ($result->num_rows > 0) {
    // Affichage des domaines sous forme de tableau

    while ($row = $result->fetch_assoc()) {
        $html .= '
            <table class="table">
                <tr>
                    <td style="width: 85%;">
                        <small>' . $row["intitule_domaine"] . '</small>
                    </td>
                    <td style="width: 15%; text-align: right;">
                        <a href="#" class="btn btn-sm btn-primary" onclick="ajouter_offre(' . $row["id_domaine"] . ');">
                            <i class="bi bi-plus"></i>
                            offre
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
