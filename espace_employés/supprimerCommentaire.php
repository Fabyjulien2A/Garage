//supprimer commentaire
<?php
$bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');
if (isset($_GET ['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupCommentaire = $bdd->prepare('SELECT * FROM avis_clients WHERE id= ?');
    $recupCommentaire->execute(array($getid));
    if ($recupCommentaire->rowCount() >0){
        $deleteCommentaire = $bdd->prepare('DELETE FROM avis_clients WHERE id = ?');
        $deleteCommentaire->execute(array($getid));
        header('location: commentaires.php');
    }else{
        echo "aucun commentaire trouvé";
    }
}else{
    echo "Aucun identifiant trouvé";
}
?>
