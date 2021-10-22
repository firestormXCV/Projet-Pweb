<?php  
	global $controle;  //accès aux variables globales 
	global $action; 	//nécessaire car layout inclus au sein d'une fonction-action
?>

<!doctype html>
<html><head>
 	<meta charset="utf-8">
 	<title>Test mvc  <?php  echo ($action); ?> </title>
 	
	</head>

<body>
	<div id ="main"> 
		<?php  require ("./vue/" . $controle . "/" . $action . ".tpl"); ?>  
	</div>

</body></html>
