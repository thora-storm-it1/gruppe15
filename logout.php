<?php

session_start();
session_destroy();

header ("location: testlogin4.php");

exit;
?>