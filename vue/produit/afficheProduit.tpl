
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
					if(!isset($_SESSION['msgErr'])){
						$_SESSION['msgErr']='';
					}
					$msg=$_SESSION['msgErr'];
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
									<span> " . $produit[0]['prix']. "€ /j</span>									
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
						$msg
						<form action=\"index.php?controle=utilisateur&action=louer\" method=\"post\">
							<label for=\"start\">Date debut:</label>
							<input type=\"date\" id=\"start\" name=\"dateDebut\"min=\"$myDate\" max=\"2021-12-31\">
							<label for=\"start\">Date fin:</label>

							<input type=\"date\" id=\"start\" name=\"dateFin\"min=\"$myDate\" max=\"2021-12-31\">

							";
							if (!empty($_SESSION['profil'])) {
								echo "<button type=\"submit\" class=\"btn btn-fefault cart\">
									<i class=\"fa fa-shopping-cart\"></i>
									Ajouter au panier
								</button>";
							}else {
								echo "<p>Pour louer un véhicule merci de vous connecter.</p>";
							}
							echo"
						</form>
					</div><!--/category-tab-->					
				</div>";						
				?>
			</div>
			
		</div>
	</section> 

