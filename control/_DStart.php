<?php echo exec("sudo systemctl restart centrunk.dvrs 2>&1",$output); // Output work ?>
<?php echo 'dvmhost restarted successfully'; ?>
<meta http-equiv="refresh" content="3; URL=../index.php?page=DChannel" />