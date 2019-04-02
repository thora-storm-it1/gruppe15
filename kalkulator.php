<html>
<head>
<meta charset="UTF-8">
<title> Calculate </title>
</head>

<body>

<h1> Calculate </h1>

<form method="GET">
<select name="regn">
	<option value="protein"> Protein</option>
	<option value="kalori"> Calories</option>
<input type="submit" name="kalkuler" value="Calculate">
</form>
<div class="svar">
<?php

session_start();

if(!$_SESSION["auth"])
{
	header("location:testlogin4.php");
}

if(isset($_GET["kalkuler"]))
{

require 'kobling.php';

$bruker = $_SESSION["bruker_id"];

$sql ="SELECT * FROM bruker WHERE bruker_id = '$bruker'";;
$resultat = $kobling->query($sql);

while($rad = $resultat->fetch_assoc())
{
	$hoyde = $rad['hoyde'];
	$vekt = $rad['vekt'];
	$alder = 2019 - $rad['fodselsaar'];
	
}

$kjonn = $_SESSION['kjonn_id'];
$regne = $_GET['regn'];


	if($kjonn == 1 & $regne == "kalori")
	{
	$kcalk= 447.593 + (3.098*$hoyde) + (9.247*$vekt) - (4.33*$alder);

	echo "Your BMR is at $kcalk calories";
	}

	else if ($kjonn == 2 & $regne == "kalori")
	{
	$kcalm=  88.362 + (4.799*$hoyde) + (13.397*$vekt) - (5.677*$alder);

	echo "Your BMR is at $kcalm calories";
	}

	else if ($regne == "protein")
	{
	$protein= 1.8*$vekt;
	
	echo "$protein";
	}
}
?>
</div>

<form method="link" action="logout.php">
	<input type="submit" value="Log out">
</form>

</body>
</html>