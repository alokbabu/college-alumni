<?php 
include_once 'header.php';
include_once 'lib/query.php';
$home = "";
$about = "";
$student = "";
$tutorials = "active";
$contact = "";
echo "Feba";
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
$new_admission = new student();

//Setting values to new_admission object of student class with magic functions
$new_admission->__set("studentid","1001");
$new_admission->__set("firstname","John");
$new_admission->__set("lastname","Doe");
$new_admission->__set("gender","Male");
$new_admission->__set("address","Bournville, Portsmouth");
$new_admission->__set("mobile","8974569896");
$new_admission->__set("email","johndoe@college.edu.in");
$new_admission->__set("courseid","7");
$new_admission->__set("batchid","3");

var_dump($new_admission); 
							
						</code>
					</pre>
				</p>

				<h4>var dumping values var_dump(<em class="text-italics">expression</em>)</h4>

				<?php
				// Creating instance (object) of Student class                 
				$new_admission = new student();


				//Setting values to new_admission object of student class with magic functions
				$new_admission->__set("studentid","1001");
				$new_admission->__set("firstname","John");
				$new_admission->__set("lastname","Doe");
				$new_admission->__set("gender","Male");
				$new_admission->__set("address","Bournville, Portsmouth");
				$new_admission->__set("mobile","8974569896");
				$new_admission->__set("email","johndoe@college.edu.in");
				$new_admission->__set("courseid","7");
				$new_admission->__set("batchid","3");

				var_dump($new_admission);

				//Creating instance of Query Class
				//$query= new Query();
				//$query->add_student($new_admission);
				//$query->get_student_byid('1');    

				?>
			</div><!-- ./col-md-6-->
		</div> <!-- ./panel-default-->
	</div> <!-- ./container-->
</body>

<?php include_once 'footer.php'; ?>



