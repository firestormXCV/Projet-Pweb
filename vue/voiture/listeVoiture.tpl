<h2>Liste de nos voitures !</h2>
<!--Recuperer les voitures de la base-->
<?php 
    //affichage des voitures 
    //a mettre en forme
    foreach ($_SESSION['voitures'] as $value):
        echo  '<img src="./vue/img/'.$value['photo'].'" alt="">'; 
        echo 'Modele : '.$value['modele'];
        echo '  |  Prix : '.$value['prix/j'];
    endforeach;


?>

<div id ="m"> <?php echo $msg; ?> </div>

