<!DOCTYPE html>
<html>
<head>
    <title>Modifier le client</title>
</head>
<body>
    <h1>Modifier le client</h1>
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

    // Récupération de l'ID du client à charger (exemples de données)
    $idClient = $_GET['id_client'];

    // Requête SQL pour récupérer les informations du client
    $sql = "SELECT * FROM client WHERE id_client = $idClient";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Récupération des données du client
        $client = $result->fetch_assoc();
    } else {
        echo "Client non trouvé.";
        exit;
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
    ?>

    <form action="core/client/modifier.php" method="POST">
        <input type="hidden" name="id_client" value="<?php echo $client['id_client']; ?>">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo $client['nom_client']; ?>"><br><br>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $client['prenom_client']; ?>"><br><br>
        <label for="date_naissance">Date de naissance :</label>
        <input type="date" id="date_naissance" name="date_naissance" value="<?php echo $client['date_naissance_client']; ?>"><br><br>
        <label for="mobile">Mobile :</label>
        <input type="text" id="mobile" name="mobile" value="<?php echo $client['mobile_client']; ?>"><br><br>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo $client['email_client']; ?>"><br><br>
        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" value="<?php echo $client['adresse_client']; ?>"><br><br>
        <label for="raison_sociale">Raison sociale :</label>
        <input type="text" id="raison_sociale" name="raison_sociale" value="<?php echo $client['raison_sociale_client']; ?>"><br><br>
        <label for="login">Login :</label>
        <input type="text" id="login" name="login" value="<?php echo $client['login_client']; ?>"><br><br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password"><br><br>
        <label for="date_connexion">Date de connexion :</label>
        <input type="datetime-local" id="date_connexion" name="date_connexion" value="<?php echo $client['date_connexion_client']; ?>"><br><br>
        <label for="date_saisie">Date de saisie :</label>
        <input type="datetime-local" id="date_saisie" name="date_saisie" value="<?php echo $client['date_saisie_client']; ?>"><br><br>
        <label for="etat">État :</label>
        <input type="number" id="etat" name="etat" value="<?php echo $client['etat_client']; ?>"><br><br>

        <input type="submit" value="Enregistrer les modifications">
    </form>
</body>
</html>
