<?php 

function afficheProduit() {

    $id=isset($_GET['id'])?trim($_GET['id']):'';
    require("./vue/layout/layout.tpl");


}






?>