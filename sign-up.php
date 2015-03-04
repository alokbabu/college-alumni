<?php
session_start();
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
        		<form action="lib/Controller/SignUpController.php" method="post">
		            <div class="form-group break-tp-sm">
		                <label for="email" class="col-md-3 control-label">Email</label>
		                <div class="col-md-9">
		                    <input type="text" class="form-control" name="email" placeholder="Email Address" value = "<?php if(isset($_GET["email"])) { echo $_GET["email"]; } ?>">
		                </div>
		            </div>
		            
		            <div class="form-group break-tp-sm">
		                <label for="username" class="col-md-3 control-label">Username</label>
		                <div class="col-md-9">
		                    <input type="text" class="form-control" name="username" placeholder="Username" value = "<?php if(isset($_GET["username"])) { echo $_GET["username"]; } ?>">
		                </div>
		            </div>
		            <div class="form-group break-tp-sm">
		                <label for="password" class="col-md-3 control-label">Password</label>
		                <div class="col-md-9">
		                    <input type="password" class="form-control" name="password" placeholder="Password" value="">
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
		 <?php
		 	//Alert page will display Errors and success alerts when $_SESSION["errors"] and $_SESSION["success"] is set.
		 	include_once 'alert.php'; 
		 ?>
		 </div><!-- ./container-->
</body>

<?php include_once 'includes/footer.php'; ?>
