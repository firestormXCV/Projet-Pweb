<?php 
/*controleur c2.php :
  fonctions-action de gestion (c2) 
*/

function a21() {
	require ("modele/m2.php"); 	

	echo $_GET['id'] . " " . $_GET['nom'];

	require ("./vue/c2/a21.tpl"); 
}