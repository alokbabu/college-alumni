<div class="alert alert-warning">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Warning!</strong> 
    <?php
    	echo $_SESSION["error"];    	
    	$_SESSION["error"] = ""; 
    ?>
</div>