<?php
// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Connexion à la base de données (remplacez ces valeurs par les vôtres)
        $dsn = 'mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage';
        $username = '319891_faby';
        $password = 'alwaysdatastudi';

        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération des données du formulaire
        $modele = $_POST["modele"];
        $kilometrage = $_POST["kilometrage"];
        $annee = $_POST["annee"];
        $prix = $_POST["prix"];
        $equipements = $_POST["equipements"];
        $equipements_conduite = $_POST["equipements_conduite"];
        $nom_du_moteur = $_POST["nom_du_moteur"];
        $energie = $_POST["energie"];
        $puissance = $_POST["puissance"];
        $transmission = $_POST["transmission"];

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
        $galleryPhotoPaths =[];

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
        $stmt->bindValue(":modele", $modele);
        $stmt->bindValue(":kilometrage", $kilometrage);
        $stmt->bindValue(":annee", $annee);
        $stmt->bindValue(":prix", $prix);
        $stmt->bindValue(":equipements", $equipements);
        $stmt->bindValue(":equipements_conduite", $equipements_conduite);
        $stmt->bindValue(":nom_du_moteur", $nom_du_moteur);
        $stmt->bindValue(":energie", $energie);
        $stmt->bindValue(":puissance", $puissance);
        $stmt->bindValue(":transmission", $transmission);
        $stmt->bindValue(":photos", $photoPath);
        $galleryPhotoPathsString = implode(" ", $galleryPhotoPaths);
        $stmt->bindValue(":photos_galerie", $galleryPhotoPathsString);
        $stmt->execute();

        echo "Le véhicule a été ajouté avec succès.";

    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout du véhicule : " . $e->getMessage();
    }

    $pdo = null;
}

?>
<a href="../espace_employés/espaceEmployes.php" class="btn btn-primary btn-block mt-3">Retour espace employés</a>
