<!doctype html>
<html>

<?php

if(isset($_POST["leggtil"]))
{
$tjener = "localhost";
$brukernavn = "root";
$passord = "";
$database = "prosjekt_test";

$kobling = new mysqli($tjener, $brukernavn, $passord, $database);

if($kobling -> connect_error) 
{
	die ("Noe gikk galt:" . $kobling -> connect_error);
}


	$epost = $_POST["e-post"];
	$fornavn = $_POST["fornavn"];
	$etternavn = $_POST["etternavn"];
	$passord = $_POST["passord"];
	$vekt = $_POST["vekt"];
	
	$sql = "INSERT INTO BRUKER (e-post, fornavn, etternavn, passord, vekt) VALUES ('$epost', '$fornavn', '$etternavn', '$passord', '$vekt')";
	
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
	Fornavn
	<input type="text" name="fornavn">
	
	Etternavn
	<input type="text" name="etternavn">
	
	E-post
	<input type="text" name="epost">
	
	Passord
	<input type="text" name="passord">
	
	Vekt
	<input type="text" name="passord">
	
	<input type="submit" name="leggtil" value="Legg til">
	
</form>



</html>