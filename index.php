<?php 

$p = array("Home", "ShortLogs", "FullLogs", "Settings", "Map","Control","Admin","CChannel","VChannel","DChannel","VOChannel","login","logout");

if ((isset($_GET['page']) || !empty($_GET['page'])) && in_array($_GET['page'], $p))

    {
        include('pages/'.$_GET['page'].'.php');

}else{

        include('pages/Home.php');
    }

?>
