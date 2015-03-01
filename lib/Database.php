<?php
/**
* Author:
* Description: Initialises database connection.
* Date: 28 - Feb - 2015
* Version: 1.0
* Company: Technolodge 
*/
class Database 
{
    //Member properties
    var $servername;
    var $username;
    var $password;
    var $dbname;
    var $conn;
    var $result;

    //Constructor
    function __construct()
    {
    	$this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "college_alumini";
        $this->conn = "";
        $this->result = array(); 
    }

    //Memeber Function
    //Returns a connection object on successful connection.
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