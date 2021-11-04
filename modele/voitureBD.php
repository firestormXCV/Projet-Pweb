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

		$sql="SELECT * FROM voiture WHERE etat=:etat";
		try{
            $commande = $pdo->prepare($sql);
			$commande->bindParam(':etat', $_SESSION['profil'][0]['id']);
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

	function afficheVoitureLoueur(&$voituresDispo , &$voituresLouees , &$voituresRevision) {
		require('./modele/connectBD.php');
		$bool = false;
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
			$voituresDispo=array(); 
			$bool =true;
		}
		else {
			$voituresDispo = $resultat;

			//var_dump($profil);

		}

		$sql="SELECT * FROM voiture WHERE etat <> \"disponible\" AND etat <> \"enRevision\"";
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
			$voituresLouees=array(); 
			$bool =true;
		}
		else {
			$voituresLouees = $resultat;

			//var_dump($profil);

		}

		$sql="SELECT * FROM voiture WHERE etat=\"enRevision\"";
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
			$voituresRevision=array(); 
			$bool =true;
		}
		else {
			$voituresRevision = $resultat;

			//var_dump($profil);

		}
		return $bool;
	}
?>