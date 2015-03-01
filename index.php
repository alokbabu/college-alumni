<?php 
include_once 'header.php';
include_once 'lib/student.php';
include_once 'lib/query.php';
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
			// Creating instance (object) of Student class                 
			$new_admission = new student();

			//Setting values to new_admission object of student class with magic functions
			$new_admission->__set("studentid","stud5");
			$new_admission->__set("firstname","merin");
			$new_admission->__set("lastname","mm");
			$new_admission->__set("gender","female");
			$new_admission->__set("address","m_address");
			$new_admission->__set("mobile","8974569896");
			$new_admission->__set("email","@gmail.com");
			$new_admission->__set("courseid","7");
			$new_admission->__set("batchid","3");

			print_r($new_admission);

			//Creating instance of Query Class
			//$query= new Query();
			//$query->add_student($new_admission);
			//$query->get_student_byid('1');    

			?>
		</div> <!-- ./panel-default-->
	</div> <!-- ./container-->
</body>

<?php include_once 'footer.php'; ?>



