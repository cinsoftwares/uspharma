<?php
session_start();
echo $_SESSION['email'];
	
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
	<h1>Registration</h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 
    
<!-- content area -->    
	<section id="content">
    
                <h1>Details</h1>
                               
<form action="saveregistration.php" method="post">
	<table cellspacing="20px" cellpadding="20px">
		<tr>
			<td>
				Name
			</td>
			<td>
				<input type="text" name="name" required="" />
			</td>
		</tr>
		<tr>
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
		</tr>
		<tr>
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
				Email
			</td>
			<td>
				<input type="email" name="email" required="" />
			</td>
		</tr>
		<tr>
			<td>
				Phone Number 
			</td>
			<td>
				<input type="number" name="phone" required="" />
			</td>
		</tr>
		<tr>
			<td>
				Username
			</td>
			<td>
				<input type="text" name="user" required="" />
			</td>
		</tr>
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