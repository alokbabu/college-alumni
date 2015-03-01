<?php
/**
 * Description: Initialises the connection to a MySql database.
 *
 * @author: 
 * @version: 1.0.0.0
 * @package: lib
 * @subpackage:
 * @since:
 * @copyright: Technolodge, 2015. 
 * @license: BSD, ./license.txt
 */
class Database 
{
    //Member properties
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;
    private $result;

    //Constructor
    function __construct()
    {
    	$this->servername = "localhost"; //change this if you wish to connect to a different server
        $this->username = "root";
        $this->password = "";
        $this->dbname = "college_alumini";
        $this->conn = "";
        $this->result = array(); 
    }

    /**
     * Destroys the object. 
     * PHP destroys the object at the end of file autmatically.
     * However you can destroy objects explicitly using unset()
     * 
    */
    public function __destruct()
    {
        //unset($this->conn);
    }

    /**
     * Memeber Function
     *
     * @return: Returns a connection object on successful connection.
    */
    function establish_connection()
    {
    	//Initialize Mysqli Object
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        //If connection fails to establish.
        if ($this->conn->connect_error) 
        {
           die("Connection failed: " . $this->conn->connect_error);
        } 
        else // if connection is successful
        {
        	return $this->conn;
        }
    }    
}
?>