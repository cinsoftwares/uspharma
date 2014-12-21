 <?php session_start(); 
 if(!isset($_SESSION['id'])) 
 	header("location:index.php");
 
 ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>Uspharma</title>
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
<link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" />
    
    
    
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
		//alert(state);
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
				document.getElementById('station').innerHTML=cityArray[1];
				document.getElementById('station1').value=cityArray[1];
				//alert(cityArray[2]);
				getDoctor(cityArray[2]);
				getDistance(document.getElementById('from').value, document.getElementById('to').value);
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
	
	
	function getDoctor(districtId)
	{
		try{
			var option = document.createElement("option");
			var doctor = document.getElementById('doctor');
			while(doctor.options.length){
				doctor.remove(0);
			}
			
			option.innerHTML="&lt;--Select--&gt;";
		    option.value='';
			doctor.appendChild(option);
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
				var doctorDetail = xmlhttp.responseText;
				
				
				var docArray = new Array();
				docArray=doctorDetail.split(',');
			//	alert(docArray[2]);
				
				for(var i=0; i<docArray.length-1; i+=2){
					try{
					option = document.createElement("option");
					option.innerHTML = String(docArray[i]);
					option.value=String(docArray[i+1]);
					
					doctor.appendChild(option);
					}
					catch(err){
						alert("Error :"+err);
					}
				}
				
			}
		}
		xmlhttp.open("GET", "getdoctor.php?districtid="+districtId, true);
		xmlhttp.send();
		
			
	}
	
	function loadDayReport(date)
	{
		//alert("her");
		try{
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			}
			else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
		}
		catch(err){
				alert("Error :"+err);
				}
		
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4 &&  xmlhttp.status==200){
				var report = xmlhttp.responseText;
				
				var reportArray = new Array();
				reportArray=report.split(',');
				
				try{
				if(report!="")
				{
				
				document.getElementById('city').value= reportArray[0];
				document.getElementById('city').onchange();
				document.getElementById('with').value= reportArray[1];
				document.getElementById('pob').value= reportArray[3];
				document.getElementById('other').value= reportArray[4];
				
				document.getElementById('id').value=reportArray[5];
				}
				
				}
				//document.getElementById('doctor').value= reportArray[2];
				 //document.getElementById("reportnames").selectedIndex = i;
				 //alert(reportArray[1]);
				
				//var e = document.getElementById("doctor");
				 //e.value='2';
        //var str = e.options[1].text;
        //alert(str);
        //alert(document.getElementById('doctor').selectedIndex);
        //document.getElementById('doctor').value= 'ameena';
				
				catch(err)
				{
					alert(err);
					//docuement.getElementById('with').selectedIndex=0;
				}
			}
		}
		xmlhttp.open("GET", "loadDayReport.php?date="+date, true);
		xmlhttp.send();
		//value= document.getElementById('test').value;
	}
	
	
	
	function disable_all()
	{
		alert("hai");
	}
	
</script>
</head>

<body id="home">
<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

  
<!-- header area -->
    <header class="wrapper clearfix">
		       
       
        
        <!-- main navigation -->
        
        <?php include 'contents\menu_staff.php'; 
        require_once 'database.php';
        ?>
       
        
        <!-- #topnav -->
  
    </header><!-- end header -->
 
 
<section id="page-header" class="clearfix">    
<!-- responsive FlexSlider image slideshow -->
 <?php if(isset($_GET['var']))
                        {
                        if($_GET['var']=="sdar"){?>
                           <div class="alert alert-success alert-message">Report Saved..</div>
                          <?php }
						else if ($_GET['var']=="nd"){?>
	  <center><div class="alert alert-danger alert-message">Thank you. Come Tomorrow</div></center>
	
<?php die(); }
						
						}
						

                        ?>
<div class="wrapper">
	<h1> <?php $id= $_SESSION['id']; ?>
		
		Daily Report  
	</h1>
	
	<h4 style="color: RED">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		Today's Date: <?php 
				date_default_timezone_set("Asia/kolkata");
				 echo date('d-M-Y');
				 $inputDate = date('d/m/Y'); 
				$inputDateArray = explode('/', $inputDate); 
				if(date('N', mktime (0, 0 , 0, $inputDateArray[1], $inputDateArray[0], $inputDateArray[2])) == 7)
				{ 
  			  	echo ", &nbsp Today is Sunday";
				
			}
				$date = date('Y-m-d');
			/*	$sql = "Select date from daily where staffid=$_SESSION[id] order by date DESC ";
				$res = mysqli_query($con, $sql);
				if ($row = mysqli_fetch_array($res)) 
						{
							
							if($row['date']==date('Y-m-d'))
							{
								$date=date('Y-m-d');
								
								
								
							}
							else if($row['date']<date('Y-m-d'))
								$date = date('Y-m-d',strtotime($row['date'] . "+1 days"));
						}
				else{
					$date=date('Y-m-d');
					}
				*/
				//echo date('d-m-Y');
				$sql= "select isleave from daily where date = '$date' and staffid=$id";
			//	echo "<br/>$id";
				$result = mysqli_query($con, $sql);
				$isleave =0;
				$reason='';
				if ($row = mysqli_fetch_array($result)) 
						{
							$isleave = $row['isleave'];
						    $reason="Marked as Leave";	
						   // print_r($row);
						}
				
				?>
				
				
				<br/> <br/>
				
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</h4>
		<?php
		
		if($isleave==1)
		{
			echo "<center><h1>You cant enter any details.</h1><h2>Reason : $reason </h2></center>";
		}
