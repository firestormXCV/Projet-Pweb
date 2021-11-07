<?php
    function creerFacture($idEntreprise,$idVoiture,$dateDebut,$dateFin,$duree,$prix){
        require('./modele/connectBD.php');
		$sql="INSERT INTO facture(ide, idv, dateD, dateF, valeur) VALUES (:ide, :idv, :dateD, :dateF, :valeur)";
       
        $valeur= $prix * $duree; //calcul de prix de la location totale pour la duree (datedebut-datefin)
        
        
		try{
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':ide', $idEntreprise);
			$commande->bindParam(':idv', $idVoiture);
            $commande->bindParam(':dateD', $dateDebut);
            $commande->bindParam(':dateF', $dateFin);
            $commande->bindParam(':valeur', $valeur);
			$bool = $commande->execute();
		} catch(PDOException $e){
			echo("Echec de modification etat : " . $e->getMessage() . "\n");
			die();
		}

    }

    function datesLocation($idEntreprise,$idVoiture,&$dates){
        require('./modele/connectBD.php');

		$sql="SELECT dateD, dateF FROM facture WHERE ide=:ide and idv=:idv";
		try{
            $commande = $pdo->prepare($sql);
			$commande->bindParam(':ide', $idEntreprise);
            $commande->bindParam(':idv', $idVoiture);
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
			$dates=array(); 
		}
		else {
			$dates = $resultat;
		}

    }
?>