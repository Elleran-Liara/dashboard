<?php echo exec("sudo systemctl restart centrunk.vc 2>&1",$output); // Output work ?>
<?php echo 'dvmhost restarted successfully'; ?>
<meta http-equiv="refresh" content="3; URL=../index.php?page=VChannel" />