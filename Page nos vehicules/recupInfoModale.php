<?php
session_start();
// Connexion à la base de données
$dsn = 'mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage';
$username = '319891_faby';
$password = 'alwaysdatastudi';

try {
    $connexion = new PDO($dsn, $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification si l'index est passé en tant que paramètre dans l'URL
    if (isset($_GET['index'])) {
        $index = intval($_GET['index']); 

        // Requête SQL pour récupérer les données du véhicule en fonction de l'index
        $requete = "SELECT photos_galerie, equipements, equipements_conduite, nom_du_moteur, puissance, transmission FROM vehicules LIMIT 1 OFFSET :index";
        $statement = $connexion->prepare($requete);
        $statement->bindParam(':index', $index, PDO::PARAM_INT);
        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Renvoi données au format JSON
        echo json_encode($data);
    } else {
        echo "L'index du véhicule n'a pas été spécifié.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>