<?php
	/*Fonctions-modèle réalisant les requètes de gestion des utilisateurs en base de données*/
	
	
	/**
	 * Verifie l'existance du client/loueur 
	 * avec l'email et le mot de passe en parametre
	 * return vrai ou faux et un array contenant le profil de l'utilisateur
	 */
	function verif_LoginBD($email,$mdp,&$profil) {
		require('modele/connectBD.php'); //$pdo est défini dans ce fichier
		$md5mdp=md5($mdp);
		$sql="SELECT * FROM `utilisateur` WHERE email=:email AND mdp=:mdp";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':email', $email);
			$commande->bindParam(':mdp', $md5mdp);
			$bool = $commande->execute();
			if ($bool) {
				$resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
				
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
			$profil = $resultat;;
			//var_dump($profil); die();
			return true;
		}
	}

	/**
	 * Inscrit un nouveau client entreprise
	 * avec le nom, l'email et le mot de passe en parametre
	 */
	function inscriptionAbonne($nom, $mdp, $email){
		require('modele/connectBD.php');
		//var_dump($mdp);die();
		$md5mdp = md5($mdp);

		$sql="INSERT INTO utilisateur(nom, mdp, email) VALUES (:nom, :md5mdp, :email)";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':nom', $nom);
			$commande->bindParam(':md5mdp', $md5mdp);
			$commande->bindParam(':email', $email);
			$bool = $commande->execute();
		} catch (PDOException $e){
			echo utf8_encode("Echec insert into : " . $e->getMessage() . "\n") ;
			die();
		}
	}
?>