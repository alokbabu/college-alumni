<?php
/**
 * Description: Batch declaration class
 *
 * @author: 
 * @version: 1.0.0.0
 * @package: lib
 * @subpackage:
 * @since:
 * @copyright: Technolodge, 2015. 
 * @license: BSD, ./license.txt
 */

include_once 'course.php';

class Batch extends Course
{  
	//Properties or Member variables
	private $batchid;
	private $batchname;

	//Initialises the object
	function __construct()
	{
		$this->batchid=0;
		$this->batchname = "";
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