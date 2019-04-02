<html>
<head>
<link rel="stylesheet" href="hovedside.css">
</head>
<?php

session_start();

if(!$_SESSION["auth"])
{
	header("location:testlogin4.php");
}

require 'kobling.php';

?>
<html>
<head>
<link rel="stylesheet" href="hovedside.css">
</head>

<body>
<div class="container">
<h1> Main Page </h1>

<ul>
<div class="valg">
<div class="meny">
	<li><a href="logg_main.php"><img src="log1.png" class="responsive"></a></li>
		<h2> Log </h2>
		Log your lifts to see your progression
</div>
<div class="meny">
	<li><a href="kalkulator.php"><img src="kalkuler.png" class="responsive"></a></li>
		<h2> Calculate </h1>
		Chose to calculate either macros or calories
</div>
</div>
</ul>

<form method="link" action="logout.php">
<input type="submit" value="Log out">
</form>

</div>
</body>
</html>