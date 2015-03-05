<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Alumni</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="<?php echo $home; ?>"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li class="<?php echo $profile;?>"><a href="profile.php">My Profile</a></li>
        <li class="<?php echo $search;?>"><a href="#">Search</a></li>
        <li class="<?php echo $logout;?>"><a href="logout.php">Logout</a></li>
      </ul>

      <form class="navbar-form navbar-right" action = "lib/Controller/LoginController.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search..." name="search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>        
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>