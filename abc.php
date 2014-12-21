<!doctype html>
<html ng-app="plunker">
  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.js"></script>
    <script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.10.0.js"></script>
    <script src="js/example.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
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
  <body>
  	<!-- header area -->
    <header class="wrapper clearfix">
		       
       
        
        <!-- main navigation -->
        
        <?php include 'contents\menu_admin.php'; 
         require_once 'database.php';
        ?>
       
        
        <!-- #topnav -->
  
    </header><!-- end header -->
<br><br><br>
<section id="page-header" class="clearfix">    
<!-- responsive FlexSlider image slideshow -->
<div class="wrapper">
	<h1> Monthly Report</h1>
	<form class="form-inline" role="form" method="post" action="abc.php">
		<div class="form-group">
	<div class="col-md-1">
      <label for="name" class="control-label">Month</label>
      </div>
	<div class="col-md-3">
	<div ng-controller="DatepickerDemoCtrl">
    
    <div class="row">
       
            <p class="input-group">
              <input type="text" required="" class="form-control col-md-12" datepicker-popup="MMM-yyyy" 
              ng-model="dt" is-open="opened" min="minDate" max="today" 
              datepicker-options="dateOptions" date-disabled="disabled(date, mode)" 
              ng-required="true" close-text="Close"  name ="date"/>
              <span class="input-group-btn">
                <button class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
              </span>
            </p>
       
  </div>
</div>
 </div>  
 <div class="col-md-1" >
				 <label for="name">Staff</label>
			</div>
			<div class="col-md-4">
				<select id="with" class="form-control" name="staffid" required="">
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
			
		
		
		
			<div class="col-lg-3">
				<input type="submit" class=" btn btn-primary pull-left" style="width: 50%;"/>
			</div>
			
		</div>
</form>
	
	
	
    </div>

</section>


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
	$sql = "select * from allowance ";
	$res = mysqli_query($con, $sql);
	if($row=mysqli_fetch_array($res) )
	{
		$hq_exq = $row['hq_exq'];
		$os = $row['os'];
		$others = $row['others'];
	}	
	//$sql = "SELECT * FROM daily where monthname('$date')= '$month' and year('$date')=$year and staffid=$id";
	$sql="SELECT DISTINCT date, (select city.name from city where city.cityid=daily.townworked) as townworked,  MAX(km) as km, station, other, isleave
	from daily where monthname(date)='$month' and year(date)=$year and staffid=$id group by date";
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
			<th style="width: 250px">TOTAL</th>             
		</tr>    
	</thead>    
	<tbody>       
	      <?php
	      $total=0;
	      $tot=0;
	      while($row = mysqli_fetch_array($res))
		  {
		echo "<tr class='success'>";          
			echo "<td>". date("d-M-Y", strtotime($row['date']))."</td>";  
			$tot=0;
			if($row['isleave']==0)
			{
				$tot=0;
				echo "<td>".$row['townworked']."</td>";
				echo "<td>".$journey_from."</td>";
				echo "<td>".$row['townworked']."</td>";
				echo "<td>".$row['km']."</td>";
				$tot = $row['km']*2;
				echo "<td>".($row['km']*2)."</td>";
				if($row['station']=='EXQ' || $row['station']=='HQ')
					{
						echo "<td>".$hq_exq."</td>";
						echo "<td></td>";
						$tot+=$hq_exq;
					}
				else if($row['station']=='OS')
					{
						echo "<td></td>";
						echo "<td>".$os."</td>";
						$tot+=$os;
					}
						
			}
			else if($row['isleave']==1)
			{	$tot=0;
				echo "<td>Leave</td>";
				echo "<td>---</td>";
				echo "<td>---</td>";
				echo "<td>---</td>";
				echo "<td>---</td>";
				echo "<td>---</td>";
				echo "<td>---</td>";
				
			}
			else if($row['isleave']==2)
			{	$tot=0;
				echo "<td>Holiday</td>";
				echo "<td>---</td>";
				echo "<td>---</td>";
				echo "<td>---</td>";
				echo "<td>---</td>";
				echo "<td>---</td>";
				echo "<td>---</td>";
				
			}
			
			
			
			
	
			$total+=$tot;
			echo "<td>".$row['other']."</td>";  
			echo "<td>".$tot."</td>";       
			echo "</tr>";       
		  } 
		  echo mysqli_error($con);
		  
		  ?>
			<tr  class="danger">          
				<td colspan="9" align="center"> Total</td>;
				 
				<td><?php echo $total?></td>   
			</tr>   
		</tbody> 
	</table> 

                

</section><!-- #end content area -->
      
      
    <!-- left sidebar -->    
    <aside>
        
      </aside><!-- #end left sidebar -->
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
