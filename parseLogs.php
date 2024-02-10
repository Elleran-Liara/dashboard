<?php
    date_default_timezone_set("UTC"); // set the time zone to UTC bc thats what dvmhost is
    $cDate = date("Y-m-d"); // get the time so it knows the log to use
    $lType = ".activity"; //type of log. for future additions
    $logFile = "/var/log/centrunk/" . "DVM-VC1-" . $cDate . $lType . ".log"; //concatenate aka put the name of the log file together 
    $logFileData = file_get_contents($logFile); //bad variable names here ik. This isnt csv.  get the log file
    $logFileData = explode("\n", $logFileData); // Use a new line as the separating value

    foreach ($logFileData as $key => $logFileDatum){
        $logLineParts1 = explode(' ', $logFileDatum);
        $logLineParts[$key] = preg_replace('/\s+/', ' ', $logLineParts1);
        //echo $logLineParts[2];
    }
    $idJson = file_get_contents('idAlias.json'); // Get the aliases for ids and tgs
    $idAlias = json_decode($idJson, true); //decode said aliases
    $ridAlias = $idAlias['rIds']; //bad var name i know. Get the rids and aliases
    $tgAlias = $idAlias['tgIds']; // get the tgids and aliases
?>
<html lang="en">
<head>
    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>

</head>
<table>
<tbody style='display: table-header-group;' id="center"></tbody>
    <thead>

<span style="color:grey;">
  <?php
  //ar_dump($ridAlias);
foreach ($logLineParts as $key => $rows) :
    $ber = $rows[10] . $rows[11];
    $ber = str_replace(["TG", "to", "seconds,", "BER", ":", "%", "packet", ","], "", $ber);
    //echo $ber;
    $action = $rows[6] . $rows[7];

    $action = str_replace(['encryptedvoice', 'affiliationrequest', 'grantrequest', 'endoftransmission', 'voicetransmission'],
        ["<span style='color:orange'>Encrypted Voice</span>","<span style='color:blue'>Affiliation Request</span>",
            "<span style='color:yellow'>Group Grant Request</span>",
            "End of Voice Transmission",
            "<span style='color:red'>Voice Transmission</span>"
        ],
        $action);
    $tTg = $rows[12] . $rows[13];
    if (strpos($tTg, '%') !== false){
        continue;
    }
    $tTg = str_replace(["packet", "loss", "block", "s"], "", $tTg);

    if (empty($tTg)){
        continue;
    }
    $srcId = $rows[9] . $rows[10];
    $srcId = str_replace(["TG", ",","to"], "", $srcId);
    if (empty($srcId)){
        continue;
    }


?>

</span>
  <tr class="item_row" style="align-content: center">
      <?php for ($x = 1; $x <= 4; $x++) :?>
        <?php
          $rows[$x] = str_replace("Net", "NET", $rows[$x]);
          //TODO: Fix to use id and tg alias
/*            foreach ($ridAlias as $alias){
                $rows[$x] = str_replace($alias['id'], $alias['name'], $rows[$x]);
                //echo $alias['id'];
            }*/
            ?>
     
        <td> <?php echo "<span style='font-size: 28px; color:black'>" . $rows[$x] . "</span>"; ?>&nbsp;&nbsp;</td>
      <?php endfor;?>
      <td class="align-middle"> <?php echo "<span style='font-size: 28px; font-family: sans-serif;'>" . $action . "</span>"; ?>&nbsp;&nbsp;</td>
      <td class="align-middle text-center text-sm"> <?php echo "<span style='font-size: 28px; color: A4F644;'>" . $srcId . "</span>"; ?>&nbsp;&nbsp;</td>
      <td> <?php echo "<span style='font-size: 28px; color: A4F644;'> " . $tTg . "</span>"; ?>&nbsp;&nbsp;</td>
  </tr>
<?php endforeach;
echo "</tbody>";
echo "</table>";
?>
