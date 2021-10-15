<?php  
	global $controle;  //accès aux variables globales 
	global $action; 	//nécessaire car layout inclus au sein d'une fonction-action
?>

<!doctype html>
<html><head>
 	<meta charset="utf-8">
 	<title>Test mvc  <?php  echo ($action); ?> </title>
 	<link rel="stylesheet" href="./vue/style/css/style.css"/>
	<link rel="stylesheet" href="./vue/style/css/bootstrap.css"/>
	</head>

<body>

	<nav>
		<?php  require ("./vue/layout/menu.tpl"); ?>	
	</nav>

	<div id ="main"> 
		<?php  require ("./vue/" . $controle . "/" . $action . ".tpl"); ?>  
	</div>

</body></html>
