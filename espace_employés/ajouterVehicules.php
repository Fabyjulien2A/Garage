<?php
session_start();
if (!isset($_SESSION['mdp'])){
    header('location: ../Administrateur/connexion.php');
}

// Génére un nouveau jeton CSRF si la session n'en a pas déjà un
if (!isset($_SESSION['csrf_token'])) {
    $token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $token;
} else {
    $token = $_SESSION['csrf_token'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/admin-employes-moderateur.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Ajouter un véhicule</title>
</head>
<body id="body-ajouter-vehicule">
    <div class="container-fluid">
        <h1 class="text-center">Ajouter un véhicule</h1>
        <form action="traitementAjoutVehicules.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="modele">Modèle:</label>
                <input type="text" class="form-control" name="modele" required>
            </div>

            <div class="mb-3">
                <label for="kilometrage">Kilométrage:</label>
                <input type="number" class="form-control" name="kilometrage" required>
            </div>

            <div class="mb-3">
                <label for="year">Année :</label>
                <input type="number" class="form-control" name="annee" id="year" required>
            </div>

            <div class="mb-3">
                <label for="price">Prix :</label>
                <input type="number" class="form-control" name="prix" id="price" required>
            </div>

            <div class="mb-3">
                <label for="photo">Photo principale:</label>
                <input type="file" class="form-control" name="photo" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="equipment">Equipements :</label>
                <textarea class="form-control" name="equipements" id="equipment" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label for="equipment_conduct">Equipements conduite :</label>
                <textarea class="form-control" name="equipements_conduite" id="equipment_conduct" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label for="name_motor">Nom du moteur :</label>
                <input type="text" class="form-control" name="nom_du_moteur" id="name_motor" required>
            </div>

            <div class="mb-3">
               <label for="energie">Energie:</label>
               <select class="form-select" name="energie" id="energie" required>
               <option value="essence">Essence</option>
               <option value="diesel">Diesel</option>
               <option value="electrique">Electrique</option>
               <option value="hybride">Hybride</option>
               </select>
            </div>

            <div class="mb-3">
                <label for="power">Puissance (cv) :</label>
                <input type="text" class="form-control" name="puissance" id="power" required>
            </div>

            <div class="mb-3">
               <label for="transmission">Transmission:</label>
               <select class="form-select" name="transmission" id="transmission" required>
               <option value="automatique">Automatique</option>
               <option value="manuelle">Manuelle</option>
               </select>
            </div>

            <div class="mb-3">
                <label for="photos_galerie">Photos de la galerie:</label>
                <input type="file" class="form-control" name="photos_galerie[]" accept="image/*" multiple>
            </div>

             <!--CSRF -->
             <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <a href="../espace_employés/espaceEmployes.php" class="btn btn-primary btn-block mt-3">Retour espace employé</a>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
