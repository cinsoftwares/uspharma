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
      <a class="navbar-brand" href="#"></a>
    </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            
            <li><a href="staff_daily_report.php">Daily Report</a></li>
            <li><a href="leave.php">Leave</a></li>
            <li><a href="add_doctor_staff.php">Add Doctor</a></li>
             <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#" id="link" data-toggle="modal" data-target="#changePassword">Change Password</a></li>  
            <li class="divider"></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

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
                    onclick="doAction(<?php if(isset($_SESSION['id'])){echo $_SESSION['id'];}?>)">Update Password</button>
               	</div>
          </div>
          
        </div>
      </div>
    </div>
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
        username = $('#txtUname').val();
        c_password = $('#txtCPassword').val();
        n_password = $('#txtNPassword').val();
        var info = {
            id: id,
            username: username,
            password: c_password,
            new_password: n_password
        }
        $.ajax({
            type:"POST",
            url:"password.php",
            data: info,
            success: function(msg) {
                //alert("Result : "+msg);
                if($.trim(msg)=='1') {
                    $('#pwdmatch').show();
                    $('#pwdmissmatch').hide();	
                } else if($.trim(msg)=='0') {
                    $('#pwdmissmatch').show();
                    $('#pwdmatch').hide();
                }
                //alert(msg);
            }
        });
	}
</script>

