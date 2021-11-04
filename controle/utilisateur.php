<?php 
	// a modifier Pour identifier le client entreprise
	function login() {
        $email=isset($_POST['email'])?trim($_POST['email']):''; // trim pour enlever les espaces avant et apres
        $mdp=isset($_POST['mdp'])?trim($_POST['mdp']):'';
        $msg="";

        if (count($_POST)==0) require ("./vue/layout/layout.tpl");
        else {
            require ("./modele/utilisateurBD.php");
            
            if (verif_LoginBD($email, $mdp, $profil)) {
                //echo ('<br/>PROFIL : <pre>'); var_dump ($profil); echo ('</pre><br/>'); die("ident");
                
                //session_start(); //deja fait dans index
				
                $_SESSION['profil'] = $profil;
				
				//en fonction du role envoyer une page compte client ou loueur
                $nexturl = "index.php?controle=utilisateur&action=compteClient";
                header ("Location:" . $nexturl);
            }
            else {
                $msgLog = "Utilisateur inconnu !";
				unset($_SESSION['profil']); //pour ne pas afficher deconnxion lorsqu'il y a une erreur de connexion
           		require("./vue/layout/layout.tpl");
            }
        }
	}
	function inscription()  {
		unset($_SESSION['profil']);
		$nom=isset($_POST['nomIns'])?trim($_POST['nomIns']):'';
		$email=isset($_POST['emailIns'])?trim($_POST['emailIns']):''; // trim pour enlever les espaces avant et apres
        $mdp=isset($_POST['mdpIns'])?trim($_POST['mdpIns']):'';
		require("./modele/utilisateurBD.php");
		if (!verif_LoginBD($email,$mdp,$profil)){
			inscriptionAbonne($nom, $mdp, $email);
			$msgLog = "Veuillez vous connecter !";
		} else {
			$msgSign = "Utilisateur déjà existant";
			unset($_SESSION['profil']); //pour ne pas afficher deconnxion lorsqu'il y a une erreur de connexion
			
			//header("Location:" . $nexturl);
		}
		$nexturl = "index.php?controle=utilisateur&action=login";
		header("Location:" . $nexturl);
	}	
	function compteClient() {



		require("./vue/layout/layout.tpl");
	}
	
	function compteLoueur(){
		
	}
	
	function bye() {
		session_destroy();
		header("Location: index.php");
	}	
	

			
?>