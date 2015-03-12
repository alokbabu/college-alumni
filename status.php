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
include_once $_SERVER['DOCUMENT_ROOT']."/college-alumni/lib/Controller/StatusController.php";
include_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/config/config.php';
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
		<?php
		 	//Alert page will display Errors and success alerts when $_SESSION["errors"] and $_SESSION["success"] is set.
		 		include 'alert.php';
		 ?>
			<ul class="nav nav-tabs">
	  		  <li role="presentation"><a href="profile.php">Profile</a></li>
			  <li role="presentation"><a href="inbox.php">Messages</a></li>
			  <li role="presentation" class="active"><a href="status.php">Status</a></li>
			</ul>
			<form method="post" action = "lib/controller/StatusController.php">
				<div class="form-group">
					<label for="about">What you feeling right now?</label>
					<textarea name="status" class="form-control" rows="4"></textarea>
				</div>
				
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="update"/>						
				</div>
			</form>
			
				<?php
				$statuses = get_all_status($_SESSION["username"]);
				if(!empty($statuses))
				{
					foreach($statuses as $key )
					{
						echo "<div class='well'>";
						echo "<p>".$key["status"]."</p>";
						echo"<a href = ".$base_path."lib/Controller/StatusController.php?action=delete&id=".$key['status_id']." class='btn btn-default btn-sm'>delete</a>";
						echo "<small class='pull-right'>".$key["datetime_updated"]."</small>";
						echo "</div>";

					}
				}
				?>
			</div>
			</div>

		</div><!--./container-->
<?php include_once 'includes/footer.php'; ?>