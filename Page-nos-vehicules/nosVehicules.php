<?php
    // Récupération de l'état actuel du garage et des horaires depuis la base de données
    $dsn = 'mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage';
    $username = '319891_faby';
    $password = 'alwaysdatastudi';

    try {
        $connexion = new PDO($dsn, $username, $password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération de l'état du garage
        $query = $connexion->query("SELECT etat FROM garage");
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $etatGarage = $result['etat'];
        } else {
            echo "L'état du garage n'est pas disponible.";
        }

        // Récupération des horaires du garage
        $queryHoraires = $connexion->query("SELECT lundi, mardi, mercredi, jeudi, vendredi, samedi, dimanche FROM horaires");
        $resultHoraires = $queryHoraires->fetch(PDO::FETCH_ASSOC);

        if ($resultHoraires) {
            $horaires = $resultHoraires;
        } else {
            echo "Les horaires ne sont pas disponibles.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    } finally {
        // Fermer la connexion dans le bloc finally
        $connexion = null;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/nosVehicules.css">
    <title>ECF GARAGE</title>
</head>
<body>
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom bg-warning">
        <a href="../Page-nos-vehicules\nosVehicules.php"><img class="logo" src="../image\logo.jpg" alt="image"></a>
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li class="nav-item">
                <a class="nav-link px-2 outline-primary me-2" href="../Page-Accueil/accueil.php">ACCUEIL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2 outline-primary me-2" href="../Page-nos-vehicules/nosVehicules.php">NOS VEHICULES</a>
            </li>
        </ul>
        <div class="col-md-3 text-end">
            <a href="../Administrateur/connexion.php">
                <button type="button" class="btn btn-outline-primary me-2">Espace administateur/Espace employés</button>
            </a>
        </div>
    </header>

<div class="container-fluid">
    <!-- Filtres -->
    <div class="row">
        <div class="col-md-4">
            <label for="year-filter">Année :</label>
            <select id="year-filter" class="form-select">
                <option value="">Toutes les années</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="price-filter">Prix :</label>
            <select id="price-filter" class="form-select">
                <option value="">Tous les prix</option>
                <option value="10000">10 000 € et moins</option>
                <option value="20000">20 000 € et moins</option>
                <option value="30000">30 000 € et moins</option>
                <option value="40000">40 000 € et moins</option>
                <option value="50000">50 000 € et moins</option>
                <option value="60000">60 000 € et moins</option>
                <option value="70000">70 000 € et moins</option>
                <option value="80000">80 000 € et moins</option>
                <option value="90000">90 000 € et moins</option>
                <option value="100000">100 000 € et moins</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="mileage-filter">Kilométrage :</label>
            <select id="mileage-filter" class="form-select">
                <option value=""></option>
                <option value="50000">50 000 km et moins</option>
                <option value="100000">100 000 km et moins</option>
                <option value="200000">200 000 km et moins</option>
            </select>
        </div>
    </div>

    <!-- Bouton validation filtres -->
    <div class="text-center">
        <button id="filter-button" class="btn btn-primary">Filtrer</button>
    </div>

    <!-- Liste des véhicules -->
    <div class="row" id="cartes-container">
      
    </div>
</div>
<br>
<footer class="footer">
        <div class="container"></div>

        <div class="row">
            <div class="col-sm-6 col-md-6  bg-warning">
                <h2 class="horaires">HORAIRES:</h2>
                <ul>
                <li>LUNDI : <?php echo isset( $resultHoraires['lundi']) ?  $resultHoraires['lundi'] : 'Non disponible'; ?></li>
                <li>MARDI : <?php echo isset( $resultHoraires['mardi']) ?  $resultHoraires['mardi'] : 'Non disponible'; ?></li>
                <li>MERCREDI : <?php echo isset( $resultHoraires['mercredi']) ?  $resultHoraires['mercredi'] : 'Non disponible'; ?></li>
                <li>JEUDI : <?php echo isset( $resultHoraires['jeudi']) ?  $resultHoraires['jeudi'] : 'Non disponible'; ?></li>
                <li>VENDREDI : <?php echo isset( $resultHoraires['vendredi']) ?   $resultHoraires['vendredi'] : 'Non disponible'; ?></li>
                <li>SAMEDI : <?php echo isset( $resultHoraires['samedi']) ?  $resultHoraires['samedi'] : 'Non disponible'; ?></li>
                <li>DIMANCHE : <?php echo isset( $resultHoraires['dimanche']) ?  $resultHoraires['dimanche'] : 'Non disponible'; ?></li>
            </ul>
            </div>   

            <div class="col-sm-6 col-md-6 bg-warning">
                <h2 class="infos-pratiques">INFORMATIONS PRATIQUES :</h2>
                <P>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
                    </svg>
                    ADRESSE : 3, RUE AUGUSTE PAUL 3000 TOULOUSE
                    <br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                    </svg>
                    ADRESSE EMAIL : jejor73591@msback.com 
                    <br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                    TÉLÉPHONE : 09 52 45 18 75 
                </P>
            </div>
        </div>
        <p class="copyright">Garage V.parrot Copyright 2023 </p>
    </footer>

<script src="../js/script.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>
