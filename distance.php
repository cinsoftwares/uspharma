<?php
	$from = $_GET['mycity'];
	$to = $_GET['selcity'];
		 $distance = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to");
 $decode = json_decode($distance);
 // echo "Select,";
 //foreach ($city->Data as $value) {
     echo $decode->rows[0]->elements[0]->distance->text;
 //}
?>