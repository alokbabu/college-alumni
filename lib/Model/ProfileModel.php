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
Class ProfileModel extends Database
{
	//Database operations

	public function view(Student $student)
	{
	   $myconn = $this->establish_connection();
      if(!($stmt=$myconn->prepare("SELECT student_id, college_id, firstname, lastname, gender, address, phone, 
      							    email, course.course_id, batch.batch_id, course, year_from, year_to, company, position, about FROM `student`
									INNER JOIN `batch` on student.batch_id = batch.batch_id
									INNER JOIN `course` on student.course_id = course.course_id WHERE student.email = ?")))
		{
			return "Prepare failed: (" . $myconn->errno . ") " . $myconn->error;
		}

		$email               = $student->email;		
		
		/* Prepared statement, stage 2: bind and execute */

		/* Bind parameters
         * s - string, b - blob, i - int, etc 
        */

		if(!($stmt->bind_param("s", $email)))
		{
			return "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}

		/* 
		 * Exectuing Query against MySql
		 *
		*/ 
		if (!$stmt->execute()) 
		{
			 return "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		else
		{
			$stmt->bind_result($student_id, $college_id, $firstname, $lastname, $gender, $address, $phone, 
      		$email, $course_id, $batch_id, $course, $year_from, $year_to, $company, $position, $about);
			/*
			 * MySqli_stmt_fetch()
			 * TRUE	Success. Data has been fetched
			 * FALSE	Error occurred
			 * NULL	No more rows/data exists or data truncation occurred
			 */
			while($stmt->fetch())
			{
				//Adding result to an array.
				$result = array("student_id"=>$student_id, "college_id"=>$college_id, "firstname"=>$firstname, "lastname"=>$lastname, "gender"=>$gender, "address"=>$address, "phone"=>$phone, 
      							    "email"=>$email, "course_id"=>$course_id, "batch_id"=>$batch_id, "course"=>$course_id, "year_from"=>$year_from, "year_to"=>$year_to, "company"=>$company, "position"=>$position, "about"=>$about);
				return $result;
			}
		}
		/* explicit close recommended */
		$stmt->close();

		$myconn->close();
	}

	public function insert(Student $newStudent)
	{
      $myconn = $this->establish_connection();
      if(!($stmt=$myconn->prepare("INSERT INTO student (college_id, firstname, lastname, gender,address,phone,email,course_id,batch_id,company,position,about) VALUES (?,?, ?, ?, ?,?,?,?,?,?,?,?)")))
		{
			return "Prepare failed: (" . $myconn->errno . ") " . $myconn->error;
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

	public function update(student $student)
	{
	  $myconn = $this->establish_connection();
      if(!($stmt=$myconn->prepare("UPDATE student SET college_id = ?, firstname = ?, lastname = ?, gender = ?,address = ?,
      			phone = ?,email = ?,course_id = ?,batch_id = ?,company = ?,position = ?,about = ? WHERE email = ?")))
		{
			return "Prepare failed: (" . $myconn->errno . ") " . $myconn->error;
		}

		$college_id = 1;
        $firstname = $student->firstname;
        $lastname = $student->lastname;
        $gender = $student->gender;
        $address = $student->address;
        $phone = $student->phone;
        $email = $student->email;
        $course_id = 1;
        $batch_id = 1;
        $company = $student->company;
        $position = $student->position;
        $about = $student->about;

        if(!($stmt->bind_param("ississsiissss", $college_id,$firstname,$lastname,$gender ,$address,$phone,$email,$course_id,$batch_id,$company,$position,$about,$email)))
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

	public function delete()
	{
		
	}
}

?>