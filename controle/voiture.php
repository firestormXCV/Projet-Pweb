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



?>
