<?php 
include_once 'includes/header.php';
include_once 'lib/Login.php';
include_once 'lib/Query.php';
$home = "active";
$about = "";
$student = "";
$tutorials = "";
$contact = "";
?>
<body>
	<div class="container">
		<?php include_once 'includes/nav-bar.php'; ?>
        
        <div class="panel panel-default" style="width : 600px;">
        	<div class="panel-heading">Sign up</div>
        	<div class="panel-body">
        		<form action="sign-up-process.php" method="post">
		            <div class="form-group">
		                <label for="email" class="col-md-3 control-label">Email</label>
		                <div class="col-md-9">
		                    <input type="text" class="form-control" name="email" placeholder="Email Address">
		                </div>
		            </div>
		            <div class="form-group break-tp-sm">
		                <label for="firstname" class="col-md-3 control-label">First Name</label>
		                <div class="col-md-9">
		                    <input type="text" class="form-control" name="firstname" placeholder="First Name">
		                </div>
		            </div>
		            <div class="form-group break-tp-sm">
		                <label for="lastname" class="col-md-3 control-label">Last Name</label>
		                <div class="col-md-9">
		                    <input type="text" class="form-control" name="lastname" placeholder="Last Name">
		                </div>
		            </div>
		            <div class="form-group break-tp-sm">
		                <label for="gender" class="col-md-3 control-label">Gender</label>
		                <div class="col-md-9">
		                    <select class="form-control" name="gender">
		                    	<option value="-1">select gender</option>
		                    	<option value="2">Male</option>
		                    	<option value="3">Female</option>
		                    </select>
		            </div>
		            </div>
		            <div class="form-group break-tp-sm">
		                <label for="username" class="col-md-3 control-label">Username</label>
		                <div class="col-md-9">
		                    <input type="text" class="form-control" name="username" placeholder="Username">
		                </div>
		            </div>
		            <div class="form-group break-tp-sm">
		                <label for="password" class="col-md-3 control-label">Password</label>
		                <div class="col-md-9">
		                    <input type="password" class="form-control" name="password" placeholder="Password">
		                </div>
		            </div>
		            <div class="form-group break-tp-sm">
		                <label for="submit" class="col-md-3 control-label"></label>
		                <div class="col-md-9">
		                    <input type="submit" class="btn btn-default" >
		                </div>
		            </div>
	            </form>
            </div><!--./panel-body-->    
		</div> <!-- ./panel-->
	</div> <!-- ./container-->

</body>

<?php include_once 'includes/footer.php'; ?>
