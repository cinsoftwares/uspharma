<?php
session_start();
$email = $_SESSION['email'];
	require_once 'database.php';
					$con = mysqli_connect($host, $user, $pass, $dbname);
					if(mysqli_connect_errno()!=0)
					{
						die("Error ");
					}
	
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>Digital Library</title>
<meta name="description" content="Simple Responsive Template is a template for responsive web design. Mobile first, responsive grid layout, toggle menu, navigation bar with unlimited drop downs, responsive slideshow">
<meta name="keywords" content="">

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



<script>
	
	
	function getDistance(from, to)
	{
		try{
			var xmlhttp;
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		}
		catch(err)
		{
			alert(err)
		}
		
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4 &&  xmlhttp.status==200){
				var distance = xmlhttp.responseText;
				//alert(distance);
				document.getElementById('km').value=distance;
			}
		}
		xmlhttp.open("GET", "distance.php?mycity="+from+"&selcity="+to, true);
		xmlhttp.send();
		
		
		
	}
	
	 function check(state)
	{
	//	alert(state);
	//var option = document.createElement("option");
	
		try{
			document.getElementById('station').innerHTML="";
			document.getElementById('to').value="";
			/*var district = document.getElementById('district'); 
			while(district.options.length){
				district.remove(0);
			}
			
			
				option.innerHTML="&lt;--Select--&gt;";
				option.value='';
				district.appendChild(option);
				*/
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
				document.getElementById('to').value=cityArray[0];
				document.getElementById('station').innerHTML=cityArray[1]
				//alert(cityArray[2]);
				/*for(var i=0; i<cityArray.length-1; i+=2){
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
				
				*/
				
			}
		}
		xmlhttp.open("GET", "getStation.php?cityid="+state, true);
		xmlhttp.send();
		
		
	}
	
	
	
	
</script>

</head>

<body id="home">
<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

  
<!-- header area -->
    <header class="wrapper clearfix">
		       
        <div id="banner">        
        	<div id="logo"><a href="index.php"><img src="images/basic-logo.png" alt="logo"></a></div> 
        </div>
        
        <!-- main navigation -->
        <nav id="topnav" role="navigation">
        <div class="menu-toggle">Menu</div>  
        	<ul class="srt-menu" id="menu-main-navigation">
            <li ><a href="index.php">Home page</a></li>
           <li class="current">
				<a href="daily.php">Daily Report</a>
				
			</li>
			<li>
				<a href="searchbook.php">Search Online</a>
				
			</li>
			<li>
				<a href="about.php">About Us</a>
				
			</li>
			<li>
				<a href="contact.php">Contact Us</a>
			</li>	
		</ul>     
		</nav><!-- #topnav -->
  
    </header><!-- end header -->
 
 
<section id="page-header" class="clearfix">    
<!-- responsive FlexSlider image slideshow -->
<div class="wrapper">
	<h1>Daily Report</h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 
    
<!-- content area -->    
	<section id="content">
    
                <h1>Details</h1>
                               
<form action="savedaily.php" method="post">
	<table cellspacing="20px" cellpadding="20px">
		<tr>
			<td>
				Date
			</td>
			<td>
				<input type="date" name="date" value="<?php echo date("Y-m-d");?>" required="" />
			</td>
		</tr>
		<tr>
			<td>
				Town Worked
			</td>
			<td>
				<select id="city" name="city" required="" onchange="check(this.value)" onblur="getDistance(this.options[selectedIndex].text, document.getElementById('from').value)">
				<?php
					
					
						$sql = "select name, cityid from city where districtid=(select districtid from city where 
						cityid=(select cityid from staff where email= '$_SESSION[email]'))";
						$sql= "select district.districtid ,district.name, city.cityid as cityid, city.name as name from district,
								 city where district.districtid=city.districtid order by city.name";
						
						$result = mysqli_query($con, $sql);
						echo "<option value=''>&lt;--Select--&gt</option> ";
						while ($row = mysqli_fetch_array($result)) 
						{
							echo "<option value='$row[cityid]'>$row[name]</option>";
							
						}	
					
				?>
				</select>
				
				<label id="station" style="color: red"></label>	
			</td>
			
		</tr>
		<tr>
			<td>
				Worked With
			</td>
			<td>
				<select id="with" name="with" required="">
				<?php
				/*	require_once 'database.php';
					$con = mysqli_connect($host, $user, $pass, $dbname);
					if(mysqli_connect_errno()!=0)
					{
						die("Error ");
					}*/
				
						$sql = "select name, id, designation from staff where email<>'$_SESSION[email]'";
						
						$result = mysqli_query($con, $sql);
						echo "<option value=''>&lt;--Select--&gt</option> ";
						while ($row = mysqli_fetch_array($result)) 
						{
							echo "<option value='$row[cityid]'>$row[name] ($row[designation])</option>";
							
						}	
					
				?>
				</select>	
			</td>
		</tr>
		
		<tr>
			<td>
				Journey From
			</td>
			<td>
				<?php
				$from='';
				 $sql= "select staff.cityid, city.name from staff, city where email='$email' and city.cityid=staff.cityid";
				 $result = mysqli_query($con, $sql);
				 if ($row = mysqli_fetch_array($result)) 
						{
							$from=$row['name'];
							
						}
				?>
				<input type="text" id="from" name='from' value="<?php echo $from; ?>" readonly="" required="" />
			</td>
		</tr>
		
		<tr>
			<td>
				Journey To
			</td>
			<td>
				<input type="text" name="to" id ="to" required="" /> Total KM Travelled <input type="text" name="km" id ="km" />
			</td>
		</tr>
		<tr>
			<td>
				Doctor Vistied
			</td>
			<td>
				<select id="doctor" name="doctor" required="">
				<?php
				$sql = "select name, id from doctor ";
						
						$result = mysqli_query($con, $sql);
						echo "<option value=''>&lt;--Select--&gt</option> ";
						while ($row = mysqli_fetch_array($result)) 
						{
							echo "<option value='$row[id]'>$row[name]</option>";
							
						}
						?>	
						</select>
			</td>
		</tr>
		<tr>
			<td>
				POB
			</td>
			<td>
				<input type="text" name="pob" />
			</td>
		</tr>
		<tr>
			<td>
			
			</td>
			<td>
				<input type="submit" /> <input type="reset" />
			</td>
		</tr>
	</table>
</form>
                

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

<!-- fire ups - read this file!  -->   
<script src="js/main.js"></script>

</body>
</html>