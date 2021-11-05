<?php 

function afficheProduit() {

    $id=isset($_GET['id'])?trim($_GET['id']):'';
    
    require("./modele/produitBD.php");
    
    if (afficheProduitBD($produit, $id)) {

        $_SESSION['produit']=$produit;
    }else{
		$msg='Pas de voitures !';
	}

    require("./vue/layout/layout.tpl");

}






?>