<?php
//include 'lib/Database.php';
include_once 'lib/batch.php';




class student extends batch
{
	var $studentid;
	var $firstname;
	var $lastname;
	var $gender;
	var $address;
	var $email;
	var $mobile;
	
	function __construct()
	{
	
	$this->studentid = "";
	 $this->firstname = "";
	 $this->lastname = "";
	 $this->gender= "";
	 $this->address = "";
	 $this->email = "";
	 $this->mobile = ""; 
	 //parent::__construct();
	}

	

	public function __get($property) 
	{
    if (property_exists($this, $property)) 
    {
	      return $this->$property;
	    }
	  }

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