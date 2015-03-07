<?php
session_start();
if(isset($_SESSION['userid']))
{
	header('Location: home.php');
}
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
		<div class="jumbotron">
		  <h1>College Alumni Home Page</h1>
		  <p>A College Alumni website using Bootstrap and PHP</p>
		  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
		</div>
	
		<div class="panel panel-default" style="min-height: 600px;">
			<div class="col-md-6">
				<h1>Heading</h1>
				<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, suscipit voluptas earum mollitia, 
				culpa voluptatibus aspernatur pariatur atque omnis sapiente soluta natus veniam, enim eaque itaque 
				laudantium deleniti voluptate ad. Deserunt dolorem corporis voluptates ipsum, quibusdam facilis 
				natus neque at, ipsa, deleniti similique. Incidunt nemo dignissimos reiciendis velit perferendis! 
				
			</p>
			</div>		
			<div class="col-md-6 break-tp-md">
				<div class="panel panel-default">
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
					                    <input type="submit" class="btn btn-primary" >
					                </div>
					            </div>
				           	</form>
			        	</div> <!-- ./panel-body-->
	            </div> <!-- ./panel-->
			</div>		
		</div> <!-- ./panel-default-->
	</div> <!-- ./container-->
</body>

<?php include_once 'includes/footer.php'; ?>



