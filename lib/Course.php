<?php
/*
* Author: 
* Description: Course Class with Course member properties
* Date: 28 - Feb - 2015
* Version: 1.0
* Company: Technolodge.
*/

include_once 'lib/department.php';

class Course extends Department
{
	//Member properties
	private $courseid;
	private $coursename;

	//Constructor.
	function __construct()
	{
		$this->courseid=0;
		$this->coursename = "";
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

	//Member functions goes below.
	
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
?>