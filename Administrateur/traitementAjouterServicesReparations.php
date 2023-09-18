<?php
    // Connexion à la base de données
    $bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');

    // Récupération des données dans le formulaire formulaire
    
    $name = $_POST['nom'];

   


    // Préparer la requête SQL d'insertion
    $insertRepairServices = $bdd->prepare("INSERT INTO services_reparations (nom) VALUES (?)");
    $insertRepairServices->execute(array($name));

    // Message de confirmation
    echo "Les informations ont bien été insérées dans la base de données.";
?>

<a href="espaceAdmin.php">Retour espace administrateur</a>