	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>RENT</span>-CAR</h1>
									<h2>Meilleur site de location de voiture 2021</h2>
									<p>RENT-CAR est le meilleur site de location de véhicule haut de gamme depuis plus de 10 ans. Nos experts sont a votre écoute 24h/24 et 7j/7 afin de satisfaire la moindre de vos demande et vous proposer toujours de meilleurs services</p>
									
								</div>
								<div class="col-sm-6">
									<img src="vue/images/home/car.png" class="girl img-responsive" alt="" />
								</div>
							</div>								
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Nos Véhicules</h2>
						
						<?php
						$msg=isset($_SESSION['msgErr'])?$_SESSION['msgErr']:'';
						echo"<h4>$msg</h4>"; 		//A STYLISER !!

						$_SESSION['voitures']=$voitures;

						$list[] = "aaaa";
						$i = 0;

						foreach($voitures as $voiture) {
							$car;
							
							foreach($voiture as $v) {
								$car[] = $v;								
							}
							
							
							if (count($list) != 0) {
								if (in_array($car[3], $list)) {
    								continue;
								}
							}

							echo "
								<div class=\"col-sm-4\">
									<div class=\"product-image-wrapper\">
										<div class=\"single-products\">
												<div class=\"productinfo text-center\">
													<img src=\"vue/img/" . $car[2] . "\" alt=\"car-pic\" />
													<h2>" . $car[3] . "</h2>
													<p>" . $car[4] . "€ /j</p>
													<a href=\"index.php?controle=produit&action=afficheProduit&id=$car[0]\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Louer</a>
													<a href=\"#\" class=\"btn btn-default add-to-cart\"></i>Info</a>
												</div>
												<div class=\"product-overlay\">
													<div class=\"overlay-content\">
														<h2>$car[3]</h2>
														<p>$car[4]€ /j</p>
														<a href=\"index.php?controle=produit&action=afficheProduit&id=$car[0]\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Louer</a>
													</div>
												</div>
										</div>
									</div>
								</div>";
							$list[] = $car[3];
							unset($car);							
						}
							
						?>				
				</div>
			</div>
		</div>
	</section>
	
	

