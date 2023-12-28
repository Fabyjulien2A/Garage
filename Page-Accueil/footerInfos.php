<?php
// Connexion à la base de données
$dsn = 'mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage';
$username = '319891_faby';
$password = 'alwaysdatastudi';

try {
    $connexion = new PDO($dsn, $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Supprimer les horaires existants
    $deleteQuery = "DELETE FROM horaires";
    $connexion->exec($deleteQuery);

    // Récupération des données du formulaire
    $monday = $_POST['lundi'];
    $tuesday = $_POST['mardi'];
    $wednesday = $_POST['mercredi'];
    $thursday = $_POST['jeudi'];
    $friday = $_POST['vendredi'];
    $saturday = $_POST['samedi'];
    $sunday = $_POST['dimanche'];

    // Requête d'insertion des nouveaux horaires
    $insertQuery = "INSERT INTO horaires (lundi, mardi, mercredi, jeudi, vendredi, samedi, dimanche) 
                    VALUES (:lundi, :mardi, :mercredi, :jeudi, :vendredi, :samedi, :dimanche)";
    
    $stmt = $connexion->prepare($insertQuery);

    // Liaison des paramètres
    $stmt->bindParam(':lundi', $monday);
    $stmt->bindParam(':mardi', $tuesday);
    $stmt->bindParam(':mercredi', $wednesday);
    $stmt->bindParam(':jeudi', $thursday);
    $stmt->bindParam(':vendredi', $friday);
    $stmt->bindParam(':samedi', $saturday);
    $stmt->bindParam(':dimanche', $sunday);

    // Exécution de la requête
    $stmt->execute(); 

    echo "Les horaires ont bien été modifiées!";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
} finally {
    // Fermer la connexion
    $connexion = null;
}

?>
