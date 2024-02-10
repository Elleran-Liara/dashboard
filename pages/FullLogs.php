<!--sudo apt-get install php7.4-curl php_yaml php8.0 php apache2 composer require symfony/yaml 
composer require opcodesio/log-viewer
composer global require laravel/installer




-->
<?php
   ob_start();
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CTRS Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
<?php
require('control/_config.php');
 
// code which uses things declared in the "lib/Foo.php" or "lib/Bar.php" file 
?>
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
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Logs<span class="caret"></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="index.php?page=ShortLogs">Short Logs</a></li>
            <li><a class="dropdown-item" href="index.php?page=FullLogs">Full Logs</a></li>
          </ul>
        </li>
        
         <?php
               if ($_SESSION['username'] == $username) {
           echo '<li><a href="index.php?page=Admin">Admin</a></li>';
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
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
        <div class="well">

            <p>Affiliations</p>
            <p><?php echo "Afflilation Count: "; echo $arr["affiliationCount"];  ?></p>
            <p><?php echo "Peer Count: "; echo $arr["peerCount"];  ?></p>
        </div>
        <div class="well">
<?php
// Method 5: Using the yaml_parse() Function

// Check if the PECL YAML extension is loaded
if (function_exists('yaml_parse')) {
    // Load YAML data from a file
    $data = yaml_parse(file_get_contents($sysconfig));
    // Print the resulting array
    
} else {
    echo "The yaml_parse() function is not available.";
}
?>
            <p>Network Info</p>
            <p><?php echo "Network ID: "; print_r($data['network']['id']);?></p>
            <p><?php echo "System identity: "; print_r($data['system']['identity']);?></p>
            <p><?php echo "Net ID: "; print_r($data['system']['config']['netId']);?></p>
            <p><?php echo "System ID: "; print_r($data['system']['config']['sysId']);?></p>
            <p><?php echo "System NAC: "; print_r($data['system']['config']['nac']);?></p>
        </div>
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>DVM Logs</h1>
      
<?php
date_default_timezone_set("UTC"); // set the time zone to UTC bc thats what dvmhost is
$cDate = date("Y-m-d");
exec("cat /var/log/centrunk/" . "DVM-VC1-" . $cDate . ".log", $error_logs);

  foreach($error_logs as $error_log) {

       echo "<br />".$error_log;
  }

?>
        
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
<?php
$path = '/api/rid/list';
$url = "https://$apihost:$port$path";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'X-DVMFNE-MANAGER-API-KEY: ' . $apikey
]);

$response = curl_exec($curl);
$httpStatusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if (curl_errno($curl)) {
    echo "error: " . curl_error($curl);
} else if ($httpStatusCode == 200) {
    //echo "Response: " . $response;
} else {
    echo "HTTP Status Code: " . $httpStatusCode . "\n";
    echo "Response: " . $response . "\n";
}

curl_close($curl);
$arr = json_decode($response, true);

        
            
            
?>
            <p>Affiliations</p>
            <p><?php echo "Radio IDs: "; echo $arr["total_rids"];  ?></p>
        </div>
        <div class="well">
<?php
$path = '/api/tg/list';
$url = "https://$apihost:$port$path";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'X-DVMFNE-MANAGER-API-KEY: ' . $apikey
]);

$response = curl_exec($curl);
$httpStatusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if (curl_errno($curl)) {
    echo "error: " . curl_error($curl);
} else if ($httpStatusCode == 200) {
   // echo "Response: " . $response;
} else {
    echo "HTTP Status Code: " . $httpStatusCode . "\n";
    echo "Response: " . $response . "\n";
}

curl_close($curl);
$arr = json_decode($response, true);

        
            
            
?>
            <p>Affiliations</p>
            <p><?php echo "Talkgroups: "; echo $arr["total_talkgroups"];  ?></p>
        </div>
        
      <div class="well">
        <p>Total Uptime</p>
          <?php function Uptime() {
    $ut = strtok( exec( "cat /proc/uptime" ), "." );
    $days = sprintf( "%2d", ($ut/(3600*24)) );
    $hours = sprintf( "%2d", ( ($ut % (3600*24)) / 3600) );
    $min = sprintf( "%2d", ($ut % (3600*24) % 3600)/60  );
    $sec = sprintf( "%2d", ($ut % (3600*24) % 3600)%60  );


    return array( $days, $hours, $min, $sec );
}
$ut = Uptime();
echo " $ut[0]:$ut[1]:$ut[2]:$ut[3]"; ?>
      </div>
        <div class="well">
            <p>IP Address</p>
        <?php
$ifs = exec("netstat -rne | grep -v ' Iface' | grep 'UG ' | awk '{print $5, $8}'");
$interfaces = explode(PHP_EOL, $ifs);

$networks = array();
foreach($interfaces as $zbpalrf3s) {
    list($metric, $ethname) = explode(" ", $ztbpalrf3s);
    $ipaddr = exec("ifconfig ${ethname} | grep 'inet ' | cut -d: -f2 | awk '{print $2}'");
    $networks[$metric] = array($ethname=>$ipaddr);
}

ksort($networks);

print_r($ipaddr);
?>

        </div>
        
    </div>
  </div>
</div>

<footer>
  <p>&copy; Copyright <?php echo date("Y");?> Hanna Johnson. All rights reserved.</p>
</footer>

</body>
</html>
