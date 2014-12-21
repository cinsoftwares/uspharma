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
                        if($_GET['var']=="sl"){?>
                           <div class="alert alert-success alert-message">You reason for taking leave is saved..</div>
                          <?php }
						else if($_GET['var']=="usl"){?>
                           <div class="alert alert-success alert-message">You reason for taking leave is updated..</div>
                          <?php }
						}
                        ?>
<div class="wrapper">
	<h1> <?php $id= $_SESSION['id']; ?>
		
		Leave  
	</h1>
	<?php
	$update="no";
	$sql = "select * from leave_detail where staffid = $id and date ='".date('Y-m-d')."'";
	$result = mysqli_query($con, $sql);
	if ($row = mysqli_fetch_array($result)) 
						{
							$update="yes";
						    $reason=$row['reason'];	
						}
	?>
	
		
		<form action="saveleave.php" method="post" class="form-horizontal" role="form">
				
		<div class="form-group">
			<div class="col-sm-2">
				 <label for="date" class="control-label">Date</label>
			</div>
			<div class="col-sm-4">
			<?
				?>
				<input type ="hidden" name ="id" id="id"/>
				<input type ="hidden" name ="update" id="update" value="$update"/>
				<input type="date" name="date" class="form-control" readonly="" value="<?php echo date('Y-m-d') ?>"  />
			</div>
		</div>
			
			
		<div class="form-group">
			<div class="col-sm-2">
				 <label for="reason" class="control-label">Reason</label>
			</div>
			<div class="col-sm-4">
				<textarea id='reason' name="reason" class="form-control" rows="6" required="" placeholder="Enter the reason"><?php echo $reason; ?></textarea>
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