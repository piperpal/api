<?php

require_once('/var/www/html/piperpal/vendor/stripe/stripe-php/init.php');

// require_once('/home/4/p/piperpal/stripe-php/init.php');
// require_once('/home/4/p/piperpal/YayLocation.php');

// $yay = new YayLocation($_POST);

// $token = $_GET['stripeToken'];

//	print "INSERT IGNORE INTO piperpal (name, location, service, glat, glon, modified, created, paid, token, type, email) VALUES ('" . $_GET['name'] . "','" . $_GET['location'] . "','" . $_GET['service'] . "','" . $_GET['glat'] . "','" . $_GET['glon'] . "',NOW(), NOW(), '" . $_GET['paid'] . "','" . $_GET['stripeToken'] . "', '" . $_GET['stripeTokenType'] . "','" . $_GET['stripeEmail'] . "') ON DUPLICATE KEY UPDATE modified = NOW();";

// try {
    
//     if ($yay->get_freedate($_GET['notBefore'], $_GET['notAfter']) == TRUE) {
        
//         $yay->get_checkout("INSERT IGNORE INTO piperpal (name, location, service, glat, glon, modified, created, paid, token, type, email) VALUES ('" . $_GET['name'] . "','" . $_GET['location'] . "','" . $_GET['service'] . "','" . $_GET['glat'] . "','" . $_GET['glon'] . "', '" . date("Y-m-d h:i:s",strtotime($_GET['notBefore'])) . "','" . date("Y-m-d h:i:s",strtotime($_GET['notAfter'])) . "','" . $_GET['paid'] . "','" . $_GET['stripeToken'] . "', '" . $_GET['stripeTokenType'] . "','" . $_GET['stripeEmail'] . "') ON DUPLICATE KEY UPDATE modified = NOW();");
//         print_r($yay->result);
        
//         $stripe = array(
//             "secret_key"      => "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",
//             "publishable_key" => "pk_live_51MsrtFAgJ7jHvJPRzksQbNY4573e98c9MPwsnOXymtKYWFUVgh6BbmZV9tPhhTwppFLDabbfm7Lkj9dEYaJBD9em00xNBVHJzf"
//         );
        
//         \Stripe\Stripe::setApiKey($stripe['secret_key']);
        
//         if ($_GET['paid'] > 0) {
            
//             $charge = \Stripe\Charge::create(array("amount" => $_GET['paid'],
//                                                    "currency" => "usd",
//                                                    "source" => $token,
//                                                    /					 "description" => $_GET['name']));
//         }
//     }
// }
// catch(\Stripe\Error\Card $e) {
//   print "The card has been declined.  Please try another card.";
// }

$fp = fopen("/var/www/html/piperpal/data.csv", "a+");
fwrite($fp, "push;" . time() . ";" . $_SERVER['REMOTE_ADDR'] . ";" . $_GET['name'] . ";" . $_GET['stripeToken'] . "\n");
fclose($fp);
$db = mysqli_connect("localhost","piperpal","Cup-tales-rafta-2036-vispe","piperpal");
$query = "INSERT IGNORE INTO piperpal (name, location, service, glat, glon, modified, created, paid, token, type, email) VALUES ('" . $_GET['name'] . "','" . $_GET['location'] . "','" . $_GET['service'] . "','" . $_GET['glat'] . "','" . $_GET['glon'] . "', NOW(), NOW(),'" . $_GET['paid'] . "','" . $_GET['stripeToken'] . "', '" . $_GET['stripeToken'] . "','" . $_GET['stripeEmail'] . "') ON DUPLICATE KEY UPDATE modified = NOW();";
$result = $db->query($query);
header("Location: https://www.piperpal.com/?query=" . $_GET['name'] . "&glat=" . $_GET['glat'] . "&location=" . $_GET['location'] . "&glon=" . $_GET['glon'] . "&service=" . $_GET['service'] . "&paid=" . $_GET['paid']);

print "<!DOCTYPE html><html lang='en'><head><meta charset='utf-8' />";
print "<meta http-equiv='refresh' content='120; url=https://www.piperpal.com/?query=" . $_GET['name'] . "&radius=10000&search=Go&glat=" . $_GET['glat'] . "&glon=" . $_GET['glon'] . "'>";

print "</head>\n";
print "<body>\n";
print "<h1>piperpal.com</h1>\n";
print "&lt;location name=\"" . $_GET['name'] . "\" location=\"" . $_GET['location'] . "\" service=\"" . $_GET['service'] . "\" glat=\"" . $_GET['glat'] . "\" glon=\"" . $_GET['glon'] . "\" notbefore=\"" . date("Y-m-d h:i:s",strtotime($_GET['notBefore'])) . "\" notafter=\"" . date("Y-m-d h:i:s",strtotime($_GET['notAfter'])) . "\" paid=\"" . $_GET['paid'] . "\" /&gt;";        
//    print "<p>We will process the payment...</p>\n";
print "<p>Redirecting to the Location search engine.</p>\n";

exit(0);

?>
