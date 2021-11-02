<?php
	/*Fonctions-modèle réalisant les requètes de gestion des utilisateurs en base de données*/
	
	// verif_bd : fonction booléenne. 
	// Si vraie, alors le profil de l'utilisateur est affecté en sortie à $profil
	
	
	//Verifier si le client existe
	function verif_ClientBD($email,$mdp,&$profil) {
		require('modele/connectBD.php'); //$pdo est défini dans ce fichier
		$mdp=md5($mdp);
		$sql="SELECT * FROM `utilisateur` WHERE email=:email AND mdp=:mdp";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':email', $email);
			$commande->bindParam(':mdp', $mdp);
			$bool = $commande->execute();
			if ($bool) {
				$resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
				// var_dump($resultat); die();
				/*while ($ligne = $commande->fetch()) { // ligne par ligne
					print_r($ligne);
				}*/
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); // On arrête tout.
		}
		if (count($resultat) == 0) {
			$profil=array(); // Pour qu'il y ait quand même quelque chose...
			return false; 
		}
		else {
			$profil = $resultat[0];
			//var_dump($profil);
			return true;
		}
	}

	function inscriptionAbonne($nom, $mdp, $adresseEnt){
		require('modele/connectBD.php');
		$md5mdp = md5($mdp);

		$sql="INSERT INTO client(nom, motDePasse, adresseEntreprise) VALUES (:nom, :md5mdp, :adresseEnt)";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':nom', $nom);
			$commande->bindParam(':md5mdp', $md5mdp);
			$commande->bindParam(':adresseEnt', $adresseEnt);
			$bool = $commande->execute();
		} catch (PDOException $e){
			echo utf8_encode("Echec insert into : " . $e->getMessage() . "\n") ;
			die();
		}
	}
?>