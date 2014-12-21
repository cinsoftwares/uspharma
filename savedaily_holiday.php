<?php
session_start();
$staffid = $_SESSION['id'];
require_once 'database.php';
$date = date('Y-m-d');
$sql="INSERT INTO daily (date, townworked, workedwith, doctorid, pob, other, staffid, km, station, isleave) VALUES
	 ('$date', 0, 0, 0, '', '',$staffid, '', '', 2)";
	 
	 $i =mysqli_query($con,$sql);
	if($i==1){
		header("Location: staff_daily_report.php?var=nd");
	}
	else{
		echo "Error :".mysqli_error($con);
	}
