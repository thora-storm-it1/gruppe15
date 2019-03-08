<!doctype html>
<html>

<head>
<meta charset="UTF-8">
</head>

<?php

if(isset($_POST["leggtil"]))
{
$tjener = "localhost";
$brukernavn = "root";
$passord = "";
$database = "projekt_test";

$kobling = new mysqli($tjener, $brukernavn, $passord, $database);

if($kobling -> connect_error) 
{
	die ("Noe gikk galt:" . $kobling -> connect_error);
}


	$epost = $_POST["epost"];
	$fornavn = $_POST["fornavn"];
	$etternavn = $_POST["etternavn"];
	$passord = $_POST["passord"];
	$vekt = $_POST["vekt"];
	
	$sql = "INSERT INTO BRUKER (epost, fornavn, etternavn, passord, vekt) VALUES ('$epost', '$fornavn', '$etternavn', '$passord', '$vekt')";
	
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

<form method="POST">
	Name
	<input type="text" name="fornavn">
	
	Surname
	<input type="text" name="etternavn">
	
	E-mail
	<input type="text" name="epost">
	
	Password
	<input type="text" name="passord">
	
	Weight (kg)
	<input type="text" name="vekt">
	
	<input type="submit" name="leggtil" value="Legg til">
	
</form>



</html>