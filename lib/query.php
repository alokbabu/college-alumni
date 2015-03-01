<?php
/*
* Author: 
* Description: Query Class for executing database queries
* Date: 28 - Feb - 2015
* Version: 1.0
* Company: Technolodge.
*/
include_once 'lib/Database.php';
include_once 'lib/student.php';
class Query extends Database
{

	//Returns an HTML table with student_id_auto and fname
	//Params : $id
	function get_student_by_id($id)
	{
		$myconn = parent::establish_connection();
		
	  	$getstud = "SELECT * FROM `students` where stud_id_auto='".$id."' " ;
	    $this->result = $myconn->query($getstud); 
	    if($this->result->num_rows > 0)
	    {
	    	echo "<table border='1'>";
	  		echo "</td><td>"."stud_id"."</td><td>"."stud_name"."</td></tr>";
	     	while($row = $this->result->fetch_assoc()) 
	     	{
	     		echo "</td><td>".$row["stud_id_auto"]."</td><td>".$row["fname"]."</td></tr>";
	    	} 
	  } // if num_rows is 0
	  else
	  {
	      echo "no data found";
	  }
	   echo "</table >";		
	}


	//Gets all department  either as an HTML table or as database result object or as an array of deparment object
	// when type is defined.
	//Params optional type='table'/ type="row"
	function get_department_all($type="")
  	{
  		//Initialises the connection
	  	$myconn = parent::establish_connection();

	  	//TODO: Replace 'if' with switch case.
	  	// If parameter is set as "table". Returns HTML table result
	  	if ($type=="table") 
	  	{
		  	echo "<table border='1'>";
		  	echo "</td><td>"."deptid"."</td><td>"."deptname"."</td></tr>";
		    $getdept = "SELECT * FROM `department`" ;
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

	  	// If parameter is set as "row". Returns database result object.
	  	if($type=="row") 
	  	{
		    $getdept = "SELECT * FROM `department`" ;
		    $this->result = $myconn->query($getdept); 
		    return $this->result; 	
	  	}

	  	//If parameter is set to "object". Return array of department objects.
	  	if($type = "object")
	  	{
	  		$getdept = "SELECT * FROM `department`";
	  		$this->result = $myconn->query($getdept); 
	  		if($this->result->num_rows > 0)
		    {
		    	$result = array();
		    	while($row = $this->result->fetch_assoc()) 
			    {
			    	$obj_department = new Department();
			    	$obj_department->__set("departmentid", $row["deptid"]);
			    	$obj_department->__set("departmentname", $row["deptname"]);
			    	array_push($obj_department);
	    		}
	    		return $result;
		    }
	  	}
	}

	//Insert student to database when an initialised student object is passed as parameter.
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