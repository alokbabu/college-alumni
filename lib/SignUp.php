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

include_once $_SERVER['DOCUMENT_ROOT'].'/college-alumni/lib/Login.php';


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

	private $validation_errors;
	


	function __construct($email, $username, $password)
	{
		$this->email = $email;
		$this->username = $username;
		$this->password = $password;
		$this->email_validation_token = $this->generate_validation_token();
		$this->validation_errors = "";
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

	
	public function validatate_signup(self $signup)
	{
		$this->validation_errors = array();
		//var_dump($signup);
		if(empty($signup->email))
		{
			array_push($this->validation_errors, "E-mail address cannot be empty.") ;
		}
		else if(filter_var($signup->email, FILTER_VALIDATE_EMAIL) === false)
		{
			array_push($this->validation_errors, "Enter a valid E-mail address.");

		}

		if(empty($signup->username))
		{
			array_push($this->validation_errors, "Username cannot be empty.");
		}
		else if(!preg_match("/^[a-zA-Z0-9]{4,15}$/", $signup->username))
		{
			array_push($this->validation_errors, "Usernames must contain only letters and numbers, maximum 4-15 length. No white space allowed");
		}

		if(empty($signup->password))
		{
			array_push($this->validation_errors, "Please enter a password.");
		}
		//URL: http://stackoverflow.com/questions/8141125/regex-for-password-php
		else if(!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $signup->password))
		{
			array_push($this->validation_errors, "Password must be a minimum of 8 characters.");
			array_push($this->validation_errors, "Password must contain at least 1 number.");
			array_push($this->validation_errors, "Password must contain at least one uppercase character.");
			array_push($this->validation_errors, "Password must contain at least one lowercase character.");
		}
		return $this->validation_errors;
	}

// END SignUp class

/* End of file SignUp.php */
/* Location: ./lib/SignUp.php */


}
