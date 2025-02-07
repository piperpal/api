<?php

$fp = fopen("/var/www/html/piperpal/data.csv", "a+");
fwrite($fp, "push;" . $_SERVER['REMOTE_ADDR'] . ";" . $_GET['name'] . "\n");
fclose($fp);
#header("Location: https://piperpal.com/cft/s/?name=" . $_GET['name'] . "&glat=" . $_GET['glat'] . "&location=" . $_GET['location'] . "&glon=" . $_GET['glon'] . "&service=" . $_GET['service'] . "&paid=" . $_GET['paid']);

#exit(0);

# echo $_SERVER['REMOTE_ADDR'];

# if ($_SERVER['REMOTE_ADDR']=="178.255.144.178" || $_SERVER['REMOTE_ADDR']=="51.175.144.124") {
# if ($_SERVER['REMOTE_ADDR']=="178.255.144.178"||$_SERVER['REMOTE_ADDR']=="194.63.248.32"||$_SERVER['REMOTE_ADDR']=="51.175.231.6") {
    $db = mysqli_connect("localhost","piperpal","Cup-tales-rafta-1920-vispe","piperpal");
    $query = "INSERT INTO piperpal (name,location,service,glat,glon,modified,created,paid) VALUES ('" . $_GET['name'] . "', '" . $_GET['location'] . "', '" . $_GET['service'] . "', " . $_GET['glat'] . "," . $_GET['glon'] . ",'" . date("Y-m-d h:i:s",strtotime($_GET['notBefore'])) . "','" . date("Y-m-d h:i:s",strtotime($_GET['notAfter'])) . "'," . $_GET['paid'] . ");";
    print $query . "\n";
    $result = $db->query($query);
# }
?>
