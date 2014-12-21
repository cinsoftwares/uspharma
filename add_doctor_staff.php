<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

 <?php include 'contents\header.php' ?>;

<!-- Mobile viewport -->
<meta name="viewport" content="width=device-width; initial-scale=1.0">

<link rel="shortcut icon" href="images/favicon.ico"  type="image/x-icon" />

<!-- CSS-->
<!-- Google web fonts. You can get your own bundle at http://www.google.com/fonts. Don't forget to update the CSS accordingly!-->
<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Ubuntu' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="js/flexslider/flexslider.css" />
<link rel="stylesheet" href="css/basic-style.css">

<!-- end CSS-->
    
<!-- JS-->
<script src="js/libs/modernizr-2.6.2.min.js"></script>
<!-- end JS-->
<link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" />
    
<script>
	function selectItem()
	{
		var state = document.getElementById('state').value = 13;
		loadDistrict(state);
		loadCity(0);
	}
	
	function loadDistrict(state)
	{
	//	alert(state);
	var option = document.createElement("option");
		try{
			var district = document.getElementById('district'); 
			while(district.options.length){
				district.remove(0);
			}
			
			
				option.innerHTML="&lt;--Select--&gt;";
				option.value='';
				district.appendChild(option);
				
		if(state==''){
			return;
		}	
		
		
		var xmlhttp;
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		}
		catch(err){
		alert(err)
		}
		
			xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4 &&  xmlhttp.status==200){
				var city = xmlhttp.responseText;
				var cityArray = new Array();
				cityArray=city.split(',');
				for(var i=0; i<cityArray.length-1; i+=2){
					try{
					 option = document.createElement("option");
					option.innerHTML = cityArray[i];
					option.value=cityArray[i+1];
					district.appendChild(option);
					}
					catch(err){
						alert("Error :"+err);
					}
				}
				
				
			}
		}
		xmlhttp.open("GET", "getdistrict.php?state="+state, true);
		xmlhttp.send();
		
		
	}
	
	function loadCity(district)
	{
		var option = document.createElement("option");
		try{
			var cityCombo = document.getElementById('city'); 
			while(cityCombo.options.length){
				cityCombo.remove(0);
			}
			
			
				option.innerHTML="&lt;--Select--&gt;";
				option.value=''
				cityCombo.appendChild(option);
				
		if(district==''){
			return;
		}	
		
		
		var xmlhttp;
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		}
		catch(err){
		alert(err)
		}
		
			xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4 &&  xmlhttp.status==200){
				var city = xmlhttp.responseText;
				var cityArray = new Array();
				cityArray=city.split(',');
				for(var i=0; i<cityArray.length-1; i+=2){
					try{
					 option = document.createElement("option");
					option.innerHTML = cityArray[i];
					option.value=cityArray[i+1];
					cityCombo.appendChild(option);
					}
					catch(err){
						alert("Error :"+err);
					}
				}
				
				
			}
		}
		xmlhttp.open("GET", "getCity.php?district="+district, true);
		xmlhttp.send();
			
	}
	
</script>

</head>

<body id="home" onload="selectItem()">
<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

  
<!-- header area -->
    <header class="wrapper clearfix">
		       
       
        <!-- main navigation -->
       <?php include 'contents\menu_staff.php'; ?>
       <!-- #topnav -->
  
    </header><!-- end header -->
 
 
<section id="page-header" class="clearfix">    
<!-- responsive FlexSlider image slideshow -->
 <?php if(isset($_GET['var']))
                        {
                        if($_GET['var']=="sda"){?>
                           <div class="alert alert-success alert-message">Doctor Details Inserted..</div>
                          <?php }
						}
                        ?>
        
                        

