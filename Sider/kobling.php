<?php

$tjener = "localhost";
$brukernavn = "root";
$passord = "";
$database = "databasetest";

$kobling = new mysqli($tjener, $brukernavn, $passord, $database);

if($kobling -> connect_error) 
{
	die ("Noe gikk galt:" . $kobling -> connect_error);
}
?>