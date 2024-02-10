<?php
   ob_start();
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
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
        <li ><a href="index.php?page=Home">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Logs<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?page=ShortLogs">Short Logs</a></li>
            <li><a href="index.php?page=FullLogs">Full Logs</a></li>
          </ul>
        </li>
         <?php
               if ($_SESSION['username'] == $username) {
           echo '<li class="active"><a href="index.php?page=Admin">Admin</a></li>';
               }else {
               }
          ?>
        
        <li class="dropdown">
          
          
                   <?php
               if ($_SESSION['username'] == $username) {
           echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Control<span class="caret"></span></a>
           <ul class="dropdown-menu">
            <li><a href="index.php?page=CChannel">Control Channel</a></li>
            <li><a href="index.php?page=VChannel">Voice Channel</a></li>
            <li><a href="index.php?page=DChannel">DVRS</a></li>
            <li role="separator" class="divider"></li>
            <li class="disabled"><a href="index.php?page=VOChannel">VOC</a></li>
          </ul>';
               }else {
               }
          ?>  
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
      <p>Login</p>
                <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['username'] == $username && 
                  $_POST['password'] == $password) {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = $username;
                  
                  echo 'You have entered valid use name and password';
                  header('Refresh: 1; URL = index.php');
               }else {
                  $msg = 'Wrong username or password';
               }
            }
         ?>

    <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username" 
               required autofocus>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>
     
  </div>
</div>
</div><br>

<footer class="container-fluid text-center">
  <p>&copy; Copyright <?php echo date("Y");?> Hanna Johnson. All rights reserved.</p>
</footer>

</body>
</html>
