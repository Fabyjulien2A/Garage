<?php
try{$bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');
}catch(Exception $e){
    die('une erreur a été trouvée : ' . $e->getMessage());
}
