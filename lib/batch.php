<?php
include_once 'course.php';
class Batch extends Course
{
  var $batchid;
  var $batchname;
  function __construct()
	{
		$this->batchid=0;
		$this->batchname = "";
	}
}
?>