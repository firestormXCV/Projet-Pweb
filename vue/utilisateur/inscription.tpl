<!DOCTYPE html>
<html>
<head>
<title>Ident</title>
</head>

<body>
<form action="index.php?controle=utilisateur&action=ajout_u" method="POST">
    <label>Nom</label>
    <input type="text" id="fname" name="nom" value="<?php echo $nom ;?>"><br>
    <label>Numero</label>
    <input type="text" id="lname" name="num" value="<?php echo $num ;?>"><br>
    <label>Prenom</label>
    <input type="text" id="fname" name="prenom" value="<?php echo $prenom ;?>"><br>
    <label>Email</label>
    <input type="text" id="fname" name="email" value="<?php echo $email ;?>"><br><br>
    <input type="submit" value="Submit"><br><br>
</form>
<div><?php echo $msg ;?></div>
</body>

</html> 