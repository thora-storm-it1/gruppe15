<!doctype html>
<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="sign_in.css">
<title> Sign In </title>
</head>

<body>

<?php

if(isset($_POST["leggtil"]))
{

	require 'kobling.php';

	$epost = $_POST["epost"];
	$fornavn = $_POST["fornavn"];
	$etternavn = $_POST["etternavn"];
	$passord = $_POST["passord"];
	$vekt = $_POST["vekt"];
	$hoyde = $_POST["hoyde"];
	$fodselsaar = $_POST["fodselsaar"];
	$kjonn = $_POST["kjonn"];
	
	$sql = "INSERT INTO BRUKER (epost, fornavn, etternavn, passord, vekt, hoyde, fodselsaar, kjonn_id) 
	VALUES ('$epost', '$fornavn', '$etternavn', '$passord', '$vekt', '$hoyde', '$fodselsaar', '$kjonn')";
	
	if($kobling->query($sql))
	{
		echo "Spørringen $sql ble gjennomført.";
	}
	
	else
	{
		echo "Noe gikk galt med spørringen $sql ($kobling->error)";
	}
}
?>

<div class="site">

<div class="container">
<div class="input">
<form method="POST">
	<input type="text" name="fornavn" placeholder="Name" required>
	
	<input type="text" name="etternavn" placeholder="Surname" required>
	
	<input type="text" name="epost" placeholder="E-mail" required>
	
	<input type="password" name="passord" placeholder="Password" required>

	<input type="number" name="vekt" placeholder="Weight in kg" required>
	
	<input type="number" name="hoyde" placeholder="Height in cm" required>
	
	<input type="number" name="fodselsaar" placeholder="Birthyear" min="1940" max="2002" required>
	
	<?php
	require 'kobling.php';
	
	echo "<select name='kjonn'>";
	
	$query = "SELECT * FROM kjonn";
	$resultat = $kobling->query($query);
	
	while($rad = $resultat->fetch_assoc())
	{
	$kjonn_id = $rad["kjonn_id"];
	$kjonn = $rad["kjonn"];
	
		echo "<option value='$kjonn_id'> $kjonn </option>";	
	}	
	echo "</select>";	

	?>
	
	<div class="center">
	<input type="submit" name="leggtil" value="Sign in">
	</div>
<p>Already have an account? <a href="testlogin4.php"> Login here</a>.</p>
</div>	
</form>
</div>
</div>

</body>

</html>