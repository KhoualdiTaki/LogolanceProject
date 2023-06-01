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

$conn->set_charset("utf8mb4");

// Requête SQL pour récupérer les réalisations par prestataire
$sql = "SELECT r.id_realisation, r.objet_realisation, r.description_realisation, r.image_realisation, r.lien_realisation, r.date_saisie_realisation, p.nom_prestataire, p.prenom_prestataire
        FROM realisation r
        INNER JOIN prestataire p ON r.prestataire_realisation = p.id_prestataire
        ORDER BY r.date_saisie_realisation DESC";
$result = $conn->query($sql);
    
$html = '
<div class="d-flex align-items-center justify-content-between mb-4">
    <h6>Liste des réalisations</h6>
</div>';

// Vérification du résultat de la requête
if ($result->num_rows > 0) {

    // Affichage des réalisations par prestataire
    while ($row = $result->fetch_assoc()) {
        $html .= '
        <table class="table">
            <tr>
                <td style="width: 20%;">
                    <img src="../uploads/' . $row["image_realisation"] . '" alt="' . $row["objet_realisation"] . '" style="height: 200px; width: 200px; object-fit: cover;">
                </td>
                <td style="width: 80%;">
                    <small>
                        <b>' . $row["objet_realisation"] . '</b><br>
                        Publiée le : ' . $row["date_saisie_realisation"] . '<br>
                        ' . $row["description_realisation"] . '<br>
                    </small>
                </td>           
            </tr>
        </table>';            
    }

    echo $html;
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
