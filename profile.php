<?php
if(!isset($_SESSION))
{
    session_start();
	if(!isset($_SESSION['userid']))
	{
		header('Location: index.php?authentication=required');
	}
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
		<?php
		   include_once $_SERVER['DOCUMENT_ROOT']."/college-alumni/lib/Controller/ProfileController.php";
		   include_once $_SERVER['DOCUMENT_ROOT']."/college-alumni/lib/Student.php";
		   include_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/config/config.php';

		   	$get_student = new student();
			$get_student->__set("email", $_SESSION["email"]);
			$student_info = get_student_info($get_student);
			//var_dump($student_info);
			$new_user = TRUE;
			if(empty($student_info))
			{
				//First time logging in
				$new_user = TRUE;

			}
			else // if user is a returning user
			{
				$new_user = FALSE;
			}		   
		?>
		<div class="col-md-10">
		<?php
		 	//Alert page will display Errors and success alerts when $_SESSION["errors"] and $_SESSION["success"] is set.
		 		include 'alert.php';
		 ?>
			<ul class="nav nav-tabs">
	  		  <li role="presentation" class="active"><a href="#">Profile</a></li>
			  <li role="presentation"><a href="#">Messages</a></li>
			  <li role="presentation"><a href="#">Status</a></li>
			</ul>
			<form method="post" action = "lib/controller/ProfileController.php">
				<div class="form-group">
					<label for="about">About me</label>
					<textarea name="about"  class="form-control" rows="4"><?php if(!$new_user) { echo $student_info['about']; } ?></textarea>
				</div>
				<div class="form-group">
					<label for="firstname">First Name</label>
					<input name="fname" type="textbox" class="form-control" placeholder="Firstname" value = "<?php if(!$new_user) { echo $student_info['firstname']; } ?>"/>
				</div>
				<div class="form-group">
					<label for="lastname">Last Name</label>
					<input name="lname" type="textbox" class="form-control" placeholder="lastname" value = "<?php if(!$new_user) { echo $student_info['lastname']; } ?>"/>
				</div>
				<div class="form-group">
					<label for="gender">Gender</label>
					<select name="gender" class="form-control">
						<option <?php if(!$new_user) { if($student_info['gender'] == 1) { echo 'selected="selected"'; }} ?> value = "-1">Select gender</option>
						<option <?php if(!$new_user) { if($student_info['gender'] == 0) { echo 'selected="selected"'; }} ?>  value = "0">Male</option>
						<option <?php if(!$new_user) { if($student_info['gender'] == 1) { echo 'selected="selected"'; }} ?> value = "1">Female</option>
					</select>
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input name="address" type="textbox" class="form-control" placeholder="Address" value = "<?php if(!$new_user) { echo $student_info['address']; } ?>"/>
				</div>
				<div class="form-group">
					<label for="phone">Phone</label>
					<input name="phone" type="textbox" class="form-control" placeholder="Phone" value = "<?php if(!$new_user) { echo $student_info['phone']; } ?>"/>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input name="email" type="textbox" class="form-control" placeholder="E-mail" value="<?php echo $_SESSION['email']; ?>" disabled/>
					<input type="hidden" name="email" value = "<?php echo $_SESSION['email']; ?>">
				</div>
				<div class="form-group">
					<label for="currentcompany">Current company</label>
					<input name="company" type="textbox" class="form-control" placeholder="Current company" value = "<?php if(!$new_user) { echo $student_info['company']; } ?>"/>
				</div>
				<div class="form-group">
					<label for="position">Position</label>
					<input name="position" type="textbox" class="form-control" placeholder="Position" value="<?php if(!$new_user) { echo $student_info['position']; } ?>"/>
				</div>
				
				<div class="form-group">
					<?php 
						if($new_user)
						{
							echo "<input type='submit' class='btn btn-primary' value='Save'/>";	
						}		
						else
						{
							echo "<input type='submit' class='btn btn-primary' value='Update'/>";
						}
					?>
				</div>
			</form>
			</div>
		</div><!--./container-->
<?php include_once 'includes/footer.php'; ?>