<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						
					</div>
				</div>
				

				<?php 
					$produit=$_SESSION['produit'];
					date_default_timezone_set('UTC');
					$myDate = date('Y-m-d');
					
					echo "
				<div class=\"col-sm-14 padding-right\">
					<div class=\"product-details\"><!--product-details-->
						<div class=\"col-sm-5\">
							<div class=\"view-product\">
								<img src=\"vue/img/" . $produit[0]['photo'] . "\" alt=\"\" />
							</div>
						</div>



						<div class=\"col-sm-7\">
							<div class=\"product-information\"><!--/product-information-->
								<img src=\"images/product-details/new.jpg\" class=\"newarrival\" alt=\"\" />
								<h2>" . $produit[0]['modele'] . "</h2>
								<p> " . $produit[0]['etat'] . "</p>
									
								<span>
									<span> " . $produit[0]['prix']. "€ /s</span>
									
									<button type=\"button\" class=\"btn btn-fefault cart\">
										<i class=\"fa fa-shopping-cart\"></i>
										Ajouter au panier
									</button>
								</span>
								<p><b>Disponibilité:</b> " . $produit[0]['etat'] . "</p>
								<a href=\"\"><img src=\"images/product-details/share.png\" class=\"share img-responsive\"  alt=\"\" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class=\"category-tab shop-details-tab\"><!--category-tab-->
						<div class=\"col-sm-12\">
							<ul class=\"nav nav-tabs\">
								<li><a href=\"#details\" data-toggle=\"tab\">Details</a></li>
							</ul>
						</div>
						<label for=\"start\">Date debut:</label>

						<input type=\"date\" id=\"start\" name=\"trip-start\"
       
       					min=\"$myDate\" max=\"2021-12-31\">


						<label for=\"start\">Date fin:</label>

					   <input type=\"date\" id=\"start\" name=\"trip-start\"
	  
					   min=\"$myDate\" max=\"2021-12-31\">

					</div><!--/category-tab-->					
				</div>";						
				?>
			</div>
		</div>
	</section> 
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>