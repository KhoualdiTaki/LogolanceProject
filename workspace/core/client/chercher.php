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

// Vérification de la soumission du formulaire de recherche
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchNom = $_POST["searchNom"];
    $searchPrenom = $_POST["searchPrenom"];

    // Requête SQL pour rechercher le client par nom et prénom
    $sql = "SELECT * FROM client WHERE nom_client LIKE '%$searchNom%' OR prenom_client LIKE '%$searchPrenom%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Affichage des clients correspondants sous forme de tableau
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Raison sociale</th>
                    <th>Login</th>
                    <th>Date de connexion</th>
                    <th>Date de saisie</th>
                    <th>État</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id_client"] . "</td>
                    <td>" . $row["nom_client"] . "</td>
                    <td>" . $row["prenom_client"] . "</td>
                    <td>" . $row["date_naissance_client"] . "</td>
                    <td>" . $row["mobile_client"] . "</td>
                    <td>" . $row["email_client"] . "</td>
                    <td>" . $row["adresse_client"] . "</td>
                    <td>" . $row["raison_sociale_client"] . "</td>
                    <td>" . $row["login_client"] . "</td>
                    <td>" . $row["date_connexion_client"] . "</td>
                    <td>" . $row["date_saisie_client"] . "</td>
                    <td>" . $row["etat_client"] . "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Aucun client trouvé.";
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
