<?php

require_once 'database.php';
$con=mysqli_connect($host,$user,$pass,$dbname);
if(mysqli_connect_errno()!=0)
{
	          die (mysqli_connect_error());
}   
else{
	
	$sql="INSERT INTO doctor (name, address, gender, phone, mobile, email, hospital, specialized, type, cityid) VALUES
	 ('$_POST[name]', '$_POST[address]', '$_POST[gender]', '$_POST[phone]', '$_POST[mobile]', '$_POST[email]', '$_POST[workplace]',
	   '$_POST[rank]', '$_POST[type]', $_POST[city]);";
	
	
	$i =mysqli_query($con,$sql);
	if($i==1){
			header("Location: add_doctor_staff.php?var=sda");
	}
	else{
		echo "Error :".mysqli_error($con);
	}
	
	
	
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