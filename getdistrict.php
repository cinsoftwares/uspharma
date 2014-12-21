<?php


 require_once 'database.php';
 $stateid = $_GET["state"];
					$con = mysqli_connect($host, $user, $pass, $dbname);
					if(mysqli_connect_errno()!=0)
					{
						die("Error ");
					}
					

else
					{
						$sql = "Select * from district where stateid=$stateid";
						$result = mysqli_query($con, $sql);
						while ($row = mysqli_fetch_array($result)) 
						{
							
							echo $row['name'].",";
							echo $row['districtid'].",";
						}	
					}


 
?>