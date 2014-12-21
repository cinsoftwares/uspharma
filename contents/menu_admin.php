
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
       <div id="banner">        
        	<div id="logo"><a href="index.php"><img src="images/basic-logo.png" alt="logo"></a></div> 
        </div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="admin.php">Home</a></li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Add<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="add_staff.php">Staff</a></li>
               <li class="divider"></li>
            
            <li><a href="add_doctor.php">Doctor</a></li>
             <!-- <li class="divider"></li>
              <li><a href="admin_exam.php">Exam</a></li>-->
          </ul>
        </li>
          <li><a href="report.php">View Report</a></li>
       <!--   <li><a href="exam_valuation.php">Exam Valuation</a></li> -->
       <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">View<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="admin_add_users.php">Users</a></li>
               <li class="divider"></li>
            <li><a href="admin_add_subjects.php">Subject </a></li>
          </ul>
        </li> -->
      </ul>
      
        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#" id="link" data-toggle="modal" data-target="#changePassword">Change Password</a></li>
            <li class="divider"></li>
            <li><a href="index.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<form name="myForm" id="myForm">
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog" style="width: 327px;">
        <div class="modal-content">
          <!--Model Header Section start-->
          <p class="alert alert-danger" id="pwdmissmatch" style="display: none;">
                	Invalid username/password..!
                </p>
                <p class="alert alert-success" id="pwdmatch" style="display: none;">
                    Password changed....!
                </p>  
          <!--Model header Section end-->
          <div class="modal-body">
            	<div>
						<!--<label>Username</label>-->
                    <div id="username" class="form-group has-feedback">
                      <label class="control-label" for="txtUname">Username</label>
                      <input type="text" class="form-control" name="txtUname" id="txtUname" autocomplete="off" 
                      placeholder="Username" tabindex="1" required="required" title="Username">
                    </div>
                    <div id="password" class="form-group has-feedback">
                      <label class="control-label" for="txtCPassword">Current Password</label>
                      <input type="password" class="form-control" name="txtCPassword" id="txtCPassword" autocomplete="off" 
                      placeholder="Current Password" tabindex="1" required="required" title="Password">
                    </div>
                    <div id="npassword" class="form-group has-feedback">
                      <label class="control-label" for="txtNPassword">New Password</label>
                      <input type="password" class="form-control" name="txtNPassword" id="txtNPassword" autocomplete="off" 
                      placeholder="New Password" tabindex="2" required="required" title="New Password">
                    </div>
                    <div id="rpassword" class="form-group has-feedback">
                      <label class="control-label" for="txtRNPassword">Retype Password</label>
                      <input type="password" class="form-control" name="txtRNPassword" id="txtRNPassword" autocomplete="off" 
                      placeholder="Retype Password" tabindex="3" required="required" title="Retype Password">
                    </div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="modal-close">Close</button>
            		<button type="button" class="btn btn-primary pull-right" id="modal-update" 
                            onclick="doAction(<?php session_start(); if(isset($_SESSION['id'])){echo $_SESSION['id'];} else {echo '1';}?>)">
                        Update Password</button>
               	</div>
          </div>
          
        </div>
      </div>
</div></form>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/dropdown.js"></script>
<script>
    $('#link').click(function(e) {
        $('#pwdmissmatch').hide();
        $('#pwdmatch').hide();
        $('#txtUname').val('');
        $('#txtCPassword').val('');
        $('#txtNPassword').val('');
    });
    function doAction(id) {
        var info = {
            id: id,
            username: $('#txtUname').val(),
            password: $('#txtCPassword').val(),
            new_password: $('#txtNPassword').val()
        }
        $.ajax({
            type:"POST",
            url:"password.php",
            data: info,
            success: function(msg) {
                //alert("Result : "+msg);
                if($.trim(msg)=='1') {
                    $('#pwdmissmatch').hide();
                    $('#pwdmatch').show('slow');	
                } else if($.trim(msg)=='0') {
                    $('#pwdmatch').hide();
                    $('#pwdmissmatch').show('slow');
                }
            }
        });
	}
</script>