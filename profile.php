<?php
session_start();
if(!isset($_SESSION['userid']))
{
	header('Location: index.php?authentication=required');
}
include_once 'includes/header.php';
include_once 'lib/Login.php';
include_once 'lib/Query.php';
$home = "";
$profile = "active";
$search = "";
$logout = "";
?>
<body>
	<div class="container">
		<?php include_once 'includes/nav-bar-user.php'; ?>
		<div class="col-md-2"></div>
		<div class="col-md-10">
			<form method="post" action = "lib/controller/ProfileController.php">
				<div class="form-group">
					<label for="firstname">First Name</label>
					<input type="textbox" class="form-control" placeholder="Firstname"/>
				</div>
				<div class="form-group">
					<label for="lastname">Last Name</label>
					<input type="textbox" class="form-control" placeholder="lastname"/>
				</div>
				<div class="form-group">
					<label for="gender">Gender</label>
					<select class="form-control">
						<option value = "0">Select gender</option>
						<option value = "1">Male</option>
						<option value = "2">Female</option>
					</select>
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input type="textbox" class="form-control" placeholder="Address"/>
				</div>
				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="textbox" class="form-control" placeholder="Phone"/>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="textbox" class="form-control" value="<?php echo $_SESSION["email"];?>" disabled 	placeholder="E-mail"/>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Save"/>
				</div>
			</form>
			</div>
		</div>
	</div> <!--./container-->

<?php include_once 'includes/footer.php'; ?>