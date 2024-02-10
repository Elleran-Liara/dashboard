<?php
   ob_start();
   session_start();
if (!isset($_SESSION['username']))
{
    header("Location: login.php");
    die();
}
?>
<?php require('control/_config.php'); ?>
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
  <style>
      
      @import url(https://fonts.googleapis.com/css?family=Roboto:300);

.control-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 2.5rem;            /* Footer height */
}
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
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
        <li><a href="index.php?page=Home">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Logs<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?page=ShortLogs">Short Logs</a></li>
            <li><a href="index.php?page=FullLogs">Full Logs</a></li>
          </ul>
        </li>
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
    <form method="post" action="control/_VCRestart.php" class="restart-form">
        <input type="submit" value="Restart">
    </form>
    <form method="post" action="control/_VCStop.php" class="stop-form">
        <input type="submit" value="Stop">
    </form>
        <form method="post" action="control/_VCStart.php" class="start-form">
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
