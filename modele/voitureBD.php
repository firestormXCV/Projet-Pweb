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

	function ajoutVoiture($image, $modele, $prix){
		require('./modele/connectBD.php');
		$sql="INSERT INTO voiture(etat, photo, modele, prix) VALUES ('disponible', :img, :mdl, :prix)";
		try{
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':img', $image);
			$commande->bindParam(':mdl', $modele);
			$commande->bindParam(':prix', $prix);
			$bool = $commande->execute();
		} catch(PDOException $e){
			echo("Echec d'ajout de véhicule : " . $e->getMessage() . "\n");
			die();
		}
	}

	function supprimerVoiture($id){
		require('./modele/connectBD.php');
		$sql="DELETE FROM voiture WHERE id=:id";
		try{
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':id', $id);
			$bool = $commande->execute();
		} catch(PDOException $e){
			echo("Echec d'ajout de véhicule : " . $e->getMessage() . "\n");
			die();
		}

	}
?>