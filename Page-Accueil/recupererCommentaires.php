<?php
$dsn = 'mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage';
$username = '319891_faby';
$password = 'alwaysdatastudi';


try {
    $connexion = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

$requete = "SELECT * FROM avis_clients";
$resultat = $connexion->query($requete);

//Récuperation commentaires
while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
    echo "Nom : " . $row['nom'] . "<br>";
    
    echo "Commentaire : " . $row['commentaire'] . "<br>";
    
    echo "Note : " . $row['note'] . "<br><br>" ;
    
}



$connexion = null; 
?>