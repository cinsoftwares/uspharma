<?php
	include 'moor/moor.php';
	Moor::route('/', function(){
		echo "haai";
	})->run();
	
	