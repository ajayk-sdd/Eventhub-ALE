<?php
// Get these from http://developers.facebook.com
$api_key = '460233210779849';
$secret  = '80dc194cbcba76886638754a6aedc0a7';

include_once './facebook-platform/php/facebook.php';

$facebook = new Facebook($api_key, $secret);
$user = $facebook->require_login();

?>
<h1>Yummie Tester</h1>
Hello <fb:name uid='<?php echo $user; ?>' useyou='false' possessive='true' />! <br>
Your id : <?php echo $user; ?>.<br>

<h2>Event<h2>
<?
$events = $facebook->api_client->events_get(null, null, null, null, null);

echo "<h3>Return array from Facebook</h3>";
print_r($events);
?>
