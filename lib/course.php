<?php
include 'lib/department.php';

/**
* 
*/
class Course extends Department
{
	var $courseID;
	var $coursename;

	function __construct()
	{
		$this->courseID=0;
		$this->coursename = "";
	}
}

?>