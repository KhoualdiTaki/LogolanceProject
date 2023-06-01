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
    <h6>LISTE DES DOMAINES</h6>
    <a href="#" class="btn btn-sm btn-primary" title="Ajouter un nouveau domaine" onclick="ajouter_domaine();">
        <small>
            <i class="bi bi-plus"></i>
            Nouveau
        </small>
    </a>    
</div>';
if ($result->num_rows > 0) {
    // Affichage des domaines sous forme de tableau
    while ($row = $result->fetch_assoc()) {
        $html .= '
        <form action="core/domaine/modifier.php" method="post">
            <input type="hidden" name="idDomaine" value="' . $row["id_domaine"] . '">
            <table class="table">
                <tr>
                    <td style="width: 90%;">
                        <small>
                            <input type="text" name="intituleDomaine" value="' . $row["intitule_domaine"] . '"
                                    style="background-color: transparent; border: none; border-bottom: soid 1px #ccc;
                                            padding: 8px;">
                        </small>
                    </td>
                    <td style="width: 10%; text-align: right;">
                        <small>
                            <input type="submit" value="Enregistrer" class="btn btn-sm btn-primary">
                        </small>
                    </td>
                </tr>
            </table>
        </form>';
        
    }

   
} 

echo $html;

// Fermeture de la connexion à la base de données
$conn->close();
?>
