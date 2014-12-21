<?php
	$host = "localhost";
	$user = "root";
	$pass = "cin";
	$dbname = "uspharma";
	/*$mysqli = new mysqli($host, $user, $pass, $dbname);
	
	if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}*/
	$con = mysqli_connect($host, $user, $pass, $dbname) or die("Error in connection page".mysql_error());
?>