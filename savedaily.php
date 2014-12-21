<?php
session_start();
$staffid = $_SESSION['id'];
require_once 'database.php';
/*$con=mysqli_connect($host,$user,$pass,$dbname);
if(mysqli_connect_errno()!=0)
{
	          die (mysqli_connect_error());
} */  
if($_POST['id']=='')
{
	if($_POST[station]=='HQ')
		$km = 0;
	else {
		$km = $_POST['km'];
	}
	
	$sql="INSERT INTO daily (date, townworked, workedwith, doctorid, pob, other, staffid, km, station) VALUES
	 ('$_POST[date]', $_POST[city], $_POST[with], $_POST[doctor], '$_POST[pob]', '$_POST[other]',$staffid, km, '$_POST[station]')";
}
else {
	$sql = "UPDATE daily SET  townworked = $_POST[city], workedwith = $_POST[with], doctorid = $_POST[doctor], 
		pob = '$_POST[pob]', other = '$_POST[other]', km=$km, station = '$_POST[station]' where dailyid = $_POST[id]";
}	
	
	$i =mysqli_query($con,$sql);
	if($i==1){
			header("Location: staff_daily_report.php?var=sdar");
	}
	else{
		echo "Error :".mysqli_error($con);
	}
	
	
	
  



function sanitizeString($var)
{
    $var = stripslashes($var);
    $var = htmlentities($var);
    $var = strip_tags($var);
    return $var;
} 
function sanitizeMySQL($var)
{
    $var = mysql_real_escape_string($var);
    $var = sanitizeString($var);
    return $var;
}
  
?>