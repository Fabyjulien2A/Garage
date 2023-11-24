<?php
session_start();

if (!isset($_SESSION['mdp'])) {
    header('location: ../Administrateur/connexion.php');
}

// Générer un nouveau jeton CSRF si la session n'en a pas déjà un
if (!isset($_SESSION['csrf_token'])) {
    $token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $token;
} else {
    $token = $_SESSION['csrf_token'];
}

// Vérifier le jeton CSRF
if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    // Jeton invalide, rediriger vers une page d'erreur
    header('Location: erreur.php');
    exit();
}

// Récupération et validation des données du formulaire
$modele = filter_input(INPUT_POST, 'modele', FILTER_SANITIZE_STRING);
$kilometrage = filter_input(INPUT_POST, 'kilometrage', FILTER_VALIDATE_INT);
$annee = filter_input(INPUT_POST, 'annee', FILTER_VALIDATE_INT);
$prix = filter_input(INPUT_POST, 'prix', FILTER_VALIDATE_FLOAT);
$equipements = filter_input(INPUT_POST, 'equipements', FILTER_SANITIZE_STRING);
$equipements_conduite = filter_input(INPUT_POST, 'equipements_conduite', FILTER_SANITIZE_STRING);
$nom_du_moteur = filter_input(INPUT_POST, 'nom_du_moteur', FILTER_SANITIZE_STRING);
$energie = filter_input(INPUT_POST, 'energie', FILTER_SANITIZE_STRING);
$puissance = filter_input(INPUT_POST, 'puissance', FILTER_SANITIZE_STRING);
$transmission = filter_input(INPUT_POST, 'transmission', FILTER_SANITIZE_STRING);

// Vérifier la validité des données
if (
    empty($modele) || 
    $kilometrage === false ||
    $annee === false ||
    $prix === false ||
    empty($_FILES["photo"]) ||
    $_FILES["photo"]["error"] !== UPLOAD_ERR_OK
) {
    echo "Les données du formulaire sont invalides.";
    exit();
}

try {
    // Connexion à la base de données
    $dsn = 'mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage';
    $username = '319891_faby';
    $password = 'alwaysdatastudi';

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Chemin de la photo principale
    $targetDirectory = "photos-vehicules/";
    $photoPath = $targetDirectory . $_FILES["photo"]["name"];

    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_OK) {
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0755, true);
        }
        $photoName = $_FILES["photo"]["name"];
        $photoPath = $targetDirectory . $photoName;
        move_uploaded_file($_FILES["photo"]["tmp_name"], $photoPath);
    }

    // Chemins des photos de la galerie
    $galleryPhotoPaths = [];

    if (isset($_FILES["photos_galerie"])) {
        $targetDirectory = "photos-vehicules/";
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0755, true);
        }

        foreach ($_FILES["photos_galerie"]["tmp_name"] as $key => $tmp_name) {
            $galleryPhotoName = $_FILES["photos_galerie"]["name"][$key];
            $galleryPhotoPath = $targetDirectory . $galleryPhotoName;
            move_uploaded_file($tmp_name, $galleryPhotoPath);
            $galleryPhotoPaths[] = $galleryPhotoPath;
        }
    }

    // Requête d'insertion des données
    $sql = "INSERT INTO vehicules (modele, kilometrage, annee, prix, equipements, equipements_conduite, nom_du_moteur, energie, puissance, transmission, photos, photos_galerie)
            VALUES (:modele, :kilometrage, :annee, :prix, :equipements, :equipements_conduite, :nom_du_moteur, :energie, :puissance, :transmission, :photos, :photos_galerie)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":modele", $modele);
    $stmt->bindParam(":kilometrage", $kilometrage, PDO::PARAM_INT);
    $stmt->bindParam(":annee", $annee, PDO::PARAM_INT);
    $stmt->bindParam(":prix", $prix, PDO::PARAM_STR);
    $stmt->bindParam(":equipements", $equipements);
    $stmt->bindParam(":equipements_conduite", $equipements_conduite);
    $stmt->bindParam(":nom_du_moteur", $nom_du_moteur);
    $stmt->bindParam(":energie", $energie);
    $stmt->bindParam(":puissance", $puissance);
    $stmt->bindParam(":transmission", $transmission);
    $stmt->bindParam(":photos", $photoPath);
    $galleryPhotoPathsString = implode(" ", $galleryPhotoPaths);
    $stmt->bindParam(":photos_galerie", $galleryPhotoPathsString);
    $stmt->execute();

    echo "Le véhicule a été ajouté avec succès.";

} catch (PDOException $e) {
    echo "Erreur lors de l'ajout du véhicule : " . $e->getMessage();
} finally {
    $pdo = null;
}
?>
<a href="../espace_employés/espaceEmployes.php" class="btn btn-primary btn-block mt-3">Retour espace employés</a>