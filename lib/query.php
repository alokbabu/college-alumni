<?php
include_once 'lib/Database.php';
include_once 'lib/student.php';
/**
* 
*/
class Query extends Database
{

	//Get student by student id
	function get_student_byid($id)
	{
		$myconn = parent::establish_connection();
		
	  	$getstud = "SELECT * FROM `students` where stud_id_auto='".$id."' " ;
	    $this->result = $myconn->query($getstud); 
	    if($this->result->num_rows > 0)
	    {
	    	echo "<table border='1'>";
	  	echo "</td><td>"."stud_id"."</td><td>"."stud_name"."</td></tr>";
	     while($row = $this->result->fetch_assoc()) {
	       //return "<table border='1'><tr><td>".$row["deptid"]."</td><td>".$row["deptname"]."</td></tr></table>";
	     	echo "</td><td>".$row["stud_id_auto"]."</td><td>".$row["fname"]."</td></tr>";
	       
	    }
	    
	  }
	  else
	    {
	      echo "no data found";
	    }
	  	
	   echo "</table >";
	  		
	}


	//Gets all department
	//Params optional type='table'
	function get_department_all($type="")
  	{
	  	$myconn = parent::establish_connection();
	  	if ($type=="table") 
	  	{
		  	echo "<table border='1'>";
		  	echo "</td><td>"."deptid"."</td><td>"."deptname"."</td></tr>";
		    $getdept = "SELECT * FROM `department` " ;
		    $this->result = $myconn->query($getdept); 
		    if($this->result->num_rows > 0)
		    {
			    while($row = $this->result->fetch_assoc()) 
			    {
			    	echo "</td><td>".$row["deptid"]."</td><td>".$row["deptname"]."</td></tr>";
	    		}	  	
	  		}	
	   		echo "</table >";
	  		
	  	}
	  	
	  	if ($type=="row") 
	  	{
		  			  	//print_r($myconn);
		    $getdept = "SELECT * FROM `department` " ;
		    $this->result = $myconn->query($getdept); 
		    return $this->result; 	
	  	}
  	
	}

	//Insert student to database
	//param : Student stud
	function add_student(student $std)
	{
		$myconn = parent::establish_connection();


		$insertstud="INSERT INTO `students`(`studentid`, `fname`, `lname`, `gender`, `address`, `mobile`, `email`, `courseid`, `batchid`) VALUES ('".$std->studentid."','".$std->firstname."','".$std->lastname."','".$std->gender."','".$std->address."','".$std->mobile."','".$std->email."','".$std->courseid."','".$std->batchid."')";
		echo $insertstud;
		$myconn->query($insertstud); 
		echo "values inserted";
	}

}

?>