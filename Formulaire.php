<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

    <form action="Formulaire.php" method="get" >
        <label for="fname">Nom</label>
        <input type="text" id="fname" name="nom" value="John"><br>
        <label for="fname">mdp</label>
        <input type="text" id="fname" name="mdp" value="John"><br>
        <label for="lname">Mail</label>
        <input type="text" id="lname" name="email" value="Doe"><br><br>
        <input type="submit" value="Submit">
      </form>
      <?php require('./controle/inscriptionClient.php'); echo $msg; ?>

</body>
</html>