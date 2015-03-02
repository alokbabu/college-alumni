<?php 
include_once 'header.php';
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
		<?php include_once 'nav-bar.php'; ?>
		<div class="jumbotron">
		  <h1>College Alumni Home Page</h1>
		  <p>A College Alumni website using Bootstrap and PHP</p>
		  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
		</div>
	
		<div class="panel panel-default" style="min-height: 600px;">
			
				<?php


				$new = new student("1001","John","Doe","Male","San fransico","johndoe@example.com","200600799");
				$new->add_new_student($new);



				//Creating instance of Query Class
				//$query= new Query();
				//$query->add_student($new_admission);
				//$query->get_student_byid('1');    

				?>			
		</div> <!-- ./panel-default-->
	</div> <!-- ./container-->
</body>

<?php include_once 'footer.php'; ?>



