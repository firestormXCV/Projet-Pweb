<?php
    function creerFacture($idEntreprise,$idVoiture,$dateDebut,$dateFin){
        require('./modele/connectBD.php');
		$sql="INSERT INTO facture(ide, idv, dateD, dateF, valeur) VALUES (:ide, :idv, :dateD, :dateF, :valeur)";
        
        //$valeur=...  //calcul de prix de la location totale pour la duree (datedebut-datefin)
        
		try{
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':ide', $idEntreprise);
			$commande->bindParam(':idv', $idVoiture);
            $commande->bindParam(':dateD', $dateDebut);
            $commande->bindParam(':dateF', $dateFin);
            //$commande->bindParam(':valeur', $valeur);
			$bool = $commande->execute();
		} catch(PDOException $e){
			echo("Echec de modification etat : " . $e->getMessage() . "\n");
			die();
		}

    }
?>