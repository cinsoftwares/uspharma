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
       <?php include 'contents\menu_admin.php'; ?>
       <!-- #topnav -->
  
    </header><!-- end header -->
 
 
<section id="page-header" class="clearfix">    
<!-- responsive FlexSlider image slideshow -->
 <?php if(isset($_GET['var']))
                        {
                        if($_GET['var']=="ssa"){?>
                           <div class="alert alert-success alert-message">Staff Details Inserted..</div>
                          <?php }
						}
                        ?>
        
                        

<div class="wrapper">
	<h1>Staff Registration</h1>
	
	    <form class="form-horizontal" role="form" method="post" action="savestaff.php">
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
       	
         <textarea cols="45" rows="3" placeholder="Enter Address" name="address" required=""></textarea> 
            
      </div>
         
   </div>
   
   <div class="form-group">
   	<div class="col-sm-1">
      <label for="dob" class="control-label" style="font-size: 12px">Date Of Birth</label>
      </div>
      <div class="col-sm-4">
         <input type="date" class="form-control" name="dob" required="" id="dob" onblur="if(new Date(this.value) > new Date()){alert('Invalid Date'); this.value='';}" />
       
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
				<label for="email" class="control-label">Email</label>
			</div>	
			<div class="col-sm-4">
				<input type="email" class="form-control" id='email' name="email"  placeholder="Enter Email" required="" />
			</div>
		</div>
		 <div class="form-group">
			<div class="col-sm-1">
				<label for="retype" class="control-label" style="font-size: 11px">Retype Email</label>
			</div>
			<div class="col-sm-4">
				<input type="email" class="form-control" name="remail"  placeholder="Re-type Email" onblur="if(document.getElementById('email').value!=this.value){alert('Email Incorrect'); this.value=''}" required="" />
			</div>
		
   </div>

   <div class="form-group">
			<div class="col-sm-1" >
				<label for="phone" class="control-label">Phone</label>
			</div>	
			<div class="col-sm-4">
				<input type="number" class="form-control" id='phone' name="phone"  placeholder="Enter Phone Number" required="" />
			</div>
		</div>   
    
    <div class="form-group">
    	<div class="col-sm-4">
		<label for="name" class="control-label">Posting Details</label>
    </div>
    </div>
<div class="form-group">
	<div class="col-sm-1" >
			<label for="name" class="control-label" style="font-size: 12px">Date of Join</label>	
			</div>
			<div class="col-sm-4">
				<input type="date" required="" class="form-control" name="doj" value="<?php echo date("Y-m-d"); ?>"/>
			</div>
		</div>
		 <div class="form-group">
			<div class="col-sm-1">
				<label for="name" class="control-label">Designation</label>
			</div>
			<div class="col-sm-4">
				<select class="form-control" id="designation" name="designation" required="">
					<option value="">&lt;Select&gt;</option>
					<option>B.E</option>
					<option>Teritory Manager</option>
					<option>ABM</option>
					<option>DM</option>
					<option>RSM</option>
					<option>ZSM</option>
					<option>NSM</option>
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
    
	</form>
</section>
</div>

<!-- main content area -->   
<div class="wrapper" id="main"> 
    
<!-- content area -->    
	<section id="content">
		

             <!--
            
<form action="savestaff.php" method="post">
	<table class="table table-hover" cellspacing="20px" cellpadding="20px">
		<caption>Perosnal Details</caption>
		<tr>
			<td>
				Name
			</td>
			<td>
				<input type="text" name="name" required="" />
			</td>
		
			<td>
				Address
			</td>
			<td>
				<textarea name="address" required=""></textarea>
			</td>
			
		</tr>
		<tr>
			<td>
				Date of Birth
			</td>
			<td>
				<input type="date" name="dob" required="" id="dob" onblur="if(new Date(this.value) > new Date()){alert('Invalid Date'); this.value='';}" />
			</td>
		
			<td>
				Gender
			</td>
			<td>
				<input type="radio" name="gender" value="Male" required="" />Male
				<input type="radio" name="gender" value="Female" required=""/>Female
			</td>
		</tr>
		
		<tr>
			<td>
				Phone Number 
			</td>
			<td>
				<input type="number" name="phone" required="" />
			</td>
		
			<td>
				Mobile Number 
			</td>
			<td>
				<input type="number" name="mobile" required="" />
			</td>
		</tr>
		<tr>
			<td>
				Email
			</td>
			<td>
				<input type="email" id='email' name="email" required="" />
			</td>
		
			<td>
				Retype Email
			</td>
			<td>
				<input type="email" name="remail" onblur="if(document.getElementById('email').value!=this.value){alert('Password Incorrect'); this.value=''}" required="" />
			</td>
		</tr>
		
		<!--
		<tr>
			<td>
				Password
			</td>
			<td>
				<input type="password" name="pass" required="" id="pass"/>
			</td>
		</tr>
		
		<tr>
			<td>
				Re-Type Password
			</td>
			<td>
				<input type="password" name="repass" id="repass" required="" onblur="if(this.value!==document.getElementById('pass').value){alert('Invalid Password'); this.value='';}"/>
			</td>
		</tr>
		-->
		<!--
	</table>
	<table cellspacing="20px" cellpadding="20px">
		<caption> Posting Details</caption>
	<tr>
			<td>
				Date of joining	
			</td>
			<td>
				<input type="date" required="" name="doj" value="<?php echo date("Y-m-d"); ?>"/>
			</td>
		
			<td>
				Designation
			</td>
			<td>
				<select id="designation" name="designation" required="">
					<option value="">&lt;Select&gt;</option>
					<option>B.E</option>
					<option>Teritory Manager</option>
					<option>ABM</option>
					<option>DM</option>
					<option>RSM</option>
					<option>ZSM</option>
					<option>NSM</option>
				</select>
			</td>
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
</form>
                
-->
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