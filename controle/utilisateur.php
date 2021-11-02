<?php 
	// a modifier Pour identifier le client entreprise
	function identClient () {
        $nom=isset($_POST['nom'])?trim($_POST['nom']):''; // trim pour enlever les espaces avant et apres
        $mdp=isset($_POST['mdp'])?trim($_POST['mdp']):'';
        $msg="";

        if (count($_POST)==0) require ("./vue/layout/layout.tpl"); 
        else {
            
            require ("./modele/utilisateurBD.php");
            
            if (verif_bd($nom, $num, $profil)) {
                //echo ('<br/>PROFIL : <pre>'); var_dump ($profil); echo ('</pre><br/>'); die("ident");
                
                //session_start(); //deja fait dans index
                $_SESSION['profil'] = $profil;
                //$nexturl = "index.php?controle=utilisateur&action=profil";
                //header ("Location:" . $nexturl);
            }
            else {
                $msg = "Utilisateur inconnu !";
                require("./vue/layout/layout.tpl");
            }
        }
	}


	
	function accueil() {
		require ("modele/contactBD.php");
		$idn = $_SESSION['profil']['id_nom'];
		$Contact = contacts($idn);
		require ("vue/utilisateur/accueil.tpl");
	}
	
	function bye() {
		echo ("<h2>Au revoir M. ou Mdme " . $_SESSION['profil']['nom'] . "</h2>");
		echo ("<li><a href='index.php'>Reconnexion</a></li>");
		session_destroy();
	}
	
	function inscription($nom, $mdp, $adresseEnt)  {
		require("./modele/utilisateurBD");
		if (!verif_ClientBD($adresseEnt,$mdp,$profil)){
			$nexturl = "URL de connexion";
			inscriptionAbonne($nom, $mdp, $adresseEnt);
			header("Location:" . $nexturl);
		} else {
			$msg = "Utilisateur déjà existant";
			header("Location:" . $nexturl);
		}

	}
	function maj_u() {
		echo ("maj_u ::");
	}
	function destr_u ()  {
		echo ("destr_u ::");
	}				
?>