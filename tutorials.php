<?php 
include_once 'header.php';
include_once 'lib/query.php';
$home = "";
$about = "";
$student = "";
$tutorials = "active";
$contact = "";
?>
<body>
	<div class="container">
		<?php include_once 'nav-bar.php'; ?>
		<div class="panel panel-default" style="min-height: 600px;">
			<div class="col-md-12">
				<h3>Setting values to student object</h3>
				<p>
					<pre>
						<code>							
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

//constructor overloading
$new = new student("1001","John","Doe","Male","San fransico","johndoe@example.com","200600799");
							
						</code>
					</pre>
				</p>
			</div><!-- ./col-md-6-->
		</div> <!-- ./panel-default-->
	</div> <!-- ./container-->
</body>

<?php include_once 'footer.php'; ?>



