<?php 

function afficheProduitBD(&$produit, $id){
    require('./modele/connectBD.php');
    $sql="SELECT * FROM voiture WHERE idVoiture=$id";

    try{
        $commande = $pdo->prepare($sql);
        $bool = $commande->execute();
        if ($bool) {
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
            
            //var_dump($resultat); die();
            /*while ($ligne = $commande->fetch()) { // ligne par ligne
                print_r($ligne);
            }*/
        }
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de SQL : " . $e->getMessage() . "\n");
        die(); // On arrête tout
    }
    if (count($resultat) == 0) {
        $produit=array(); 
        return false; 
    }
    else {
        $produit = $resultat;

        //var_dump($profil);
        return true;
    }
}




?>