else if($isleave==2)
{
	echo "<center><h1>You cant enter any details.See you tomorrow</h1</center>";
}
		else{
			
			echo " <center><form action='savedaily_holiday.php' method='post'>
				<input type ='hidden' name ='id' id='id'/>
				<input type='submit' class='btn btn-danger' value = 'Click here if today is holiday'/></form> </center>";
		?>
		<br/>
		<form action="savedaily.php" method="post" class="form-horizontal" role="form">
				
		<div class="form-group">
			<div class="col-sm-2">
				 <label for="date" class="control-label">Date</label>
			</div>
			<div class="col-sm-4">
			<?
				?>
				<input type ="hidden" name ="id" id="id"/>
				<input type="date" name="date" class="form-control" onchange="loadDayReport(this.value);" readonly="" value="<?php echo $date ?>"  />
			</div>
		</div>
			
			<div class="form-group">
		
			<div class="col-sm-2">
				 <label for="name" class="control-label">Town Worked </label>
			</div>
			<div class="col-sm-4">
				<select class="form-control" name ="city" id="city" 
             required="" onchange="check(this.value)" onblur="getDistance(this.options[selectedIndex].text, document.getElementById('from').value)">
				<?php
					
				
					$sql = "select name, cityid from city where districtid=(select districtid from city where 
						cityid=(select cityid from staff where id= '$_SESSION[id]'))";
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
				
			</div>
			<div class="col-sm-2">
				<label id="station" style="color: red"></label>
				<input type="hidden" id="station1" name="station" />
				</div>	
		</div>
		<div class="form-group">
			<div class="col-sm-2">
				 <label for="name" class="control-label">Worked With</label>
			</div>
			<div class="col-sm-4">
				<select id="with" class="form-control" name="with" required="">
				<?php
				
						$sql = "select name, id, designation from staff where email<>'$_SESSION[email]' and  type <> 'admin'";
						
						$result = mysqli_query($con, $sql);
						echo "<option value=''>&lt;--Select--&gt</option> ";
						while ($row = mysqli_fetch_array($result)) 
						{
							echo "<option value='$row[id]'>$row[name] ($row[designation])</option>";
							
						}	
					
				?>
				</select>	
			</div>
			
		</div>
		<div class="form-group">
			<div class="col-sm-2">
				 <label for="journey_from" class="control-label">Journey From</label>
			</div>
				<div class="col-sm-4">
				<?php
				$from='';
				 $sql= "select staff.cityid, city.name from staff, city where email='$_SESSION[email]' and city.cityid=staff.cityid";
				 $result = mysqli_query($con, $sql);
				 if ($row = mysqli_fetch_array($result)) 
						{
							$from=$row['name'];
							
						}
				?>
				<input type="text" class="form-control" id="from" name='from' value="<?php echo $from; ?>" readonly="" required="" />
			</div>
		</div>
			<div class="form-group">
			<div class="col-sm-2">
				 <label for="journey_to" class="control-label">Journey To</label>
			</div>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="to" id ="to" required="" /> 
			</div>
			<div class="col-sm-1">Total KM Travelled </div>
			<div class="col-sm-2">
				<input type="text" class="form-group" class="form-group" name="km" id ="km" />
			</div>			
		</div>
		
			
			<div class="form-group">
			<div class="col-sm-2">
				 <label for="doctor_visited" class="control-label">Doctor Vistied</label>
			</div>
			<div class="col-sm-4">
				<select class="form-control" id="doctor" name="doctor" required="">
					<option value=''>&lt;--Select--&gt;</option>
				</select>
			</div>		
		</div>
		
		<div class="form-group">
			<div class="col-sm-2">
				 <label for="pob" class="control-label">POB</label>
			</div>
			<div class="col-sm-4">
				<input type="text" id ='pob' name="pob" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2">
				 <label for="others" class="control-label">Others</label>
			</div>
			<div class="col-sm-4">
				<input type="text" id='other' name="other" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			
		<div class="col-lg-1">
				
			</div>
			<div class="col-lg-3">
				<input type="submit" class=" btn btn-primary pull-right" style="width: 50%;"/>
			</div>
			<div class="col-lg-3">
				<input type="reset" class="btn btn-danger pull-left" style="width: 50%;" />
			</div>
		</div>
		
</form>
<?php
}
?>
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
<?php include 'contents\admin_footer.php'; ?>
<!-- #end footer area --> 


<!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.9.0.min.js">\x3C/script>')</script>

<script defer src="js/flexslider/jquery.flexslider-min.js"></script>

<!-- fire ups - read this file!  -->   
<script src="js/main.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/tab.js"></script>

</body>
</html>