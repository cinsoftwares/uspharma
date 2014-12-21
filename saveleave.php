<?php
session_start();
$staffid = $_SESSION['id'];
require_once 'database.php';
/*$con=mysqli_connect($host,$user,$pass,$dbname);
if(mysqli_connect_errno()!=0)
{
	          die (mysqli_connect_error());
} */  
if($_POST['update']=='no')
{
if($_POST['id']=='')
{
	
	$sql="INSERT INTO daily (date, townworked, workedwith, doctorid, pob, other, staffid, km, station, isleave) VALUES
	 ('$_POST[date]', 0, 0, 0, '', '',$staffid, '', '', 1)";
}
else {
	$sql = "UPDATE daily SET  townworked = $_POST[city], workedwith = $_POST[with], doctorid = $_POST[doctor], 
		pob = '$_POST[pob]', other = '$_POST[other]', km='$_POST[km]', station = '$_POST[station]' where dailyid = $_POST[id]";
}	
	
	$i =mysqli_query($con,$sql);
	if($i==1){
		$sql = "insert into leave_detail (staffid, date, reason) values ($staffid, '$_POST[date]', '$_POST[reason]')";
		$i =mysqli_query($con,$sql);
		if($i==1)
		
			header("Location: leave.php?var=sl");
		else{
			echo "Error :".mysqli_error($con);
		}
	}
	else{
		echo "Error :".mysqli_error($con);
	}
	
}


else {
	
	$sql = "update leave_detail set reason='$_POST[reason]'  where staffid=$staffid and date='$_POST[date]'";
	$i =mysqli_query($con,$sql);
	if($i==1)
		
		header("Location: leave.php?var=usl");
	else {
		echo "Error :".mysqli_error($con);
	}
	
}
	
  