<div class="wrapper">
		<h1>Doctor Registration</h1>
    
    <form role="form" class="form-horizontal" action="savedoctor_staff.php" method="post">
	
		
		<div class="form-group">
			<div class="col-sm-1">
      			<label for="name" class="control-label">Name</label>
      		</div>
			<div class="col-sm-4">
         		<input type="text" class="form-control" name ="name" id="name" 
           		 placeholder="Enter Name" required="">
      		</div>
		</div>
		<div class="form-group">
			<div class="col-sm-1">
      			<label for="name">Address</label>
      		</div>
            <div class="col-sm-5">
       	
        		 <textarea cols="45" rows="3" placeholder="Enter Address" name="address"></textarea> 
       	     
     		</div>
			
		</div>
		<div class="form-group">
        <div class="col-sm-1">
      	<label for="name">Gender</label>
      </div>
       <div>

   <label class="checkbox-inline">
      <input type="radio" name="gender" value="Male" required=""> Male
   </label>
   <label class="checkbox-inline">
      <input type="radio" name="gender" value="Female" required=""> Female
   </label>
</div>
         
   </div>
			  <div class="form-group">
			<div class="col-sm-1" >
				<label for="phone" class="control-label">Phone</label>
			</div>	
			<div class="col-sm-4">
				<input type="number" class="form-control" id='phone' name="phone"  placeholder="Enter Phone Number"/>
			</div>
		</div>   
    
		
		  <div class="form-group">
			<div class="col-sm-1" >
				<label for="phone" class="control-label">Mobile</label>
			</div>	
			<div class="col-sm-4">
				<input type="number" class="form-control" id='mobile' name="mobile"  placeholder="Enter Mobile Number" />
			</div>
		</div>   
    
			 <div class="form-group">
			<div class="col-sm-1" >
				<label for="email" class="control-label">Email</label>
			</div>	
			<div class="col-sm-4">
				<input type="email" class="form-control" id='email' name="email"  placeholder="Enter Email" />
			</div>
		</div>
		 <div class="form-group">
		 	<div class="col-sm-1" >
				<label for="clinic" class="control-label">Workplace</label>
			</div>		
		
		<div class="col-sm-4">
				<input type="text" class="form-control" id='workplace' name="workplace"  placeholder="Enter Hospital/Clinic/Lab Name" required="" />
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-1">
				<label for="spcialised" class="control-label">Spcialized</label>
			</div>	
			<div class="col-sm-4">
				<select name="rank" id="rank" class="form-control">
					<option>&lt;--Select--&gt;</option>
					<option>Audiologists</option>
					<option>Allergist</option>
					
					<option>Andrologists</option>
					<option>Anesthesiologists</option>
					<option>Cardiologist</option>
					<option>Dentist</option>
					<option>Dermatologists</option>
					<option>Endocrinologists</option>
					<option>Epidemiologists</option>
					<option>Family Practician</option>
					<option>Gastroenterologists</option>
					
					<option>Gynecologists</option>
					<option>Hematologists</option>
					<option>Hepatologists</option>
					<option>Immunologists</option>
					<option>Infectious Disease Specialists</option>
					<option>Internal Medicine Specialists</option>
					<option>Internists</option>
					<option>Microbiologists</option>
					<option>Neonatologist</option>
					<option>Nephrologist</option>
					<option>Neurologist</option>
					<option>Neurosurgeons</option>
					<option>Obstetrician</option>
					<option>Oncologist</option>
					<option>Ophthalmologist</option>
					<option>Orthopedic Surgeons</option>
					<option>ENT specialists</option>
					<option>Perinatologist</option>
					<option>Paleopathologist</option>
					<option>Parasitologist</option>
					<option>Pathologists</option>
					<option>Pediatricians</option>
					<option>Physiologists</option>
					<option>Physiatrist</option>
					<option>Podiatrists</option>
					<option>Psychiatrists</option>
					<option>Pulmonologist</option>
					<option>Radiologists</option>
					<option>Rheumatologsists</option>
					<option>Surgeons</option>
					<option>Urologists</option>
					<option>Emergency Doctors</option>
					<option>Veterinarian</option>
					
					
				</select>
			</div>
		</div>
		
		
		
		<div class="form-group">
			<div class="col-sm-1" >
				<label for="type" class="control-label">Type</label>
			</div>	
			<div class="col-sm-4">
			<select name="type" class="form-control">
					<option>Doctor</option>
					<option>Chemist</option>
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-1" >
				<label for="name" class="control-label">State</label>	
			</div>
			
		
			<div class="col-sm-4">
				<select id="state" name="state" class="form-control" onchange="loadDistrict(this.value)" required="">
				<?php
					require_once 'database.php';
					$con = mysqli_connect($host, $user, $pass, $dbname);
					if(mysqli_connect_errno()!=0)
					{
						die("Error ");
					}
					else
					{
						$countryid=93;
						$sql = "Select * from state where countryid=$countryid";
						$result = mysqli_query($con, $sql);
						echo "<option value=''>&lt;--Select--&gt</option> ";
						while ($row = mysqli_fetch_array($result)) 
						{
							echo "<option value='$row[stateid]'>$row[name]</option>";
							
						}	
					}
				?>
				</select>	
			</div>
		</div>
			<div class="form-group">
				<div class="col-sm-1">
					<label for="name" class="control-label">District</label>	
				</div>
				<div class="col-sm-4">
				<select name ="district" id="district" class="form-control" onchange="loadCity(this.value)" required="">
	
				</select>
				</div>
			
			</div>
		
		<div class="form-group">
			<div class="col-sm-1">
				<label for="name" class="control-label">City</label>	
			</div>
			<div class="col-sm-4">
				<select name ="city" id="city" required="" class="form-control">
	
				</select>
			</div>
			
		</div>
			
		<div class="form-group">
			
		
			<div class="col-lg-3">
				<input type="submit" class=" btn btn-primary pull-right" style="width: 50%;"/>
			</div>
			<div class="col-lg-3">
				<input type="reset" class="btn btn-danger pull-left" style="width: 50%;" />
			</div>
		</div>
    
			<!--
			
		</tr>
		<tr>
			<td>
				Type
			</td>
			<td>
				<select name="type">
					<option>Doctor</option>
					<option>Chemist</option>
				</select>
			</td>
			<td></td>
			<td></td>
		</tr>
		
		

		<tr>
			<td>
				State
			</td>
			
		
			<td>
				<select id="state" name="state" onchange="loadDistrict(this.value)" required="">
				<?php
					require_once 'database.php';
					$con = mysqli_connect($host, $user, $pass, $dbname);
					if(mysqli_connect_errno()!=0)
					{
						die("Error ");
					}
					else
					{
						$countryid=93;
						$sql = "Select * from state where countryid=$countryid";
						$result = mysqli_query($con, $sql);
						echo "<option value=''>&lt;--Select--&gt</option> ";
						while ($row = mysqli_fetch_array($result)) 
						{
							echo "<option value='$row[stateid]'>$row[name]</option>";
							
						}	
					}
				?>
				</select>	
			</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td> 
			Select district</td>
			<td>

				<select name ="district" id="district" onchange="loadCity(this.value)" required="">
	
				</select>
			</td>
			<td></td>
			<td></td>
		</tr>	
		
		<tr>
			<td> 
			Select city</td>
			<td>

				<select name ="city" id="city" required="">
	
				</select>
			</td>
			<td></td>
			<td></td>
		</tr>	
		<tr>
			<td>
			
			</td>
			<td>
				<input type="submit" /> <input type="reset" />
			</td>
			<td></td>
			<td></td>
		</tr>
	</table>
	-->
</form>

    
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 
    
<!-- content area -->    
	<section id="content">
    
             
                               
                

</section><!-- #end content area -->
      
      
    <!-- left sidebar -->    
    <aside>
        
      </aside><!-- #end left sidebar -->
   
  </div><!-- #end div #main .wrapper -->
    


<!-- footer area -->    
<footer>
	<div id="colophon" class="wrapper clearfix">
    	footer stuff
    </div>
    
    <!--You can NOT remove this attribution statement from any page, unless you get the permission from prowebdesign.ro--><div id="attribution" class="wrapper clearfix" style="color:#666; font-size:11px;">Site built with <a href="http://www.prowebdesign.ro/simple-responsive-template/" target="_blank" title="Simple Responsive Template is a free software by www.prowebdesign.ro" style="color:#777;">Simple Responsive Template</a></div><!--end attribution-->
    
</footer><!-- #end footer area --> 


<!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.9.0.min.js">\x3C/script>')</script>

<script defer src="js/flexslider/jquery.flexslider-min.js"></script>



</body>
</html>