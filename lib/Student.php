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
	private $mobile;
	
	//Constructor
	function __construct($studentid, $firstname, $lastname, $gender, $address, $email, $mobile)
	{
	 //Initialize the parent constructor if required.
	 //parent::__construct(); 
	 $this->studentid = $studentid;
	 $this->firstname = $firstname;
	 $this->lastname = $lastname;
	 $this->gender= $gender;
	 $this->address = $address;
	 $this->email = $email;
	 $this->mobile = $mobile;
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
}
// END Student class

/* End of file Student.php */
/* Location: ./lib/Student.php */

?>