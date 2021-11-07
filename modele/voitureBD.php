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

	/**
	 * Change l'etat de la voiture pour quelle ne soit plus disponible mais louee.
	 * Fonction utilisé seulement lorsque les voitures sont disponibles.
	 * update la table voiture en mettant $idUtilisateur pour la voiture $idVoiture donné en parametre
	 */
	function changeEtatLouer($idVoiture,$idUtilisateur){
		require('./modele/connectBD.php');
		$sql="UPDATE voiture SET etat=:etat WHERE idVoiture=:idVoiture";
		try{
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':etat', $idUtilisateur);
			$commande->bindParam(':idVoiture', $idVoiture);
			$bool = $commande->execute();
		} catch(PDOException $e){
			echo("Echec de modification etat : " . $e->getMessage() . "\n");
			die();
		}

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

	function retirerVoiture($id){
		require('./modele/connectBD.php');
		$sql="DELETE FROM voiture WHERE idVoiture=:id;";
		
		try{

			$commande = $pdo->prepare($sql);
			$commande->bindParam(':id', $id);
			$bool = $commande->execute();
			//if ($bool) {
			//	unlink("vue/img/"  . $img);
			//}
			
		} catch(PDOException $e){
			echo("Echec d'ajout de véhicule : " . $e->getMessage() . "\n");
			die();
		}
	}

	function retirerImgVoiture($img){
		require('./modele/connectBD.php');
		$sql="SELECT * FROM voiture WHERE photo=:photo;";
		$nv_chemin="./vue/img";
		try{
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':photo', $img);
			$bool = $commande->execute();
			if ($bool) {

				$resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
				if(count($resultat) == 1){
					unlink("$nv_chemin/$img");
				}
			}
		} catch(PDOException $e){
			echo("Echec d'ajout de véhicule : " . $e->getMessage() . "\n");
			die();
		}
	}
?>