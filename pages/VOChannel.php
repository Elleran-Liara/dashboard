<?php
   ob_start();
   session_start();
if (!isset($_SESSION['username']))
{
    header("Location: login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CTRS Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php require('control/_config.php'); ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">CTRS Dashboard</a>
    </div>
     <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php?page=Home">Home</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Logs<span class="caret"></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="index.php?page=ShortLogs">Short Logs</a></li>
            <li><a class="dropdown-item" href="index.php?page=FullLogs">Full Logs</a></li>
          </ul>
        </li>
        <li><a href="index.php?page=Admin">Admin</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Control<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?page=CChannel">Control Channel</a></li>
            <li><a href="index.php?page=VChannel">Voice Channel</a></li>
            <li><a href="index.php?page=DChannel">DVRS</a></li>
            <li role="separator" class="divider"></li>
            <li class="disabled"><a href="index.php?page=VOChannel">VOC</a></li>
          </ul>
        </li>
        <li><a href="index.php?page=Map">Map</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
               if ($_SESSION['username'] == $username) {
           echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
               }else {
          echo  '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
               }
          ?>
      </ul>
    </div>
  </div>
</nav>
<div class="container text-center">    
  <div class="control-page">
  <div class="form">
      <p>Control DVMHost Here</p>
    <form method="post" action="control/_restart.php" class="restart-form">
        <input type="submit" value="Restart">
    </form>
    <form methos="post" action="control/_stop.php" class="stop-form">
        <input type="submit" value="Stop">
    </form>
        <form methos="post" action="control/_start.php" class="start-form">
        <input type="submit" value="Start">
    </form>  
  </div>
</div>
</div><br>

<footer class="container-fluid text-center">
  <p>&copy; Copyright <?php echo date("Y");?> Hanna Johnson. All rights reserved.</p>
</footer>

</body>
</html>
