<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dsn = 'mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage';
    $username = '319891_faby';
    $password = 'alwaysdatastudi';

    // Récupérez la nouvelle valeur de l'état depuis le formulaire
    $nouvelEtat = $_POST['etat'];

    try {
        // Connection base de données
        $connexion = new PDO($dsn, $username, $password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Mettre à jour l'etat du garage dans la table "garage"
        $query = $connexion->prepare("UPDATE garage SET etat = :etat");
        $query->bindParam(':etat', $nouvelEtat);
        $query->execute();

        // Redirection vers l'espace administrateur après la mise à jour
        header("Location: espaceAdmin.php");
        exit;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>