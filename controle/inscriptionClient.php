<?php
function ident(){
    
    $nom=isset($_POST['nom'])?trim($_POST['nom']):''; // trim pour enlever les espaces avant et apres
	$email=isset($_POST['email'])?trim($_POST['email']):'';
    $mdp=isset($_POST['mdp'])?trim($_POST['mdp']):'';
    $msg="";
    if (count($_POST)==0) {

        require ("./vue/login.tpl");               
    }
    
}


function inscription() {
    
    $nom=isset($_POST['nom'])?trim($_POST['nom']):''; // trim pour enlever les espaces avant et apres
	$email=isset($_POST['email'])?trim($_POST['email']):'';
    $mdp=isset($_POST['mdp'])?trim($_POST['mdp']):'';
    $msg="";
    die();

    if(count($_POST) != 0) {

        die();
            require('./modele/inscriptionClientDB.php');
            
         if (IsClient($nom, $email)) {
            $msg = "Ce client existe déjà";
         }else {
                inscription($nom, $mdp, $email);
        }
    }
}
?>