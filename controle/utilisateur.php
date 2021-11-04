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
           		require("./vue/layout/layout.tpl");
            }
        }
	}
	function inscription()  { //$nom, $mdp, $adresseEnt
		require("./modele/utilisateurBD");
		if (!verif_LoginBD($email,$mdp,$profil)){
			$nexturl = "URL de connexion";
			inscriptionAbonne($nom, $mdp, $email);
			header("Location:" . $nexturl);
		} else {
			$msgSign = "Utilisateur déjà existant";
			header("Location:" . $nexturl);
		}

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