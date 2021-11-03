<?php

    function IsClient($nomClient, $emailClient){
        require("./modele/connectBD.php");
        $sql="SELECT * FROM utilisateur WHERE nom=:nom email=:email";
        try{
            $commande = $pdo->prepare($sql);
			$commande->bindParam(':nom', $nomClient);
			$commande->bindParam(':email', $emailClient);
			$bool = $commande->execute();

            if($bool = true){
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
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

    function inscription($nomClient, $mdpClient, $emailClient){
        require('modele/connectBD.php');
		$md5mdp = md5($mdp);
		$sql="INSERT INTO utilisatateur(nom, mdp, email, role) VALUES (:nom, :mdp, :mail, "CLIENT")";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':nom', $nomClient);
			$commande->bindParam(':md5mdp', $md5mdp);
			$commande->bindParam(':mail', $emailClient);
			$bool = $commande->execute();
		} catch (PDOException $e){
			echo utf8_encode("Echec insert into : " . $e->getMessage() . "\n") ;
			die();
		}
    }
?>