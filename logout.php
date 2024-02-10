<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   header('Refresh: 2; URL = index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CTRS Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

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
        <li ><a href="index.php?page=Home">Home</a></li>
        <li><a href="index.php?page=About">About</a></li>
        <li><a href="index.php?page=Admin">Admin</a></li>
        <li class="active" class="dropdown">
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
      </ul>
    </div>
  </div>
</nav>
<div class="container text-center">    
  <div class="control-page">
  <div class="form">
    <p>Sucessfully logged out</p>
  </div>
</div>
</div><br>

<footer class="container-fluid text-center">
  <p>&copy; Copyright <?php echo date("Y");?> Hanna Johnson. All rights reserved.</p>
</footer>

</body>
</html>
