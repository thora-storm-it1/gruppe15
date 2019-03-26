<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="login.css">
</head>
<body>

<div class="container">
<div class="box">
<h1> LOGIN </h1>

<form method="POST">
	<div class="input">
		<input type="text" name="epost" placeholder="E-mail">
		<input type="password" name="passord" placeholder="Password">
	</div>
<input type="submit" value="Login">
</form>
<a href="test_prosjekt.php"> Sign in here </a>

</div>
</div>
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
	while($rad = $result->fetch_assoc())
{
	$id = $rad['bruker_id'];
}
	$url = "hovedside.php?id". $id;
	header("location: index.html");
	exit();
}

else
{ echo "Wrong username or password";}
}
?>
</body>
</html>