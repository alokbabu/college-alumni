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

	function __construct($loginid,$username,$password,$sec_question,$sec_answer)
	{
		$this->loginid = $loginid;
		$this->username = $username;
		$this->password = $password;
		$this->sec_question = $sec_question;
		$this->sec_answer = $sec_answer;

	}

	function __destruct()
	{

	}

}
