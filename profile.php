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
		<div class="col-md-2">
		    <a href="#" class="thumbnail">
		      <img src="http://www.trueaussielocal.com.au/photo/no-profile-pic-img.gif" alt="prof-pic">
		    </a>
		    <a href="#" >Upload profile pic</a>
		</div>
		<div class="col-md-10">
			<ul class="nav nav-tabs">
	  		  <li role="presentation" class="active"><a href="#">Profile</a></li>
			  <li role="presentation"><a href="#">Messages</a></li>
			  <li role="presentation"><a href="#">Status</a></li>
			</ul>
			<form method="post" action = "lib/controller/ProfileController.php">
				<div class="form-group">
					<label for="about">About me</label>
					<textarea  class="form-control" rows="4"></textarea>
				</div>
				<div class="form-group">
					<label for="firstname">First Name</label>
					<input name="fname" type="textbox" class="form-control" placeholder="Firstname"/>
				</div>
				<div class="form-group">
					<label for="lastname">Last Name</label>
					<input name="lname" type="textbox" class="form-control" placeholder="lastname"/>
				</div>
				<div class="form-group">
					<label for="gender">Gender</label>
					<select name="gender" class="form-control">
						<option value = "-1">Select gender</option>
						<option value = "0">Male</option>
						<option value = "1">Female</option>
					</select>
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input name="address" type="textbox" class="form-control" placeholder="Address"/>
				</div>
				<div class="form-group">
					<label for="phone">Phone</label>
					<input name="phone" type="textbox" class="form-control" placeholder="Phone"/>
				</div>
				<div class="form-group">
					<label for="occupation">Current occupation</label>
					<select class="form-control">
						<option value = "0">Select occupation</option>
						<option value = "1">No records</option>
						<option value = "2">No records</option>
					</select>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input name="email" type="textbox" class="form-control" value="" placeholder="E-mail"/>
				</div>
				<div class="form-group">
					<label for="currentcompany">Current company</label>
					<input name="company" type="textbox" class="form-control" value="" 	placeholder="Current company"/>
				</div>
				<div class="form-group">
					<label for="position">Position</label>
					<input name="position" type="textbox" class="form-control" value="" placeholder="Position"/>
				</div>
				
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Save"/>
				</div>
			</form>
			</div>
		</div>
	</div> <!--./container-->

<?php include_once 'includes/footer.php'; ?>