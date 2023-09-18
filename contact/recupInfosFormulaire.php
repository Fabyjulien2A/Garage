<?php
try {
    $bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activation de la gestion des erreurs
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Fonction pour récupérer les demandes en fonction du sujet

function getDemandes($sujet) {
    global $bdd;
    if ($sujet === "support") {
        $table = 'tickets_support';
    } elseif ($sujet === "sav") {
        $table = 'demandes_sav';
    } elseif ($sujet === "demande") {
        $table = 'demandes_informations';
    }

    $requete = $bdd->prepare("SELECT id, nom, prenom, email, telephone, message FROM $table");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des demandes</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container-fluid">
        <h1 class="display-4">Liste des demandes</h1>
        <h2>Demandes de support technique :</h2>
        <ul class="list-group">
        <?php
$demandesSupport = getDemandes("support");
foreach ($demandesSupport as $demande) {
    echo '<li class="list-group-item">
        <div class="row">
            <div class="col-md-2">Nom :</div>
            <div class="col-md-10">' . (isset($demande['nom']) ? $demande['nom'] : '') . '</div>
        </div>
        <div class="row">
            <div class="col-md-2">Prénom :</div>
            <div class="col-md-10">' . (isset($demande['prenom']) ? $demande['prenom'] : '') . '</div>
        </div>
        <div class="row">
            <div class="col-md-2">Email :</div>
            <div class="col-md-10">' . (isset($demande['email']) ? $demande['email'] : '') . '</div>
        </div>
        <div class="row">
            <div class="col-md-2">Téléphone :</div>
            <div class="col-md-10">' . (isset($demande['telephone']) ? $demande['telephone'] : '') . '</div>
        </div>
        <div class="row">
            <div class="col-md-2">Message :</div>
            <div class="col-md-10">' . (isset($demande['message']) ? nl2br($demande['message']) : '') . '</div>
        </div>
        <form method="POST" action="supprimerDemandeSupport.php">
            <input type="hidden" name="id" value="' . (isset($demande['id']) ? $demande['id'] : '') . '">
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </li>';
}
?>
        </ul>

        <h2>Demandes de service après vente :</h2>
        <ul class="list-group">
            <?php
            $demandesSAV = getDemandes("sav");
            foreach ($demandesSAV as $demande) {
                echo '<li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">Nom :</div>
                    <div class="col-md-10">' . (isset($demande['nom']) ? $demande['nom'] : '') . '</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Prénom :</div>
                    <div class="col-md-10">' . (isset($demande['prenom']) ? $demande['prenom'] : '') . '</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Email :</div>
                    <div class="col-md-10">' . (isset($demande['email']) ? $demande['email'] : '') . '</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Téléphone :</div>
                    <div class="col-md-10">' . (isset($demande['telephone']) ? $demande['telephone'] : '') . '</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Message :</div>
                    <div class="col-md-10">' . (isset($demande['message']) ? nl2br($demande['message']) : '') . '</div>
                </div>
                <form method="POST" action="supprimerDemandeSav.php">
                    <input type="hidden" name="id" value="' . (isset($demande['id']) ? $demande['id'] : '') . '">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </li>';
        }
            ?>
        </ul>

        <h2>Demandes d'informations :</h2>
        <ul class="list-group">
            <?php
            $demandesInfo = getDemandes("demande");
            foreach ($demandesInfo as $demande) {
                echo '<li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">Nom :</div>
                    <div class="col-md-10">' . (isset($demande['nom']) ? $demande['nom'] : '') . '</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Prénom :</div>
                    <div class="col-md-10">' . (isset($demande['prenom']) ? $demande['prenom'] : '') . '</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Email :</div>
                    <div class="col-md-10">' . (isset($demande['email']) ? $demande['email'] : '') . '</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Téléphone :</div>
                    <div class="col-md-10">' . (isset($demande['telephone']) ? $demande['telephone'] : '') . '</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Message :</div>
                    <div class="col-md-10">' . (isset($demande['message']) ? nl2br($demande['message']) : '') . '</div>
                </div>
                <form method="POST" action="supprimerDemandeInformations.php">
                    <input type="hidden" name="id" value="' . (isset($demande['id']) ? $demande['id'] : '') . '">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </li>';
        }
            ?>
        </ul>

        <a href="../Administrateur/espaceAdmin.php" class="btn btn-primary mt-3">Retour espace administrateur</a>
        <a href="../espace_employés/espaceEmployes.php" class="btn btn-primary mt-3">Retour espace employés</a>
    </div>
</body>
</html>