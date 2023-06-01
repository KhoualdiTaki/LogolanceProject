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

// Vérification si les données ont été soumises via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération de l'ID de l'offre
    $offreID = $_POST['idf'];
    $html = '
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6>Liste des postulats</h6>
    </div>';

    // Requête SQL pour récupérer les postulats de l'offre spécifiée
    $sql = "SELECT pr.*, po.* 
              FROM prestataire pr, postulat po 
             WHERE po.offre_postulat = '$offreID' AND po.prestataire_postulat = pr.id_prestataire";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Affichage des postulats
        while ($row = $result->fetch_assoc()) {
            $btn = (isset($row["date_validation_postulat"])) ? '' : '
            <a href="#" class="btn btn-sm btn-success" onclick="valider_postulat(' . $row["id_postulat"] . ');">
                <i class="bi bi-check"></i>
                Valider
            </a>';
            $html .= '
            <table class="table">
                <tr>
                    <td style="width: 50%;">
                        <small>
                            <b>' . $row["nom_prestataire"] . ' ' . $row["prenom_prestataire"] . '</b>
                            <br>
                            Postulat soumise le : ' . $row["date_saisie_postulat"] . '
                            <br>
                            ' . $row["experience_prestataire"] . '
                            <br>
                            <a href="#" onclick="lister_realisations(' . $row["id_prestataire"] . ');">
                                Liste des réalisations
                            </a>
                        </small>
                    </td>           
                    <td style="width: 50%; text-align: right;">

                        <a href="#" class="btn btn-sm btn-primary" onclick="lister_livraisons(' . $row["id_postulat"] . ');">
                            <i class="bi bi-list"></i>
                            Livraisons
                        </a>
                        '.$btn.'
                    </td>
                </tr>
            </table>';            
        }
    } 
    echo $html;
} else {
    echo 'Erreur : aucune donnée reçue. <a href="../../index_client.php">Retour à la page d\'accueil</a>';
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
