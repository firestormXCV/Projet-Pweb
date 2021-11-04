	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
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
						<h2 class="title text-center">Mes Voitures Loués</h2>

						<?php
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
													<p>" . $car[4] . "€ /s</p>
													<a href=\"#\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Louer</a>
													<a href=\"#\" class=\"btn btn-default add-to-cart\"></i>Info</a>
												</div>
												<div class=\"product-overlay\">
													<div class=\"overlay-content\">
														<h2>$car[3]</h2>
														<p>$car[4]€ /s</p>
														<a href=\"#\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Louer</a>
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
	
	

