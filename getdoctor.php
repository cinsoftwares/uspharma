<?php
require_once 'database.php';
$districtid = $_GET['districtid'];
//SELECT  doctor.name, doctor.id, doctor.cityid, city.districtid, city.name, district.name FROM doctor, city, district where  city.districtid=5 and city.cityid=doctor.cityid and district.districtid= city.districtid
		$sql = "SELECT  doctor.name, doctor.id FROM doctor, city where  city.districtid=$districtid and city.cityid=doctor.cityid";
		$result = mysqli_query($con, $sql);
		//echo "$districtid,";
		while($row = mysqli_fetch_array($result))
		{
			echo "$row[name],";
			echo "$row[id],";
		}
	
