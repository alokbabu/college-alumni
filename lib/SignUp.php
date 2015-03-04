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
		$this->password = md5($password);
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
		if($signup->__get("email") == ""||$signup->__get("email") == null )
		{
			array_push($this->validation_errors, "Enter a email address") ;
		}
		else if(filter_var($signup->__get("email"), FILTER_VALIDATE_EMAIL) === false)
		{
			array_push($this->validation_errors, "Enter a valid Email address");

		}

		if(empty($signup->__get("username")))
		{
			array_push($this->validation_errors, "Please enter a username");
		}
		else if(!preg_match("/^[a-zA-Z0-9]{8,15}$/", $signup->__get("username")))
		{
			array_push($this->validation_errors, "Usernames must contain only letters and numbers, maximum 8-15 length. No white space allowed");
		}

		if(empty($signup->__get("password"))||$signup->__get("password")==null||$signup->__get("password")=="")
		{
			//echo "mmmmmmmmmmmmmmmmmmmmmmmmm";
			//echo $signup->__get("password");
			array_push($this->validation_errors, "Please enter a password");
		}
		else if(!preg_match("/^[a-zA-Z0-9]*$/", $signup->__get("password")))
		{
			array_push($this->validation_errors, "password must contain only letters and numbers, maximum 8-15 length. No white space allowed");
		}

		return $this->validation_errors;
	}

// END SignUp class

/* End of file SignUp.php */
/* Location: ./lib/SignUp.php */


}
