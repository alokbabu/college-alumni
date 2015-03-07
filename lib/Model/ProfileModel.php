<?php 
/**
 * Description: StudentModel Class for executing Student related Database operations.
 *
 * @author: 
 * @version: 1.0.0.0
 * @package: lib
 * @subpackage:
 * @since:
 * @copyright: Technolodge, 2015. 
 * @license: https://github.com/alokbabu/college-alumni/blob/master/license.txt BSD
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/Database.php';
Class StudentModel extends Database
{
	//Database operations

	public function view()
	{

	}

	public function insert(Student $newStudent)
	{
      $myconn = $this->establish_connection();
      if(!($stmt=$myconn->prepare("INSERT INTO student (college_id, firstname, lastname, gender,address,phone,email,course_id,batch_id,company,position,about) VALUES (?,?, ?, ?, ?,?,?,?,?,?,?,?)")))
		{
			return "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}

		$college_id = 1;
        $firstname = $newStudent->firstname;
        $lastname = $newStudent->lastname;
        $gender = $newStudent->gender;
        $address = $newStudent->address;
        $phone = $newStudent->phone;
        $email = $newStudent->email;
        $course_id = 1;
        $batch_id = 1;
        $company = $newStudent->company;
        $position = $newStudent->position;
        $about = $newStudent->about;

        if(!($stmt->bind_param("ississsiisss", $college_id,$firstname,$lastname,$gender ,$address,$phone,$email,$course_id,$batch_id,$company,$position,$about)))
		{
			return "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}


		if (!$stmt->execute()) 
		{
			 return "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		else
		{
			/*
			 * Returns the number of rows affected by INSERT, UPDATE, or DELETE query.
			 *
			*/
			return $stmt->affected_rows;
		}
		/* explicit close recommended */
		$stmt->close();

		$myconn->close();

	}

	public function update()
	{

	}

	public function delete()
	{
		
	}
}

?>