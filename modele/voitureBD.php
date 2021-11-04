<?php


    function afficheVoiture(&$voitures){
        require('./modele/connectBD.php');
        $sql="SELECT * FROM voiture WHERE etat=\"disponible\"";
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
			$voitures=array(); 
			return false; 
		}
		else {
			$voitures = $resultat;

			//var_dump($profil);
			return true;
		}
    }

	function afficheVoitureClient(&$voitures) {
		require('./modele/connectBD.php');

		$sql="SELECT * FROM voiture WHERE etat=\"$_SESSION['profil']['id']\"";
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
			$voitures=array(); 
			return false; 
		}
		else {
			$voitures = $resultat;

			//var_dump($profil);
			return true;
		}
	}
?>