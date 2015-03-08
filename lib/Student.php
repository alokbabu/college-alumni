<?php
/**
 * Description: Student declaration class.
 *
 * @author: 
 * @version: 1.0.0.0
 * @package: lib
 * @subpackage:
 * @since:
 * @copyright: Technolodge, 2015. 
 * @license: https://github.com/alokbabu/college-alumni/blob/master/license.txt BSD
 */

include_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/batch.php';

class student extends batch
{
	//Member properties
	/**
	 * @var int holds studentid.
	*/
	private $studentid;
	/**
	 * @var string stores firstname for student.
	*/
	private $firstname;
	/**
	 * @var string stores lastname for student.
	*/
	private $lastname;
	/**
	 * @var string stores gender for student.
	*/
	private $gender;
	/**
	 * @var string stores address for student.
	*/
	private $address;
	/**
	 * @var string stores email for student.
	*/
	private $email;
	/**
	 * @var string stores mobile for student.
	*/
	private $phone;
	private $company;
	private $position;
	private $about;
	private $validation_errors;
	
	//Constructor
	function __construct($firstname = "", $lastname = "", $gender = "", $address = "", $email = "", $phone = "", $company = "", $position = "", $about = "")
	{
	 //Initialize the parent constructor if required.
	 //parent::__construct(); 
	 $this->firstname = $firstname;
	 $this->lastname = $lastname;
	 $this->gender= $gender;
	 $this->address = $address;
	 $this->email = $email;
	 $this->phone = $phone;
	 $this->company=$company;
	 $this->position=$position;
	 $this->about=$about;
	 $this->mobile = $phone;
	 $this->about = $about;

	 $this->validation_errors="";

	}

	/**
	 * Destroys the object. 
	 * PHP destroys the object at the end of file autmatically.
	 * However you can destroy objects explicitly using unset()
	 * 
	*/
	public function __destruct()
	{

	}

	//Member Functions goes below

	/**
	 * Magic Getter Method for PHP. Rather than calling individual getters and setters for member properties
	 * this method can get any member property by its name.
	 *
	 * @param: string
	 * Eg: $object->__get("firstname");
	*/
	public function __get($property) 
	{
	    if (property_exists($this, $property)) 
	    {
		    return $this->$property;
		}
	}

	/**
	 * Magic Setter Method for PHP. Rather than calling individual getters and setters for member properties
	 * this method can set any member property by its name and value.
	 *
	 * @param: string $property
	 * @param: string $value
	 * Eg: $object->__set("firstname","Joe");
	*/
  	public function __set($property, $value)
  	{
		if (property_exists($this, $property))
	  	{
	  		$this->$property = $value;
		}
		return $this;
  	}

public function validate_student(self $student)
	{
		$this->validation_errors = array();
		//var_dump($signup);
		if (empty($student->about)) 
		{
			array_push($this->validation_errors, "Please enter About.") ;
		}
		if (empty($student->firstname)) 
		{
			array_push($this->validation_errors, "Please enter First Name.") ;
		}
		else if(!preg_match("/^[a-zA-Z]{3,20}$/", $student->firstname))
		{
			array_push($this->validation_errors, "First name must contain only letters , maximum 3-20 length. No white space allowed");
		}
		if (empty($student->lastname)) 
		{
			array_push($this->validation_errors, "Please enter Last Name. ") ;
		}
		else if(!preg_match("/^[a-zA-Z]{3,20}$/", $student->lastname))
		{
			array_push($this->validation_errors, "Last name must contain only letters , maximum 3-20 length. No white space allowed");
		}
		if ($student->gender == '-1') 
		{
			array_push($this->validation_errors, "Please select Gender. ") ;
		}
		if (empty($student->address)) 
		{
			array_push($this->validation_errors, "Please enter Address. ") ;
		}
		else if(!preg_match("/^[a-zA-Z0-9 ]{4,100}$/", $student->address))
		{
			array_push($this->validation_errors, "Address must contain only letters and numbers, maximum 4-100 length.");
		}
		if (empty($student->phone)) 
		{
			array_push($this->validation_errors, "Please enter Phone Number. ") ;
		}
        else if(!preg_match("/^[0-9]{1,10}$/", $student->phone))
		{
			array_push($this->validation_errors, "Phone number must contain only numbers, maximum 1-10 length. No white space allowed");
		}
		if(empty($student->email))
		{
			array_push($this->validation_errors, "E-mail address cannot be empty.") ;
		}
		else if(filter_var($student->email, FILTER_VALIDATE_EMAIL) === false)
		{
			array_push($this->validation_errors, "Enter a valid E-mail address.");

		}
		if (empty($student->company)) 
		{
			array_push($this->validation_errors, "Please enter company.") ;
		}
		else if(!preg_match("/^[a-zA-Z ]{3,20}$/", $student->company))
		{
			array_push($this->validation_errors, "Company name must contain only letters , maximum 3-20 length.");
		}
		if (empty($student->position)) 
		{
			array_push($this->validation_errors, "Please enter position.") ;
		}
		else if(!preg_match("/^[a-zA-Z ]{3,40}$/", $student->position))
		{
			array_push($this->validation_errors, "Position name must contain only letters , maximum 3-40 length.");
		}
		return $this->validation_errors;
	}

}
// END Student class

/* End of file Student.php */
/* Location: ./lib/Student.php */

?>