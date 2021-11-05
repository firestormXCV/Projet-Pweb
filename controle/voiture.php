<?php 
/*controleur voiture.php :
  fonctions-action de gestion (voiture)
*/

function listeVoiture() {
	$msg='';
	//définition de variables PHP utiles pour le template
	require ("./modele/voitureBD.php");
	if(afficheVoiture($voitures)){
		$_SESSION['voitures']=$voitures;
		
		
	}
	else{
		$msg='Pas de voitures !';
	}

	require ("./vue/layout/layout.tpl"); //layout lançant le template de vue du service
}

function listVoitureClient() {

	require ("./modele/voitureBD.php");
	if(afficheVoitureClient($voitures)){
		$_SESSION['voitures']=$voitures;
	}else{
		$msg='Pas de voitures !';
	}
	require ("./vue/layout/layout.tpl");
}

function listVoitureLoueur() {

	require ("./modele/voitureBD.php");
	if(afficheVoitureLoueur($voituresDispo, $voituresLouees, $voituresRevision)){
		$_SESSION['voituresDispo']=$voituresDispo;
		$_SESSION['voituresLouees']=$voituresLouees;
		$_SESSION['voituresRevision']=$voituresRevision;

	}else{
		$msg='Pas de voitures !';
	}
	require ("./vue/layout/layout.tpl");
}


function ajouterVoiture() {
	require("./modele/voitureBD.php");
	$modele = isset($_POST['modeleAjout'])?trim($_POST['modeleAjout']):'';
	$prix = isset($_POST['prixAjout'])?trim($_POST['prixAjout']):'';

	if($_FILES["voitureAjout"]['error'] == 0) {
		$fileName = $_FILES["voitureAjout"]['name'];
    	$fileSize = $_FILES["voitureAjout"]['size'];
    	$fileTmpName  = $_FILES["voitureAjout"]['tmp_name'];
    	$fileType = $_FILES["voitureAjout"]['type'];

		ajoutVoiture($fileName, $modele, $prix);
		$nv_chemin = "./vue/img";
		move_uploaded_file($fileTmpName, "$nv_chemin/$fileName");

		$nextUrl="index.php?controle=voiture&action=listVoitureLoueur";
		header("Location:" . $nextUrl);
	} else {
		$msgErr = "Veuillez remplir tous les champs";
		die();
	}
}




?>