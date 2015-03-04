<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong>
  <br />
  <?php
    foreach ($_SESSION["errors"] as $error) {
        echo $error;
        echo "<br>";
    }
        //echo $_SESSION["error"]; 
        unset($_SESSION["errors"]);     
    ?>
</div>