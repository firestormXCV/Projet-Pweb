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
	require("./modele/factureBD.php");
	if(afficheVoitureClient($voitures)){
		$_SESSION['voituresClient']=$voitures;
	}else{
		$msg='Pas de voitures !';
	}
	if(isset($_SESSION['voituresClient'])){
		foreach($_SESSION['voituresClient'] as $key=>$voiture){
			datesLocation($_SESSION['profil'][0]['id'],$voiture['idVoiture'],$dates);
			//var_dump($dates[0]['dateD']); die();
			
			if(!empty($dates)){
				$_SESSION['voituresClient'][$key]['dateD']=$dates[0]['dateD'];
				$_SESSION['voituresClient'][$key]['dateF']=$dates[0]['dateF'];
			//var_dump($_SESSION); die();
			}
		}
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
	$msg='';
	$_SESSION['msgErr']=$msg;
	if(count($_POST) == 0){
		$_SESSION['msgErr']=$msg;
	}
	if(!empty($modele) && !empty($prix) && !empty($_FILES['voitureAjout']['name'])) {
		$fileName = $_FILES["voitureAjout"]['name'];
    	$fileSize = $_FILES["voitureAjout"]['size'];
    	$fileTmpName  = $_FILES["voitureAjout"]['tmp_name'];
    	$fileType = $_FILES["voitureAjout"]['type'];

		ajoutVoiture($fileName, $modele, $prix);
		$nv_chemin = "./vue/img";
		move_uploaded_file($fileTmpName, "$nv_chemin/$fileName");
		$msg="Le véhicule " . $modele . " a été ajouté au prix de " . $prix . "€ par jour.\n";
		$_SESSION['msgErr']=$msg;
	} else {
		$msg = "Veuillez remplir tous les champs";
		$_SESSION['msgErr']=$msg;
	}

	$nextUrl="index.php?controle=voiture&action=listVoitureLoueur";
	header("Location:" . $nextUrl);
}

function supprimerVoiture(){
	$id=isset($_GET['id'])?trim($_GET['id']):'';
	$img=isset($_GET['img'])?trim($_GET['img']):'';
	require('./modele/voitureBD.php');
	retirerImgVoiture($img);
	retirerVoiture($id);
	$nextUrl="index.php?controle=voiture&action=listVoitureLoueur";
	header("Location:" . $nextUrl);
	
}
?>