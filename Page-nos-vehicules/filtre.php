<?php
// Récupération des paramètres de filtrage
$selectedYear = isset($_GET['year']) ? $_GET['year'] : '';
$selectedPrice = isset($_GET['price']) ? $_GET['price'] : '';
$selectedMileage = isset($_GET['mileage']) ? $_GET['mileage'] : '';

// Connexion à la base de données
$dsn = 'mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage';
$username = '319891_faby';
$password = 'alwaysdatastudi';
try {
    $connexion = new PDO($dsn, $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit();
}

//Requête SQL en fonction des paramètres de filtrage
$requete = "SELECT modele, photos, annee, energie, kilometrage, prix FROM vehicules WHERE 1";

$bindings = [];

if ($selectedYear) {
    $requete .= " AND annee = :year";
    $bindings['year'] = $selectedYear;
}

if ($selectedPrice) {
    $requete .= " AND prix <= :price";
    $bindings['price'] = $selectedPrice;
}

if ($selectedMileage) {
    $requete .= " AND kilometrage <= :mileage";
    $bindings['mileage'] = $selectedMileage;
}

// Préparation et exécution de la requête
$resultat = $connexion->prepare($requete);
$resultat->execute($bindings);

// Récupération des données filtrées
$filteredData = $resultat->fetchAll(PDO::FETCH_ASSOC);

// Fermeture de la connexion à la base de données
$connexion = null;

// Renvoi des données filtrées en tant que réponse JSON
header("Content-Type: application/json");
echo json_encode($filteredData);