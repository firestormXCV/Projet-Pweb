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
	
	$nextUrl="index.php?controle=voiture&action=listVoitureLoueur";
	header("Location:" . $nextUrl);
}




?>