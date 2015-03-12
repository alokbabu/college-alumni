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
			<ul class="list-group">
			  <a class = "list-group-item active" href="message.php">Compose</a></li>
			  <a class="list-group-item" href="inbox.php">Inbox</a>
			  <a class="list-group-item" href="outbox.php">Sent</a></li>
			</ul>
		</div>
		<div class="col-md-10">
			<?php
				//Alert page will display Errors and success alerts when $_SESSION["errors"] and $_SESSION["success"] is set.
				include 'alert.php';
			?>
			<ul class="nav nav-tabs">
				  <li role="presentation"><a href="profile.php">Profile</a></li>
			  <li role="presentation" class="active"><a href="inbox.php">Messages</a></li>
			  <li role="presentation" ><a href="status.php">Status</a></li>
			</ul>

			<form method="post" action = "lib/controller/MessageController.php">
				<div class="form-group">
					<div class="input-group">
							<div class="input-group-addon">To</div>
						<input name="message" type="textbox" class="form-control" placeholder="E-mail id"  />
					</div>
				</div>
				<div class="form-group">
					<!--<label for="about"></label>-->
					<textarea name="status" class="form-control" rows="7"></textarea>
				</div>
				
				<div class="form-group">

					<input type="submit" class="btn btn-primary" value="Sent"/>						
				</div>
			</form>
		</div><!--./col-md-12-->				
	</div><!-- ./container-->

		</div><!--./container-->
<?php include_once 'includes/footer.php'; ?>