	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>


						<form action="index.php?controle=utilisateur&action=login" method="post">
							<input type="email" placeholder="Email Address" name="email"/> <!--name pour le php, recup avec $_post-->
							<input type="password" placeholder="Mot de passe" name="mdp"/>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>


					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>


						<form action="index.php?controle=inscriptionClient?action=inscriptionP" method="post">
							<input type="text" values="<?php echo $nom; ?>" name="nom"/>
							<input type="email" values="<?php echo $email; ?>" name="email"/>
							<input type="password" values="<?php echo $mdp; ?>" name="mdp"/>
							<button type="submit" class="btn btn-default">S'Inscrire</button>
						</form>

						<div> <?php $sql="SELECT * FROM utilisateur"; sql->execute();?> </div>

					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
