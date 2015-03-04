<?php
Class ErrorController
{
	private $error_no;
	private $error_message;

	function __construct()
	{
		$this->error_no = 0;
		$this->error_message = "";
	}

	public function set_error($error_no, $error_message)
	{		
		$this->error_no = $error_no;
		$this->error = $error_message;
		$this->add_session();

	}

	public function add_session()
	{
		$_SESSION["error"] = $this;
	}

	public function get_error_no()
	{
		return $this->error_no;
	}

	public function get_error_message()
	{
		return $this->error_message;
	}

	public function show_error()
	{

	}
}


?>