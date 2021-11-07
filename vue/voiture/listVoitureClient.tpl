	
	
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
					<?php 
					
					$msg=isset($_SESSION['msgFinCommande'])?$_SESSION['msgFinCommande']:'';
					echo"<h3>$msg</h3>";
					unset($_SESSION['msgFinCommande']);
					?>
						<h2 class="title text-center">Mes Voitures Louées</h2>

						<?php
						$msg=isset($_SESSION['msgFinCommande'])?$_SESSION['msgFinCommande']:'';
						$_SESSION['voitures']=$voitures;

						

						foreach($voitures as $voiture) {
							$car;
							
							foreach($voiture as $v) {
								$car[] = $v;								
							}
							
							echo "
								<div class=\"col-sm-4\">
									<div class=\"product-image-wrapper\">
										<div class=\"single-products\">
												<div class=\"productinfo text-center\">
													<img src=\"vue/img/" . $car[2] . "\" alt=\"car-pic\" />
													<h2>" . $car[3] . "</h2>
													<p>" . $car[4] . "€ /j</p>
													<a href=\"#\" class=\"btn btn-default add-to-cart\"></i>Info</a>
												</div>
										</div>
									</div>
								</div>";
							
							unset($car);							
						}
							
						?>				
				</div>
			</div>
		</div>
	</section>
	
	

