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

include_once 'lib/Login.php';


class SignUp
{
//Member properties
	/**
	* @var string holds email.
	*/
	private $email;
	/**
	 * @var int holds security qn.
	*/
	private $username;
	/**
	 * @var int holds security qn.
	*/
	private $password;
	/**
	 * @var string holds email validation token for validating emails. This token will be send to 
	 * user's email address and when the user clicks the link his email will be validated.
	*/
	private $email_validation_token;
	


	function __construct($email, $username, $password)
	{
		$this->email = $email;
		$this->username = $username;
		$this->password = $password;
		$this->email_validation_token = $this->generate_validation_token();
	}

	function __destruct()
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

	/**
	* Generates random string with provided length
	* @param int $length
	* @return string
	*
	**/
	public function generate_validation_token($length = 30)
	{		
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

// END SignUp class

/* End of file SignUp.php */
/* Location: ./lib/SignUp.php */


}
