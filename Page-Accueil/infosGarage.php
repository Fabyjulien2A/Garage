<ul class="list-group">
    <?php
    $dsn = 'mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage';
    $username = '319891_faby';
    $password = 'alwaysdatastudi';

    try {
        $connexion = new PDO($dsn, $username, $password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete = "SELECT * FROM services_reparations";
        $resultat = $connexion->query($requete);

        while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo '<li class="list-group-item">' . $ligne['nom'] . '</li>';
        }

        $connexion = null;
    } catch (PDOException $e) {
        echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
    }
    ?>
</ul>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des services de réparation</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
</body>
</html>