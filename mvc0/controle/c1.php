<?php 
/*controleur c1.php :
  fonctions-action de gestion (c1)
*/

function a11() {
	require ("./modele/m1.php");	//accès aux fcts modèle de m1.php

		//définition de variables PHP utiles pour le template
	echo "bonjour";
	require ("./vue/c1/a11.tpl"); //basiquement, template de vue du service
}

function a12() {
	require ("./modele/m1.php");	
	
	require ("./vue/c1/a12.tpl"); //template de vue du service
}

?>
