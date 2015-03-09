<?php
session_start();
if(!isset($_SESSION['userid']))
{
	header('Location: index.php?authentication=required');
}
include_once 'includes/header.php';
include_once 'lib/Login.php';
include_once 'lib/Query.php';
include_once $_SERVER['DOCUMENT_ROOT']."/college-alumni/lib/Controller/StatusController.php";
include_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/config/config.php';
$home = "active";
$profile = "";
$search = "";
$logout = "";
?>
<body>
	<div class="container">
		<?php include_once 'includes/nav-bar-user.php'; ?>
		<div class="jumbotron"><h1>Welcome !</h1><h3><?php echo $_SESSION['username'];?></h3></div>
		<?php
		$all_statuses = get_all_status_everyone();
		foreach($all_statuses as $key )
		{
			echo "<div class='well'>";
			echo "<small>".$key["username"]." wrote on ".$key["datetime_updated"]."</small>";
			echo "<p>".$key["status"]."</p>";
			echo"<a href = ".$base_path."lib/Controller/StatusController.php?action=delete&id=".$key['status_id']." class='btn btn-default btn-sm'>delete</a>";
			echo "<small class='pull-right'>".$key["datetime_updated"]."</small>";
			echo "</div>";

		}
		?>
	</div> <!-- ./container-->
</body>

<?php include_once 'includes/footer.php'; ?>
