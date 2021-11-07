	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<form action="index.php?controle=voiture&action=ajouterVoiture" method="post" enctype="multipart/form-data">
						<input type="file" placeholder="choisir un fichier" name="voitureAjout"/>
						<input type="text" placeholder="Modele" name="modeleAjout"/>
						<input type="number" placeholder="Prix" name="prixAjout"/>
						<button type="submit" class="btn btn-default">Ajouter</button>
					</form>
					<div id ="msgErr">
						<?php
							if(!isset($_SESSION['msgErr'])){
								$_SESSION['msgErr'] = '';
							} else {
								echo $_SESSION['msgErr'];
							}
						?>
					</div>

					<form action="index.php?controle=voiture&action=retirerVoiture" method="post" enctype="multipart/form-data">
						<input type="text" placeholder="Modèle" name="prixAjout"/>
						<button type="submit" class="btn btn-default">Retirer le véhicule</button>
					</form>
					<div id ="msgErr">
						<?php
							if(!isset($_SESSION['msgErr'])){
								$_SESSION['msgErr'] = '';
							} else {
								echo $_SESSION['msgErr'];
							}
						?>
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Voiture Disponible</h2>

						<?php
						$_SESSION['voituresDispo']=$voituresDispo;

						foreach($voituresDispo as $voitureDispo) {
							$car;
							
							foreach($voitureDispo as $v) {
								$car[] = $v;								
							}
							
							echo "
								<div class=\"col-sm-4\">
									<div class=\"product-image-wrapper\">
										<div class=\"single-products\">
												<div class=\"productinfo text-center\">
													<img src=\"vue/img/" . $car[2] . "\" alt=\"car-pic\" />
													<h2>" . $car[3] . "</h2>
													<p>" . $car[4] . "€/j</p>
													<a href=\"#\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Louer</a>
													<a href=\"#\" class=\"btn btn-default add-to-cart\"></i>Info</a>
													<a href=\"#\" class=\"btn btn-default add-to-cart\"></i>Supprimer</a>
												</div>
												<!--<div class=\"product-overlay\">
													<div class=\"overlay-content\">
														<h2>$car[3]</h2>
														<p>$car[4]€ /j</p>
														<a href=\"#\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Louer</a>
													</div>
												</div>-->
										</div>
									</div>
								</div>";
							
							unset($car);							
						}
							
						?>				
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Voitures Louées</h2>

						<?php
						$_SESSION['voituresLouees']=$voituresLouees;

						foreach($voituresLouees as $voitureLouees) {
							$car;
							
							foreach($voitureLouees as $v) {
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
													<a href=\"#\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Louer</a>
													<a href=\"#\" class=\"btn btn-default add-to-cart\"></i>Info</a>
													<a href=\"#\" class=\"btn btn-default add-to-cart\"></i>Supprimer</a>
												</div>
												<div class=\"product-overlay\">
													<div class=\"overlay-content\">
														<h2>$car[3]</h2>
														<p>$car[4]€ /j</p>
														<a href=\"#\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Louer</a>
													</div>
												</div>
										</div>
									</div>
								</div>";
							unset($car);							
						}
							
						?>				
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Voiture en Revision</h2>

						<?php
						$_SESSION['voituresRevision']=$voituresRevision;

						foreach($voituresRevision as $voitureRevision) {
							$car;
							
							foreach($voitureRevision as $v) {
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
													<a href=\"#\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Louer</a>
													<a href=\"#\" class=\"btn btn-default add-to-cart\"></i>Info</a>
													<a href=\"#\" class=\"btn btn-default add-to-cart\"></i>Supprimer</a>
												</div>
												<div class=\"product-overlay\">
													<div class=\"overlay-content\">
														<h2>$car[3]</h2>
														<p>$car[4]€ /j</p>
														<a href=\"#\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Louer</a>
													</div>
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
	
	

