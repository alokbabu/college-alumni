<?php

/**
* 
*/
class Database 
{
	var $servername;
	var $username;
	var $password;
	var $dbname;
	var $conn;
     var $result;

    
	
	function __construct()
	{

		$this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname="college_alumini";
        $this->conn="";
        $this->result=array();
        

    }
    
    function establish_connection()
    {
    	// Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
           die("Connection failed: " . $this->conn->connect_error);
        } 
        else
        {

        	return $this->conn;
        }

    }
        
	
}


?>