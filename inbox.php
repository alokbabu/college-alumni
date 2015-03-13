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
			<ul class="list-group">
			  <a class = "list-group-item" href="message.php">Compose</a></li>
			  <a class="list-group-item active" href="inbox.php">Inbox</a>
			  <a class="list-group-item" href="outbox.php">Sent</a></li>
			</ul>
		</div>
		<?php
		   include_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/config/config.php';
		?>
		<div class="col-md-10">
		<?php
		 	//Alert page will display Errors and success alerts when $_SESSION["errors"] and $_SESSION["success"] is set.
		 		include 'alert.php';
		 ?>
			<ul class="nav nav-tabs">
	  		  <li role="presentation"><a href="profile.php">Profile</a></li>
			  <li role="presentation" class="active"><a href="inbox.php">Messages</a></li>
			  <li role="presentation"><a href="status.php">Status</a></li>
			</ul>
				<div class="row" style="border: 1px solid #c9c9c9; padding: 18px; margin:2px 2px;">
					<div>John Doe</div>
					<small>Message</small>
					<span class="text-disabled" style="display:block; font-size:11px;">Received on 19-08-20015 12:30 PM</span>
				</div>
				<div class="row" style="border: 1px solid #c9c9c9; padding: 18px; margin:2px 2px;">
					<div>Chris Nolen</div>
					<small>Message</small>
					<span class="text-disabled" style="display:block; font-size:11px;">Received on 19-08-20015 12:30 PM</span>
				</div>
				<div class="row" style="border: 1px solid #c9c9c9; padding: 18px; margin:2px 2px;">
					<div>Tom Fridger</div>
					<small>Message</small>
					<span class="text-disabled" style="display:block; font-size:11px;">Received on 19-08-20015 12:30 PM</span>
				</div>
				<div class="row" style="border: 1px solid #c9c9c9; padding: 18px; margin:2px 2px;">
					<div>Tom Fridger</div>
					<small>Message</small>
					<span class="text-disabled" style="display:block; font-size:11px;">Received on 19-08-20015 12:30 PM</span>
				</div>
			</div>
		</div><!--./container-->
<?php include_once 'includes/footer.php'; ?>