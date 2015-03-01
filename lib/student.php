<?php
/**
* Author:
* Description: Student member properties declaration.
* Date: 28 - Feb - 2015
* Version: 1.0
* Company: Technolodge 
*/
include_once 'lib/batch.php';

class student extends batch
{
	//Member properties
	var $studentid;
	var $firstname;
	var $lastname;
	var $gender;
	var $address;
	var $email;
	var $mobile;
	
	//Constructor
	function __construct()
	{
	 //Initialize the parent constructor if required.
	 //parent::__construct(); 
	 $this->studentid = "";
	 $this->firstname = "";
	 $this->lastname = "";
	 $this->gender= "";
	 $this->address = "";
	 $this->email = "";
	 $this->mobile = ""; 
	}

	//Member Functions

	// Magic Getter Method for PHP. Rather than calling individual getters and setters for member properties
	// this method can get any member property by its name.
	// Eg: $object->__get("firstname");
	public function __get($property) 
	{
	    if (property_exists($this, $property)) 
	    {
		    return $this->$property;
		}
	}

	// Magic Setter Method for PHP. Rather than calling individual getters and setters for member properties
	// this method can set any member property by its name and value.
	// Eg: $object->__set("firstname","Joe")
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