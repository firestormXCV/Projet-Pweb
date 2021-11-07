
	<!--PAGE qui sert pour voir le panier, supprimer des items et valider -->
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Voiture</td>
							<td class="description">Description</td>
							<td class="dateLocation">Date de location</td>
							<td class="price">Prix</td>
							<!--<td class="quantity">Quantité</td> A supprimer si inutile
							<td class="total">Total</td>-->
							<td></td> <!--Pour le bouton supprimer-->
						</tr>
					</thead>
					<tbody>
						
						<?php
							if(!isset($_SESSION['panier'])){ //si le panier est vide afficher un msg 
								echo "
								<tr>
									<td >
										<h4>Panier vide :( </h4>
									</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>

							  ";
							}
							else{
								foreach($_SESSION['panier'] as $location){

									foreach($_SESSION['voitures'] as $voiture){
										if($location['idVoiture']==$voiture['idVoiture']){
											$idVoiture=$location['idVoiture'];
											$photo=$voiture['photo'];
											$modele=$voiture['modele'];
											$prix=$voiture['prix'];
											$deb=$location['dateDebut'];
											$fin=$location['dateFin'];
											echo "
												<tr>
													<td class=\"cart_product\">
														<img src=\"$photo\" alt=\"photo $modele\">
													</td>
													<td class=\"cart_description\">
														<h4>$modele</h4>
													</td>
													<td class=\"cart_price\">
														<p> De $deb à $fin </p>
													</td>
													<td class=\"cart_price\">
														<p>$prix €</p>
													</td>
													
													<td class=\"cart_delete\">
														<form action=\"index.php?controle=utilisateur&action=retirerPanier&idVoiture=$idVoiture\" method=\"post\">
															<button type=\"submit\" class=\"btn btn-default\"><i class=\"fa fa-times\"></i></button>
														</form>
													</td>
												</tr>

											";	   
											/* AVANT LE DERNIER Si on veut le remettre
											<td class=\"cart_quantity\">
													<div class=\"cart_quantity_button\">
														<a class=\"cart_quantity_up\" href=\"\"> + </a>
														<input class=\"cart_quantity_input\" type=\"text\" name=\"quantity\" value=\"1\" autocomplete=\"off\" size=\"2\">
														<a class=\"cart_quantity_down\" href=\"\"> - </a>
													</div>
												</td>
												<td class=\"cart_total\">
													<p class=\"cart_total_price\">$59</p>
												</td>
											*/
											//pour la quantité à supprimer si inutile 
											//pour le bouton supprimer : diriger vers une fonction à creer pour supprimer dans la session la voiture du panier
										
										}
									}
										
								}

							}
							//var_dump($_SESSION);die();

						?>
					</tbody>
				</table>
		<a class="btn btn-default check_out " href="index.php?controle=utilisateur&action=validerPanier">Valider le panier</a> 
			</div>
		</div>

			
	</section> <!--/#cart_items-->


	<!--/#do_action-->
	<!--
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section>-->