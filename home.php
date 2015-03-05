<?php
session_start();
if(!isset($_SESSION['userid']))
{
	header('Location: index.php?authentication=required');
}
include_once 'includes/header.php';
include_once 'lib/Login.php';
include_once 'lib/Query.php';
$home = "active";
$profile = "";
$search = "";
$logout = "";
?>
<body>
	<div class="container">
		<?php include_once 'includes/nav-bar-user.php'; ?>
		<div class="jumbotron"><h1>Welcome !</h1><h3><?php echo $_SESSION['username'];?></h3></div>
	</div> <!-- ./container-->
</body>

<?php include_once 'includes/footer.php'; ?>
