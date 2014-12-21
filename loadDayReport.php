<?php
session_start();
$id= $_SESSION['id'];
$date = $_GET['date'];

require_once 'database.php';

$sql = "Select * from daily where staffid=$id and date= '$date'";
$res = mysqli_query($con, $sql);
//echo "jeje".",";
if($row = mysqli_fetch_array($res))
{
	echo $row['townworked'].",";
	echo $row['workedwith'].",";
	echo $row['doctorid'].",";
	echo $row['pob'].",";
	echo $row['other'].",";
	echo $row['dailyid'].",";
}

