<?php
session_start();
//Connect to server and select database
require_once 'database.php';

// Get the login credentials from user
$username = $_POST['email'];
$password = $_POST['password'];


//Secure credentials
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);


// Check the users input against the DB.
$sql="select  email, type, id from staff where email='$username' and password = '$password'";

$result = mysqli_query($con, $sql) or die ("Unable to verify user because " . mysqli_error($con));

// Mysql_num_row is counting table row
$count = mysqli_num_rows($result);
// If result matched $username and $password, table row must be 1 row
	
if($count==1)
{
	//code to extract type field if username matches
	$fetch = mysqli_fetch_array($result);
	$_SESSION['id']=$fetch['id'];
	$_SESSION['email']=$fetch['email'];

	if($fetch['type']=='admin')
	{
		header("Location: report.php");
	}
	else if($fetch['type']=='staff')
	{
		header("Location: staff_daily_report.php");
		//echo $_SESSION['email'];		
	}
	
	
		
}
else 
	{
		header("Location: index.php?var=fail");	
	}
		
	

?>