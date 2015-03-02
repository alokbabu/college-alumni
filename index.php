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
				// Creating instance (object) of Student class                 
				$student_one = new student();

				//Setting values to new_admission object of student class with magic functions
				$student_one->__set("studentid","1001");
				$student_one->__set("firstname","John");
				$student_one->__set("lastname","Doe");
				$student_one->__set("gender","Male");
				$student_one->__set("address","Bournville, Portsmouth");
				$student_one->__set("mobile","8974569896");
				$student_one->__set("email","johndoe@college.edu.in");
				$student_one->__set("courseid","7");
				$student_one->__set("batchid","3");

				//Creating another instance.
				$student_two = new Student();
				$student_two->__set("studentid","1002");
				$student_two->__set("firstname","Jeff");
				$student_two->__set("lastname","Gordon");
				$student_two->__set("gender","Male");
				$student_two->__set("address","Melbourne, Christchurch");
				$student_two->__set("mobile","876567897");
				$student_two->__set("email","jeffgordon@college.edu.in");
				$student_two->__set("courseid","7");
				$student_two->__set("batchid","3");

				//Adding objects to an array
				$students = array();
				array_push($students, $student_one);
				array_push($students, $student_two);
				var_dump($students);

				$department = new department(1,"computer");
				var_dump($department);

				$user = new Login(1,'merin','pass','ur fav color','green');
				var_dump($user);

				//Creating instance of Query Class
				//$query= new Query();
				//$query->add_student($new_admission);
				//$query->get_student_byid('1');    

				?>			
		</div> <!-- ./panel-default-->
	</div> <!-- ./container-->
</body>

<?php include_once 'footer.php'; ?>



