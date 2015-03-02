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


class SignUp extends Login
{
//Member properties
	/**
	* @var string holds email.
	*/
	private $email;
	/**
	 * @var string holds firstname.
	*/
	private $firstname;

	/**
	 * @var int holds username.
	*/
	private $lastname;
	
	/**
	 * @var string holds gender.
	*/
	private $gender;

	/**
	 * @var int holds security qn.
	*/
	private $username;

	/**
	 * @var int holds security qn.
	*/
	private $password;
	


	function __construct($email, $firstname, $lastname, $gender, $username, $password)
	{
		$this->email = $email;
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->password = $password;
		$this->username = $username;

	}

	function __destruct()
	{

	}

	public function generate_validation_token()
	{
		//Logic random pair of numbers alphabets
	}

}
