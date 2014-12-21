<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

	
<!-- columns demo style. DELETE IT! -->
<style type="text/css">
<!--

#columnsdemo .grid_1,
#columnsdemo .grid_2,
#columnsdemo .grid_3,
#columnsdemo .grid_4,
#columnsdemo .grid_5,
#columnsdemo .grid_6,
#columnsdemo .grid_7,
#columnsdemo .grid_8,
#columnsdemo .grid_9,
#columnsdemo .grid_10,
#columnsdemo .grid_11,
#columnsdemo .grid_12 {
border: solid 1px #999;
color:#999;
text-align: center;
margin-top:20px;
padding:20px;
}
-->
</style>
    

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 
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
       
       <!-- end main navigation -->
  
    </header><!-- end header -->
 
 
 
 
 
 
 
 <!-- hero area (the grey one with a slider -->
    <section id="hero" class="clearfix">    
    <!-- responsive FlexSlider image slideshow -->
    <div class="wrapper">
        <div class="grid_5 alpha">
                <h1>USpharma</h1>
            <p>
           Our organization is recognized as an affluent Supplier of an assorted range of Generic Medicines. These medicines are widely appreciated by our clients for their effectiveness and accurate composition.

These medicines are formulated by our associated manufacturer using supreme grade ingredients in accurate composition. Our manufacturer assures that these medicines are prepared under the utmost hygienic conditions in compliance with the medical standards of the industry. Due to precise composition, optimum efficacy and high reliability, our offered gamut is widely demanded by our clients. In our product range, we are offering Pain Relief, Muscle Relaxant, Infertility Therapy, Immunosuppressive, Herbal Health, Anticancer, Birth Control, etc...
            </p>
            
        </div>
        
        <div class="grid_7 omega rightfloat" >
        <form action="login.php" class="form-inline" method="post" role="form">
        	<div class="form-group" >
        		
        		<label class="" for="name">	User Name </label>
        		<input class="form-control"  placeholder="Enter the email" id="email" type="email" name="email" required="" />
        	</div>	
        	<div class="form-group">	 
        			<label  for="password">	Password </label>
        		
        		
        			<input type="password" class="form-control" name="password" placeholder="Enter Password" required=""/>
        	</div>	
        		<div class="form-group">
        			 <input type="submit" value="Log In" class="btn btn-success" />
        		</div>

        </form>
        <?php if(isset($_GET['var']))
    {
    if($_GET['var']=="fail")?>
      
       <font color="red"><b>Wrong Username and Password!!</b></font> 
  <?php  }
    ?>
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <img src="images/basic-pic1.jpg" />
                            <p class="flex-caption">Love Brazil !!! Sea view from Rio de Janeiro fort.</p>
                        </li>
                        <li>
                            <a href="http://www.prowebdesign.ro"><img src="images/basic-pic2.jpg" /></a>
                            <p class="flex-caption">El Arco Cabo Mexico. This image is wrapped in a link.</p>
                        </li>
                        <li>
                            <img src="images/basic-pic3.jpg" />
                            <p class="flex-caption">Arches National Park, Utah, Usa.</p>
                        </li>
                        <li>
                            <img src="images/basic-pic4.jpg" />
                            <p class="flex-caption">Morocco desert.</p>
                        </li>
                    </ul>
                  </div>
                </div><!-- FlexSlider -->
        </div>
    </section><!-- end hero area -->



<!-- main content area -->   
<div id="main" class="wrapper">
    
    
<!-- content area -->    
	<section id="content" class="wide-content">
    	

	</section><!-- #end content area -->   
      
      
    <!-- columns demo, delete it!-->
    <section id="columnsdemo" style="margin-bottom:60px; width:100%" class="clearfix">
        
        
    </section>
    <!-- end columns demo -->  
    
      
  </div><!-- #end div #main .wrapper -->



<!-- footer area -->    

<?php include 'contents\footer.php'; ?>


<!-- #end footer area --> 

    
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/libs/jquery-1.9.0.min.js">\x3C/script>')</script>
    <script defer src="js/flexslider/jquery.flexslider-min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>