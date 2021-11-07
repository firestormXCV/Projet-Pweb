	
	
	
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
					//var_dump($_SESSION);die();
					$msg=isset($_SESSION['msgFinCommande'])?$_SESSION['msgFinCommande']:'';
					echo"<h3>$msg</h3>";
					unset($_SESSION['msgFinCommande']);
					?>
						<h2 class="title text-center">Mes Voitures Louées</h2>

						<?php
						$msg=isset($_SESSION['msgFinCommande'])?$_SESSION['msgFinCommande']:'';
						//$_SESSION['voitures']=$voitures;

						
						if(isset($_SESSION['voituresClient'])){
							foreach($_SESSION['voituresClient'] as $voiture) {
								//var_dump($_SESSION['voituresClient']); die();
								//$car;
								
								/*foreach($voiture as $v) {
									$car[] = $v;								
								}
								//var_dump($car); die();*/
								$voiture['dateD']=isset($voiture['dateD'])?$voiture['dateD']:'';
								$voiture['dateF']=isset($voiture['dateF'])?$voiture['dateF']:'';
								echo "
									<div class=\"col-sm-4\">
										<div class=\"product-image-wrapper\">
											<div class=\"single-products\">
													<div class=\"productinfo text-center\">
														<img src=\"vue/img/" . $voiture['photo'] . "\" alt=\"car-pic\" />
														<h2>" . $voiture['modele'] . "</h2>
														<p>" . $voiture['prix'] . "€ /j</p>
														<p>Date début : " . $voiture['dateD'] . " </p>
														<p>Date fin : " . $voiture['dateF'] . "</p>
														<a href=\"#\" class=\"btn btn-default add-to-cart\"></i>Info</a>
													</div>
											</div>
										</div>
									</div>";
								
								unset($car);							
							}
						}
						?>				
				</div>
			</div>
		</div>
	</section>
	
	

