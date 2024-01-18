<?php
session_start();
$bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');

// Vérifier que l'utilisateur est connecté
if (!$_SESSION['mdp']){
    header('location: connexion.php');
}

// Traitement de la suppression
if (isset($_POST['supprimer'])){
    if (!empty($_POST['id_service'])){
        $id_service = $_POST['id_service'];

        $deleteRepairService = $bdd->prepare("DELETE FROM services_reparations WHERE id = ?");
        $deleteRepairService->execute(array($id_service));

        echo "Le service de réparation a été supprimé avec succès.";
    } else {
        echo "Veuillez sélectionner un service à supprimer.";
    }
}

// Affichage de la liste des services de réparation
$query = $bdd->query("SELECT * FROM services_reparations");
$repairServices = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Supprimer un service de réparation</title>
    <link rel="stylesheet" href="../css/admin-employes-moderateur.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body id="body-suppression">
    <div class="container-fluid text-center">
        <h1 class="mt-5">Supprimer un service de réparation</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="id_service" class="form-label">Sélectionnez le service à supprimer :</label>
                <select class="form-select" name="id_service" id="id_service">
                    <?php foreach ($repairServices as $service): ?>
                        <option value="<?php echo $service['id']; ?>"><?php echo $service['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
        </form>
        <a href="espaceAdmin.php" class="btn btn-secondary mt-3">Retour espace administrateur</a>
    </div>
</body>
</html>
