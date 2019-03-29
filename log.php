<?php

session_start();

if(!$_SESSION["auth"])
{
	header("location:login.php");
}

if(isset($_POST["leggtil"]))
{
require 'kobling.php';

$vekt = $_POST["vekt"];
$repetitisjoner = $_POST["repetisjoner"];
$bruker = $_SESSION["bruker_id"];
$oevelse_id = $_POST["oevelse_id"];
$dato = $_POST["dato"];

$query = "INSERT INTO logg (vekt, repetisjoner, oevelse_id, bruker_id, dato) VAlUES ('$vekt', '$repetitisjoner', '$oevelse_id', '$bruker', '$dato')";
	
if($kobling->query($query))
	{
		header("location:index.php");
	}
else
{
	echo "Noe gikk galt med spørringen $query ($kobling->error)";
}
}
?>
	<html>
	<head>
	<meta charset="UTF-8">
	<title> Log </title>
	</head>

	<body>

	<h1> Log </h1>
	<form method="POST">
	<input type="number" name="vekt" placeholder="Weight">
	
	<input type="number" name="repetisjoner" placeholder="Repetitions">
	
	<input type="datetime-local" name="dato">

<?php

require 'kobling.php';

$sql = "SELECT * FROM oevelse";
$resultat = $kobling->query($sql);

echo "<select name='oevelse_id'>";

while($rad = $resultat->fetch_assoc())
{
$oevelse_id = $rad["oevelse_id"];
$oevelse = $rad["oevelse"];
	
	echo "<option value='$oevelse_id'> $oevelse </option>";	
}	
echo "</select>";	

?>
	
	<input type="submit" name="leggtil" value="Add">
	
</form>

</body>
</html>