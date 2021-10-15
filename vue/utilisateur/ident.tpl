
		<!--Connexion en tant que entreprise cliente-->
		<div id="client">
			<h3> Client ?</h3>
			<form action="index.php?controle=utilisateur&action=identClient" method="post">
				<label>nom :</label>
				<input name="nom" class="nom" value="<?php echo $nom ?>" /> <br/>
				<label>identifiant :</label>
				<input name="num" class="num" value="<?php echo $num ?>" /><br/>
				
				<input type= "submit" value= "ok" /> 
			</form>
			
			{#<div id ="m"> <?php echo $msg; ?> </div>#}
		</div>


		<!--Connexion en tant que loueur-->
		<div id="Loueur">
			<h3> Loueur ?</h3>
			<form action="index.php?controle=utilisateur&action=identLoueur" method="post">
				<label>nom :</label>
				<input name="nom" class="nom" value="<?php echo $nom ?>" /> <br/>
				<label>identifiant :</label>
				<input name="num" class="num" value="<?php echo $num ?>" /><br/>
				
				<input type= "submit" value= "ok" /> 
			</form>
			
			<div id ="m"> <?php echo $msg; ?> </div>
		</div>