<html>
<?php
include 'clg_alumni_header.php';
?>
<body>	
	<div class="main" align="center">
		     <div class="heading">
			      MACE ALUMNI<br>
			      Mar Athanasius College of Engineering Kothamangalam
		     </div><br>
		     <div >
		     	
			       <?php
			        include 'clg_alumni_slider.php';
			        ?>
		      </div><br>
		      <div>
			       <?php
                   include 'lib/student.php';
                   include 'lib/query.php';
                   $newstudent = new student();
                    $newstudent1 = new student();
                   

$new_admission = new student();
$new_admission->__set("studentid","stud5");
$new_admission->__set("firstname","merin");
$new_admission->__set("lastname","mm");
$new_admission->__set("gender","female");
$new_admission->__set("address","m_address");
$new_admission->__set("mobile","8974569896");
$new_admission->__set("email","@gmail.com");
$new_admission->__set("courseid","7");
$new_admission->__set("batchid","3");
                   //echo $newstudent1->return_table();
$query= new Query();
$query->add_student($new_admission);
$query->get_student_byid('1');    
print_r($new_admission);            
?>

	           </div>
	</div>
</body>
</html>





