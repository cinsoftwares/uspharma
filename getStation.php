<?php
session_start();
$email = $_SESSION['email'];

 require_once 'database.php';
 $selcityid = $_GET["cityid"];
 
 $seldistrict='';
						$selcity="";
						$seldistrictid='';
						
						$mycityid='';
						$mycity='';
						$mydistrict='';
						$mydistictid='';
					$con = mysqli_connect($host, $user, $pass, $dbname);
					if(mysqli_connect_errno()!=0)
					{
						die("Error ");
					}
					

else
					{
						
						
						$sql = "select district.name, city.name as city, district.districtid from district , city where city.districtid = district.districtid and  city.cityid=$selcityid";
						$result = mysqli_query($con, $sql);
						if ($row = mysqli_fetch_array($result)) 
						{
							
							$seldistrict= $row['name'];
							$selcity=$row['city'];
							$seldistrictid=$row['districtid'];
							echo $selcity.",";
						
						
						
						$sql="select staff.cityid, city.name as city, district.name, district.districtid as id from staff, city, district where email='$email' and
						 city.cityid=staff.cityid and district.districtid= city.districtid";	
						 
						 $result = mysqli_query($con, $sql);
						 
						if ($row = mysqli_fetch_array($result)) 
						{
						
					
							$mycity= $row['city'];
							$mycityid=$row['cityid'];
							$mydistrict=$row['name'];
							$mydistrictid=$row['id'];
							
							//echo $seldistrictid. ' = '.$mydistrictid;
						
						if($seldistrictid==$mydistrictid)
						{
							if($mycityid==$selcityid)
							{
								echo "HQ,";
							}	
							else 
							{
								echo "EXQ,";
							}
							
						}
						else
						{
							//echo $seldistrictid. ' = '.$mydistrictid;
							echo "OS,";
						}
						
						
						echo $seldistrictid.",";
						}
						
						}
						
						
						
						
						
						
					}

					
				
 /*$distance = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$mycity&destinations=$selcity");
 $decode = json_decode($distance);
 // echo "Select,";
 //foreach ($city->Data as $value) {
     echo $decode->rows[0]->elements[0]->distance->text.",";
 //}
 
		*/			


 
?>