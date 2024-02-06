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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez les services professionnels de vente et de réparation automobile de Vincent Parrot !">
    <link rel="stylesheet" href="../css/accueil.css">
    <link rel="stylesheet" href="../css/bootstrap.css">    
    <title>Garage V.Parrot</title>
</head>

<body>
    
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom bg-warning">
        <a href="../Page-Accueil\accueil.php"><img class="logo" src="../image\logo.jpg" alt="image"></a>
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

    <!-- Main Content -->
    <main class="main">
        <div class="cartes-container">
            <div class="row">
                <!-- Carte 1 -->
                <div class="col-sm-6 col-md-6">
                    <div class="card h-100">
                        <img src="../image/picture4.jpg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">Une expertise de qualité</h5>
                            <p class="card-text">Notre garage automobile est votre solution de confiance pour toutes réparations et entretiens de votre véhicule car notre objectif et de satisfaire notre clientèle.</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalComment">Voir les commentaires de nos clients</button>
                            <a href="../espace_employés/publierCommentaire.php" class="btn btn-primary">Laisser un commentaire</a>

                            <!-- Modal commentaires -->
                            <div class="modal fade" id="modalComment" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="ModalLabel">Avis clients</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php include 'recupererCommentaires.php' ;?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carte 2 -->
                <div class="col-sm-6 col-md-6">
                    <div class="card h-100">
                        <img src="../image/picture1.jpg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">Un atelier parfaitement équipé</h5>
                            <p class="card-text">Notre atelier est parfaitement équipé pour vous permettre de rouler en toute sécurité.</p>
                        </div>
                    </div>
                </div>

                <!-- Carte 3 -->
                <div class="col-sm-6 col-md-6">
                    <div class="card h-100">
                        <img src="../image/picture5.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Des vendeurs et vendeuses à l'écoute</h5>
                            <p class="card-text">Pour l'achat de vos véhicules, vous trouverez des vendeuses et vendeurs à votre écoute pour vous satisfaire.</p>
                        </div>
                    </div>
                </div>

                <!-- Carte 4 -->
                <div class="col-sm-6 col-md-6">
                    <div class="card h-100">
                        <img src="../image/reparation.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Réparations</h5>
                            <p class="card-text">Laissez votre véhicule entre les mains de vrais professionnels</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Voir nos prestations</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal prestations du garage -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Prestations du garage</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><?php include 'infosGarage.php';?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    
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
                <p class="etat-garage"><?php echo $etatGarage; ?></p>   
            </div>   

            <div class="col-sm-6 col-md-6 bg-warning">
                <h2 class="infos-pratiques">INFORMATIONS PRATIQUES :</h2>
                <P><br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
                    </svg>
                    ADRESSE : 3, RUE AUGUSTE PAUL 3000 TOULOUSE
                    <br><br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                    </svg>
                    ADRESSE EMAIL : parrot.v@gmail.com
                    <br><br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                    TÉLÉPHONE : 09 52 45 18 75 
                    <br><br>
                    <a href="../MentionsLegales/MentionsLegales.html" target="_blank">Mentions Légales</a> | <a href="../MentionsLegales/RGPD.html" target="_blank">Politique de confidentialité</a>
            </div>
                </P>
            </div>
            
        </div>
    <p class="copyright">Garage V.parrot Copyright 2023 </p>
    </footer>

 
</body>
</html>
