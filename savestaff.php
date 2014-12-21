<?php

require_once 'database.php';
$con=mysqli_connect($host,$user,$pass,$dbname);
if(mysqli_connect_errno()!=0)
{
	          die (mysqli_connect_error());
}   
else{
	$name=explode(' ', trim($_POST['name']));
	$name[0] = str_shuffle($name[0]);
	$sql="INSERT INTO staff (name, address, dob, gender, email, password, designation, phone, doj, photo, cityid) VALUES 
	('$_POST[name]', '$_POST[address]', '$_POST[dob]', '$_POST[gender]', '$_POST[email]',  'password', 
	'$_POST[designation]', '$_POST[phone]', '$_POST[doj]', 'images/photo/unavailable.jpg', $_POST[city])";
	
	
	$i =mysqli_query($con,$sql);
	if($i==1){
		
			
		header("Location: add_staff.php?var=ssa");
	}
	else{
		echo "Error :".mysqli_error($con);
	}
}      
?>