<?php  
	global $controle;  //accès aux variables globales 
	global $action; 	//nécessaire car layout inclus au sein d'une fonction-action
?>

<!doctype html>
<html><head>
 	<meta charset="utf-8">
 	<title>Test mvc  <?php  echo ($action); ?> </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
    <link href="vue/css/bootstrap.min.css" rel="stylesheet">
    <link href="vue/css/font-awesome.min.css" rel="stylesheet">
    <link href="vue/css/prettyPhoto.css" rel="stylesheet">
    <link href="vue/css/price-range.css" rel="stylesheet">
    <link href="vue/css/animate.css" rel="stylesheet">
	<link href="vue/css/main.css" rel="stylesheet">
	<link href="vue/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="vue/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="vue/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="vue/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

	</head>

	<body>
		
		<!--MENU-->
		<?php  require ("./vue/layout/menu.tpl"); ?>
		<!--FIN MENU-->


		<div id ="main"> 
			<?php  require ("./vue/" . $controle . "/" . $action . ".tpl"); ?>  
		</div>


		<!--FOOTER-->
		<?php  require ("./vue/layout/footer.tpl"); ?>
		<!--FIN FOOTER-->

		<script src="js/jquery.js"></script>
		<script src="js/price-range.js"></script>
		<script src="js/jquery.scrollUp.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.prettyPhoto.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
