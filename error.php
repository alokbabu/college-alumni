<div class="alert alert-warning">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Warning!</strong> 
    <br>
    <?php
    foreach ($_SESSION["errors"] as $error) {
    	echo $error;
    	echo "<br>";
    }
    	//echo $_SESSION["error"]; 
    	unset($_SESSION["errors"]);   	
    ?>
</div>