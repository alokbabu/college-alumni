<?php
/**
 * Description: For executing queries against MySql Database.
 *
 * @author: 
 * @version: 1.0.0.0
 * @package: lib
 * @subpackage:
 * @since:
 * @copyright: Technolodge, 2015. 
 * @license: BSD, ./license.txt
 */

include_once 'lib/database.php';
include_once 'lib/student.php';

public class Query extends Database
{

	/** 
	 * Returns an HTML table with student_id_auto and fname.
	 *
	 * Note: This function is for training only. It is not a good convention to echo or return a HTML table result.
	 * return string or array instead.
	 *
	 * @param: int
	 * @return: db result object/array.
	*/
	public function get_student_by_id($id)
	{
		//Creates a connection object with initialised values in the Database constructor. Use print_r($myconn) for 
		//detailed result.
		$myconn = parent::establish_connection();
		
		//Building query to be executed against MySql
	  	$getstud = "SELECT * FROM `students` where stud_id_auto='".$id."'";
	    // Executing Query and fetches db result
	    $this->result = $myconn->query($getstud); 
	    // If number of rows in the result is greater than zero.
	    if($this->result->num_rows > 0)
	    {
	    	echo "<table border='1'>"; //Creates a html table element tag
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
	   echo "</table >"; //Closing html table element tag.	
	}

	/** 
	 * Gets all department  either as an HTML table or as database result object or as an array of 
	 * deparment object when type is defined.
	 *
	 * @param: string
	 * @return: string, array, dbresult
	 * Eg: get_department_all("table"); , get_department_all("row")
	*/
	public function get_department_all($type="")
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

	/**
	 * Insert student to database when a student object is passed as parameter.
	 *
	 * @param : Student
	 * @return: dbresult
	*/
	public function add_student(student $std)
	{
		$myconn = parent::establish_connection();

		//Building insert query
		//TODO: Validate values before inserting.
		$insertstud="INSERT INTO `students`(`studentid`, `fname`, `lname`, `gender`, `address`, `mobile`, `email`, `courseid`, `batchid`) VALUES ('".$std->studentid."','".$std->firstname."','".$std->lastname."','".$std->gender."','".$std->address."','".$std->mobile."','".$std->email."','".$std->courseid."','".$std->batchid."')";
		//Execute query
		$myconn->query($insertstud); 
		//Should return the result. Returns number of rows affected by the query.
		return $myconn->result;
	}
}

?>