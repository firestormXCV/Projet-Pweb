<?php
function inscription(){
    require("./Formulaire.php");
    require("./reponse.php");
    require("./modele/inscriptionClient.php");
    $msg="";
    if (!isset($_GET['nom']) && !isset($_GET['email']) && !isset($_GET['mdp'])){
        $msg = "Remplir tous les champs";
        print($msg);
    }
    

}
?>