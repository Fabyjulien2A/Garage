<?php
// Connexion à la base de données
$dsn = 'mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage';
$username = '319891_faby';
$password = 'alwaysdatastudi';

try {
    $connexion = new PDO($dsn, $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour récupérer les données des véhicules
    $requete = "SELECT id, modele, photos, annee, energie, kilometrage, prix FROM vehicules;";
    $resultat = $connexion->query($requete);
    $data = $resultat->fetchAll(PDO::FETCH_ASSOC);

    // Renvoi des données au format JSON
    echo json_encode($data);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>