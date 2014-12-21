<?php


 require_once 'database.php';
 $districtid = $_GET["district"];
					$con = mysqli_connect($host, $user, $pass, $dbname);
					if(mysqli_connect_errno()!=0)
					{
						die("Error ");
					}
					

else
					{
						$sql = "Select * from city where districtid=$districtid";
						$result = mysqli_query($con, $sql);
						while ($row = mysqli_fetch_array($result)) 
						{
							
							echo $row['name'].",";
							echo $row['cityid'].",";
						}	
					}


 
?>