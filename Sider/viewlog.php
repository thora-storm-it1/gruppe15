<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="..\Css\viewlogg.css">
</head>
<body>
<div class="content">
<?php

session_start();

echo "<table>";
	echo "<tr>";
		echo "<th> Dato </th>";
		echo "<th> Repetisjoner </th>";
		echo "<th> Vekt </th>";
		echo "<th> Øvelse </th>";
	echo "</tr>";

require 'kobling2.php';

$bruker = $_SESSION["bruker_id"];

$sql = "SELECT * FROM logg JOIN oevelse ON oevelse.o_id=logg.o_id WHERE bruker_id='$bruker' ORDER BY type, dato";

$resultat = $kobling->query($sql);

while($rad = $resultat->fetch_assoc()) 
{ 
	$dato = $rad["dato"];
	$repetisjoner = $rad["repetisjoner"];
	$vekt = $rad["vekt"];
	$oevelse = $rad["type"];
	
	echo " <tr>";
		echo "<td> $dato </td>";
		echo "<td> $repetisjoner </td>";
		echo "<td> $vekt </td>";
		echo "<td> $oevelse </td>";
	echo "</tr>";
}

echo "</table>";
?>
<a href="logg_main.php"> Add log </a>
</div>
</body>
</html>