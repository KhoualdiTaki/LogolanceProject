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

// Requête SQL pour récupérer tous les clients
$sql = "SELECT * FROM client";
$result = $conn->query($sql);
$html = '<h6>LISTE DES CLIENTS</h6>';
if ($result->num_rows > 0) {
    // Affichage des clients sous forme de tableau
    $html .= '<table class="table">
            <tr>
                <th>Client</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Date de saisie</th>
            </tr>';

    while ($row = $result->fetch_assoc()) {
        $html .="<tr>
                <td>" . $row["nom_client"] . "<br>" . $row["prenom_client"] . "<br>" . $row["date_naissance_client"] . "</td>
                <td>" . $row["mobile_client"] . "</td>
                <td>" . $row["email_client"] . "</td>
                <td>" . $row["adresse_client"] . "</td>
                <td>" . $row["date_saisie_client"] . "</td>
            </tr>";
    }

    echo "</table>";
} 

echo $html;

// Fermeture de la connexion à la base de données
$conn->close();
?>
