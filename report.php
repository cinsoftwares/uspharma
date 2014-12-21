<!doctype html>
<html ng-app="plunker">
  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.js"></script>
    <script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.10.0.js"></script>
    <script src="js/example.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
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
	<form class="form-horizontal" role="form" method="post" action="abc.php">
		<div class="form-group">
	<div class="col-sm-1">
      <label for="name" class="control-label">Month</label>
      </div>
	<div class="col-sm-8">
	<div ng-controller="DatepickerDemoCtrl">
    
    <div class="row">
        <div class="col-md-4">
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
 </div>  
 </div>
 
 
 	<div class="form-group">
			<div class="col-sm-1">
				 <label for="name" class="control-label">Staff</label>
			</div>
			<div class="col-md-3">
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
	
	
	
    </div>

</section>


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
