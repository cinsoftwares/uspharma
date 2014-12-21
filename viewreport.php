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
<link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" />
    
</head>

<body id="home">
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
<div class="wrapper">
	<br/>
	<h1 style="color:green"> Expense Statement</h1>
	
    <?php
    //$date = "Sep-2014";
	$id = $_POST['staffid'];
	
	require_once 'database.php';
	$sql = "SELECT staff.name, staff.designation, (select city.name from city where city.cityid=staff.cityid) as cityname  FROM staff where id= $id";
	$res = mysqli_query($con, $sql);
	if($row=mysqli_fetch_array($res))
	{
		echo " <font color='black' style='font-size: 22px'>Name: </font><font color='blue' style='font-size: 22px'>$row[name]</font>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo " <font color='black' style='font-size: 22px'>Designation: </font><font color='blue' style='font-size: 22px'>$row[designation]</font>";
		
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo " <font color='black' style='font-size: 22px'>HQ: </font><font color='blue' style='font-size: 22px'>$row[cityname]</font>";
		
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo " <font color='black' style='font-size: 22px'>Month: </font><font color='blue' style='font-size: 22px'>$_POST[date]</font>";
		$journey_from = $row['cityname'];
	}

?>

    </div>

</section>
<font style="font-size: 15px"></font>

<!-- main content area -->   
<div class="wrapper" id="main"> 
    
    <?php
	
	$date = date('Y-m-d',strtotime($_POST['date']));
	$temp = strtotime($_POST['date']);
	$month= date("F", $temp);
	$year=  date("Y", $temp);
	//echo $month;
	
	//$sql = "SELECT * FROM daily where monthname('$date')= '$month' and year('$date')=$year and staffid=$id";
	$sql="SELECT date, (select city.name from city where city.cityid=daily.townworked) as townworked, km, other
	from daily where monthname(date)='$month' and year(date)=$year and staffid=$id";
	$res = mysqli_query($con, $sql);
	
    ?>
<!-- content area -->    
	<section id="content">
    
   <table class="table" style="width: 1250px" border="1">    
	<caption></caption>    
	<thead >       
		<tr style="width: 1000px">          
			<th style="width: 250px">DATE</th>          
			<th style="width: 250px">TOWN WORKED</th>          
			<th style="width: 250px">JOURNEY FROM</th> 
			<th style="width: 250px"> JOURNEY TO</th>
			<th style="width: 250px">KILO METERS</th>
			<th style="width: 250px">FAIR</th>
			<th style="width: 250px">HQ/EX ALLOW</th>
			<th style="width: 250px">OS ALLOWS</th>
			<th style="width: 250px">OTHERS</th>
			<th style="width: 250px">TOTEL</th>             
		</tr>    
	</thead>    
	<tbody>       
	      <?php
	      while($row = mysqli_fetch_array($res))
		  {
		echo "<tr class='success'>";          
			echo "<td>". date("d-M-Y", strtotime($row['date']))."</td>";          
			echo "<td>".$row['townworked']."</td>";
			echo "<td>".$journey_from."</td>";
			echo "<td>".$row['townworked']."</td>";
			echo "<td>".$row['km']."</td>";
			echo "<td>".""."</td>";
			echo "<td>".""."</td>";
			echo "<td>".""."</td>";
			echo "<td>".$row['other']."</td>";       
			echo "</tr>";       
		  } 
		  echo mysqli_error($con);
		  
		  ?>
		<!--	<tr  class="danger">          
				<td>Product4</td>          
				<td>20/10/2013</td>          
				<td>Declined</td>       
			</tr>-->    
		</tbody> 
	</table> 

                

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