<?php

/**
 * Description: Login class.
 *
 * @author: 
 * @version: 1.0.0.0
 * @package: lib
 * @subpackage:
 * @since:
 * @copyright: Technolodge, 2015. 
 * @license: https://github.com/alokbabu/college-alumni/blob/master/license.txt BSD
 */

include_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/Student.php';


class Login extends Student
{
//Member properties
	/**
	 * @var int holds loginid.
	*/
	private $loginid;

	/**
	 * @var int holds username.
	*/
	private $username;
	
	/**
	 * @var int holds password.
	*/
	private $password;

	/**
	 * @var int holds security qn.
	*/
	private $sec_question;
	
	/**
	 * @var int holds security ans.
	*/
	private $sec_answer;

	function __construct()
	{
		$this->loginid = 0;
		$this->username = "";
		$this->password = "";
		$this->sec_question = "";
		$this->sec_answer = "";

	}

	function __destruct()
	{

	}

	/**
	 * Magic Getter Method for PHP. Rather than calling individual getters and setters for member properties
	 * this method can get any member property by its name.
	 *
	 * @param: string
	 * Eg: $object->firstname
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
