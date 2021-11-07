<?php 
	/**
	 * Connexion
	 */	
	function login() {
        $email=isset($_POST['email'])?trim($_POST['email']):''; // trim pour enlever les espaces avant et apres
        $mdp=isset($_POST['mdp'])?trim($_POST['mdp']):'';
		$msg='';
        if (count($_POST)==0) require ("./vue/layout/layout.tpl");
        else {
            require ("./modele/utilisateurBD.php");
            
            if (verif_LoginBD($email, $mdp, $profil)) {
                //echo ('<br/>PROFIL : <pre>'); var_dump ($profil); echo ('</pre><br/>'); die("ident");
                
                //session_start(); //deja fait dans index
				
                $_SESSION['profil'] = $profil;
				$msgLog='';
				//en fonction du role envoyer une page compte client ou loueur
                $nexturl = "index.php?controle=utilisateur&action=compte";
                header ("Location:" . $nexturl);
            }
            else {
                $msgLog = "Utilisateur inconnu !";
				unset($_SESSION['profil']); //pour ne pas afficher deconnxion lorsqu'il y a une erreur de connexion
           		require("./vue/layout/layout.tpl");
            }
        }
	}
	/**
	 * Inscription
	 */
	function inscription()  {
		//unset($_SESSION['profil']);
		$nom=isset($_POST['nomIns'])?trim($_POST['nomIns']):'';
		$email=isset($_POST['emailIns'])?trim($_POST['emailIns']):''; // trim pour enlever les espaces avant et apres
        $mdp=isset($_POST['mdpIns'])?trim($_POST['mdpIns']):'';
		require("./modele/utilisateurBD.php");
		if (!verif_LoginBD($email,$mdp,$profil)){
			inscriptionAbonne($nom, $mdp, $email);
			
			$msgLog = "Veuillez vous connecter !";//msg non envoyé dans l'autre page car variable perdue . Mettre dans session ?
			
		} else {
			$msgSign = "Utilisateur déjà existant";//msg non envoyé dans l'autre page car variable perdue. Mettre dans session ?
			unset($_SESSION['profil']); //pour ne pas afficher deconnxion lorsqu'il y a une erreur de connexion
				
			//header("Location:" . $nexturl);
		}
		$nexturl = "index.php?controle=utilisateur&action=login";
		header("Location:" . $nexturl);
	}	

	function compte() { //le tpl au meme nom est inutile.
		if($_SESSION['profil'][0]['role']=='CLIENT'){		//si c'est un client : diriger vers la liste des voitures clients
			$nexturl = "index.php?controle=voiture&action=listVoitureClient";
			header("Location:" . $nexturl);
	
		}
		else{		//sinon diriger vers la liste des voitures loueurs
			$nexturl = "index.php?controle=voiture&action=listVoitureLoueur";
			header("Location:" . $nexturl);
	
		}


	}
	
	
	/**
	 * Ajouter une voiture au panier pour la louer
	 */
	function louer(){
		//$_SESSION['panier']=array();
		//var_dump($_SESSION['produit']); die(); //pour savoir la voiture choisie
		$id=isset($_GET['id'])?trim($_GET['id']):$_SESSION['produit'][0]['idVoiture'];
		$dateDeb=isset($_POST['dateDebut'])?trim($_POST['dateDebut']):'';
		$dateFin=isset($_POST['dateFin'])?trim($_POST['dateFin']):'';
		if($dateDeb==''){
			//$id=$_SESSION['produit'][0]['idVoiture'];
			$_SESSION['msgErr']='Date de début manquante !';
			$nexturl = "index.php?controle=produit&action=afficheProduit&id=$id";
			header("Location:" . $nexturl);
		}
		
		else{
			foreach($_SESSION['panier'] as $location){
				if($location['idVoiture']==$id){
					
					$_SESSION['msgErr']="Déjà dans le panier !";
					$nexturl = "index.php?controle=voiture&action=listeVoiture";
					header("Location:" . $nexturl);
				}
			}
			//$id=$_SESSION['produit'][0]['idVoiture'];
			date_default_timezone_set('UTC');
			$dateDif = abs(strtotime($dateFin) - strtotime($dateDeb));
			$dateDif = $dateDif /60;
			$dateDif = $dateDif /60;
			$dateDif = $dateDif /24;
			$dateDif +1;
			$location=array("idVoiture"=>$id,"dateDebut"=>$dateDeb,"dateFin"=>$dateFin, "dateDif"=>$dateDif);
			$_SESSION['panier'][]=$location;
			//var_dump($_SESSION);die();
			
		}
		
		$nexturl = "index.php?controle=utilisateur&action=panier";
		header("Location:" . $nexturl);
		
	}
	/**
	 * Supprimer une voiture du panier
	 */
	function retirerPanier(){
		//var_dump($_GET['idVoiture']);die();
		$idVoiture=isset($_GET['idVoiture'])?trim($_GET['idVoiture']):'';
		
		foreach($_SESSION['panier'] as $key=>$location){
			//var_dump($_SESSION['panier']);
			if($location['idVoiture']==$idVoiture){
				//var_dump($key);var_dump($location);die();
				unset($_SESSION['panier'][$key]);
			}
		}
		//var_dump($_SESSION['panier']);die();
		$nexturl = "index.php?controle=utilisateur&action=panier";
		header("Location:" . $nexturl);
	}
	/**
	 * Afficher le panier
	 */
	function panier(){
		//var_dump($_SESSION);die();
		require("./vue/layout/layout.tpl");
	}

	/**
	 * Valider le panier en modifiant la base: changer l'etat de la voiture et creer une facture
	 */
	function validerPanier(){
		require("./modele/voitureBD.php");
		require("./modele/factureBD.php");
		foreach($_SESSION['panier'] as $location){
			changeEtatLouer($location['idVoiture'],$_SESSION['profil'][0]['id']);
			creerFacture($_SESSION['profil'][0]['id'],$location['idVoiture'],$location['dateDebut'],$location['dateFin']);
		}
		//afficher un message pour la fin de la commande de location et supprimer le panier 
		$_SESSION['msgFinCommande']="Merci pour votre commande !";
		unset($_SESSION['panier']);
		$nexturl = "index.php?controle=utilisateur&action=panier";
		header("Location:" . $nexturl);
	}
	/**
	 * Deconnexion
	 */
	function bye() {
		session_destroy();
		header("Location: index.php");
	}	
	

			
?>