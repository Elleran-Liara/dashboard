<?php echo exec("sudo sudo /sbin/reboot 2>&1",$output); // Output work ?>
<?php echo 'Hotspot restarted sucessfully. Please wait up to 2 minutes to access system.'; ?>
<meta http-equiv="refresh" content="30; URL=../index.php?page=Admin" />