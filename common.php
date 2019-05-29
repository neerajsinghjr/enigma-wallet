<?php
/*
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
*/
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('error_reporting', 0);
ini_set('display_errors','0');
define("_BASE_URL_PATH_","wallet");
define("IN_WALLET", true);
define("ADMIN_EMAIL", "bitfxcoin17@gmail.com");



session_start();
//header('Cache-control: private'); // IE 6

	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "fuckingInsane@9";
	$db_name = "wallet";
	define("_LIVE_",true); // for testing in local system no coin function will call


define("WITHDRAWALS_ENABLED", true); //Disable withdrawals during maintenance

$mysqli = new Mysqli($db_host, $db_user, $db_pass, $db_name);


include('jsonRPCClient.php');
if($testing == 1)
{
	include('classes/Client_test.php');
}
else
{
	include('classes/Client.php');
}
include('classes/User.php');

// function by zelles to modify the number to coin format ex. 0.00120000
function satoshitize($satoshitize2) {
   return sprintf("%.8f", $satoshitize2);
}

function isEmail($email)
{
	return preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU', $email) ? TRUE : FALSE;
}



function getRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';

    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;
}


function getRandomOTPString($length = 8) {
    $string = '';
    $characters = '0123456789';

    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;
}




// function by zelles to trim trailing zeroes and decimal if need
function satoshitrim($satoshitrim) {
   return rtrim(rtrim($satoshitrim, "0"), ".");
}

$dir_path = "mywallet";

$server_ip = "173.82.173.191";
$server_url = "http://".$server_ip."/".$dir_path."/";  // website url


// Localhost Server
// $rpc_host = "localhost";
// $rpc_port = "2019";
// $rpc_user = "supergirlcoinrpc";
// $rpc_pass = "7Y82PgVygRgwfyFjS5Ft7y35NgJxVdAJRfL6gdpSskUe";

// SuperGirlCoin Cloud Server
$rpc_host = "35.187.234.50";
$rpc_port = "2019";
$rpc_user = "supergirlcoinrpc";
$rpc_pass = "J4wEwn3DWkzh3CcutpRQbCK9qmFogXDJgyWFGhKAE35i";

// Demon-King Cloud Server
// $rpc_host = "34.74.146.142";
// $rpc_port = "2019";
// $rpc_user = "supergirlcoinrpc";
// $rpc_pass = "8xoFFuf6vKiWCvyJi9TkikhbitRHR5QFnzqa4wt9HKJk";

// Demon-Lord Cloud Server
// $rpc_host = "34.74.139.245";
// $rpc_port = "2019";
// $rpc_user = "supergirlcoinrpc";
// $rpc_pass = "CxDDepP4BF3tQNM58nsq7JPeDuuEoqK1FG2cm7jfRbCR";

$coin_fullname = "Enigma "; //Website Title (Do Not include 'wallet')
$coin_short = "Tokens"; //Coin Short 
$server_name = "";

$blockchain_url = "http://".$server_ip.":3001/tx/"; //Blockchain Url
$support = ""; //Your support eMail
$hide_ids = array(1); //Hide account from admin dashboard
$donation_address = ""; //Donation Address

$fee = "0.001"; //Set a fee to prevent negitive balances.  	

function sendpmail($smto, $smsub, $smbody)
{
	
	$email_from ="noreply@bitfxcoin.io";
	$headers = 'From: '.$email_from."\r\n".
						        'Reply-To: '.$email_from."\r\n" .
						        'X-Mailer: PHP/' . phpversion();
						        @mail($smto, $smsub, $smbody, $headers);  
	
	
	
	require_once 'PHPMailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'mail.bitfxcoin.io';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'support@bitfxcoin.io';                 // SMTP username
	$mail->Password = '4IE{aHCqD_K$';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('support@bitfxcoin.io', 'bitfxCoin');
	$mail->addAddress($smto);               // Name is optional
	$mail->addReplyTo('support@bitfxcoin.io', 'Support');
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $smsub;
	$mail->Body    = $smbody;
	if(!$mail->send())
	{
		return 'Mailer Error: ' . $mail->ErrorInfo;
	}
	else
	{
		return 'Message has been sent';
	}
	
}

function sendMailToAdmin($smto, $smfrom, $smsub, $smbody)
{
	
		$headers = 'From: '.$smfrom."\r\n".
						        'Reply-To: '.$smfrom."\r\n" .
						        'X-Mailer: PHP/' . phpversion();
	   @mail($smto, $smsub, $smbody, $headers);  
	
	
	require_once 'PHPMailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;

	$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'mail.bitfxcoin.io';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'donotreply@bitfxcoin.io';                 // SMTP username
	$mail->Password = '4IE{aHCqD_K$';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom($smfrom);
	$mail->addAddress($smto);               // Name is optional
	$mail->addReplyTo($smfrom, 'Reply');
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $smsub;
	$mail->Body    = $smbody;
	if(!$mail->send())
	{
		return 'Mailer Error: ' . $mail->ErrorInfo;
	}
	else
	{
		return 'Message has been sent';
	}
	
}


function page_protect()
{
	if(!isset($_SESSION))
	{
		session_start();
	}
    if (isset($_SESSION['HTTP_USER_AGENT']))
    {
        if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT']))
        {
            logout();
            exit;
        }
    }
    
}
function filter($data)
{
    $data = trim(htmlentities(strip_tags($data)));
    if (get_magic_quotes_gpc())
    {
        $data = stripslashes($data);
    }
  //  $data = mysql_real_escape_string($data);
    return $data;
}
function logout()
{
    global $db;
    global $pathString;
    session_start();
    unset($_SESSION['user_id']);
	unset($_SESSION['user_email_id']);
    unset($_SESSION['user_session']);
	unset($_SESSION['user_admin']);
    unset($_SESSION['user_supportpin']);
    unset($_SESSION['HTTP_USER_AGENT']);
	session_unset();
    session_destroy();
    header("Location:login.php");
}
?>
