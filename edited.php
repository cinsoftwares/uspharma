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
      <link href="css/bootstrap.min.css" rel="stylesheet">

<!-- end CSS-->
    
<!-- JS-->
<script src="js/libs/modernizr-2.6.2.min.js"></script>


      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://code.jquery.com/jquery.js"></script>
      <!-- Include all compiled plugins (below), or include individual files 
            as needed -->
      <script src="js/bootstrap.min.js"></script>

<!-- end JS-->

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
        
        <?php include 'contents\menu_home.php'; ?>
       
        
        <!-- #topnav -->
  
    </header><!-- end header -->
 
 
<section id="page-header" class="clearfix">    
<!-- responsive FlexSlider image slideshow -->
<div class="wrapper">
	<h1> What page is this?</h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 
    
<!-- content area -->    
	<section id="content">
    
                <h1>Sub heading</h1>
 
  Details.......
 

                
                

</section><!-- #end content area -->
      
      
    <!-- left sidebar -->    
    <aside>
        
      </aside><!-- #end left sidebar -->
   
  </div><!-- #end div #main .wrapper -->
    


<!-- footer area -->    
<?php include 'contents\footer.php'; ?>
<!-- #end footer area --> 


<!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.9.0.min.js">\x3C/script>')</script>

<script defer src="js/flexslider/jquery.flexslider-min.js"></script>

<!-- fire ups - read this file!  -->   
<script src="js/main.js"></script>

</body>
</html>