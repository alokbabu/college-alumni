<div class="alert alert-success" role="alert">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	   <?php
	    foreach ($_SESSION["success"] as $success_alert) 
	    {
	    	echo $success_alert;
	    	echo "<br>";
    	}
    	//echo $_SESSION["error"]; 
    	unset($_SESSION["success"]);  
?>
</div>