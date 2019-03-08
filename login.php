<html>
<head>
<meta charset="UTF-8">
</head>
<?php

if($_POST)
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
$passord = $_POST["passord"];


$query="SELECT * FROM bruker WHERE epost='$epost' and passord='$passord'";

$result=mysqli_query($kobling, $query);
if(mysqli_num_rows($result)==1)
{
	session_start();
	$_SESSION["auth"]="true";
	header("location: hovedside.php");
}

else{ echo "Wrong username or password";}
}
?>

<body>
<h1> Login </h1>
<form method="POST">
e-mail<br>
<input type="text" name="epost">
password
<input type="password" name="passord">
<br>
<input type="submit" value="Login">
</form>
</body>
</html>