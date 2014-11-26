<?php
include("/home/content/36/7793136/html/CLAPEN_OTHER/db_properties.php");

$email = htmlentities($_GET['email']);

$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

$browser = $_SERVER['HTTP_USER_AGENT'];
$chrome = '/Chrome/';
$firefox = '/Firefox/';
$ie = '/MSIE/';
if(preg_match($chrome, $browser))
	$browser = "Chrome/Opera";
if(preg_match($firefox, $browser))
	$browser = "Firefox";
if(preg_match($ie, $browser))
	$browser = "IE";

$sql="INSERT INTO emails_landing (email,browser,ip,hostname,city,region,country,org)
VALUES ('".$email."','".$browser."','".$ip."','".$details->hostname."','".$details->city."','".$details->region."','".$details->country."','".$details->org."')";


mysql_query($sql, $link);


/* Code by David McKeown - craftedbydavid.com */
/* Editable entries are bellow */

$send_to = "hola@clapen.com";
$send_subject = "Nuevo registro en Clapen";

$t=time();
$registro = date("Y-m-d H:i:s",$t);

/*Be careful when editing below this line */

$f_email = cleanupentries($email);
$from_ip = $_SERVER['REMOTE_ADDR'];
$from_browser = $_SERVER['HTTP_USER_AGENT'];

function cleanupentries($entry) {
	$entry = trim($entry);
	$entry = stripslashes($entry);
	$entry = htmlspecialchars($entry);

	return $entry;
}

$message = "This email was submitted on " . date('m-d-Y') . 
"\n\nE-Mail: " . $f_email . 
"\n\nTime: " . $registro . 
"\n\n\nTechnical Details:\n" . $from_ip . "\n" . $from_browser;

$headers = "From: " . $f_email . "\r\n" .
    "Reply-To: " . $f_email . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

if (!$f_email) {
	echo "no email";
	exit;
}else{
	if (filter_var($f_email, FILTER_VALIDATE_EMAIL)) {
		mail($send_to, $send_subject, $message, $headers);
		echo "true";
	}else{
		echo "invalid email";
		exit;
	}
}

?>