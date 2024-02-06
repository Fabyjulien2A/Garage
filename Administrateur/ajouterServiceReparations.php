<?php
session_start();
$bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');
if (!$_SESSION['mdp']){
    header('location: connexion.php');
}

if (isset($_POST['ajouter'])){
    if (!empty($_POST['nom'])){
    
    
    $name = htmlspecialchars($_POST['nom']);



    $insertRepairServices = $bdd->prepare("INSERT INTO services_reparations (nom) VALUES (?)");
    
    $insertRepairServices->execute(array($name));

    echo "Les informations ont bien été insérées dans la base de données";
    }else{
    echo "Veuillez completer tous les champs";
    }
}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-employes-moderateur.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Ajouter un nouveau service de réparation</title>
</head>
<body id="body-reparation">
    <div class="container-fluid text-center">
        <h2 class="mt-5">Ajouter un nouveau service de réparation</h2>
        <form method="POST" action="traitementAjouterServicesReparations.php" class="mt-3">
            <div class="mb-3">
                <label for="name" class="form-label">Nom :</label>
                <input type="text" class="form-control" name="nom" id="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</body>
</html>