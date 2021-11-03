<?php
function inscription(){
    require("./Formulaire.php");
    require("./modele/inscriptionClient.php");
    $msg="";
    if (!isset($_GET['nom']) && !isset($_GET['email']) && !isset($_GET['mdp'])){
        $msg = "Veuillez remplir tous les champs";
    } else {
        $bool = IsClient($_GET['nom'], $_GET['email']);
        if ($bool == false){
            inscriptionClient($_GET['nom'], $_GET['mdp'], $_GET['email']);
        } else {
            $msg = "Ce client existe déjà";
        }
    }
}
?>