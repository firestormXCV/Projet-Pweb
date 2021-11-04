	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>


						<form action="index.php?controle=utilisateur&action=login" method="post">
							<input type="email" placeholder="Email Address" name="email" value="Isaac@gmail.com"/> <!--name pour le php, recup avec $_post-->
							<input type="password" placeholder="Mot de passe" name="mdp" value="MD5"/>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
						<div id ="msgLog"> <?php $msg=isset($msgLog)?trim($msgLog):''; echo $msg; ?> </div>

					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>


						<form action="index.php?controle=utilisateur&action=inscription" method="post">
							<input type="text" name="nomIns" placeholder="Nom" value="NomDeTest"/>
							<input type="email" name="emailIns" placeholder="Email" value="EmailDeTest@gmail.com"/>
							<input type="password" name="mdpIns" placeholder="Mot de passe" value="Ok"/>
							<button type="submit" class="btn btn-default">S'Inscrire</button>
						</form>
						<div id ="msgSign"> <?php $msg=isset($msgSign)?trim($msgSign):''; echo $msg; ?> </div>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
