 <?php 
include_once('common.php');
$allowed = array(".", "-", "_");
$email_id ="";
$password = "";

//echo "           =>>>>>>> ".hash('sha256',addslashes(strip_tags($email_id)));
//echo "</br> </br> </br> </br> </br> </br> </br>           =>>>>>>> ".hash('sha256',addslashes(strip_tags($password)))."</br> </br> ";
$error = array();
if(isset($_POST['btnlogin']))
{
//	var_dump($_POST);
	$email_id = $_POST['txtEmailID'];
	$password = $_POST['txtpassword'];

	if (empty($email_id))
	{
		$error['emailError'] = "Please Provide valid email id";
	}	
	if(empty($password))
	{
		$error['passwordError'] = "Please Provide valid passowrd";
	}
	elseif (!isEmail($email_id))
	{
		$error['emailError'] = "Please Provide valid email id";
	}

	if(empty($error))
	{
		$email_id = $mysqli->real_escape_string(strip_tags($email_id));
		$password_value = hash('sha256',addslashes(strip_tags($password)));
		$qstring = "select coalesce(id,0) as id, coalesce(username,'') as username,
					coalesce(password,'') as password,
					coalesce(email,'') as email_id,
					coalesce(admin,'') as admin,
					coalesce(locked,0) as locked,
					coalesce(supportpin,'') as supportpin,
					coalesce(is_email_verify,0) as is_email_verify,
					coalesce(secret,'') as secret,
					coalesce(authused,0) as authused
					from users WHERE encrypt_username = '" . hash('sha256',$email_id) . "'";
		//echo $qstring;die;
		$result	= $mysqli->query($qstring);
		$user = $result->fetch_assoc();
		//var_dump($user);
		
		$secret = $user['secret'];
		if (($user) && ($user['password'] == $password_value) && ($user['locked'] == 0) && ($user['authused'] == 0))
		{
			//	session_start();
			session_regenerate_id (true); //prevent against session fixation attacks.
								
			//var_dump($user);
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['user_email_id'] = $user['email_id'];
			$_SESSION['user_session'] = $user['username'];
			$_SESSION['user_admin'] = $user['admin'];
			$_SESSION['user_supportpin'] = $user['supportpin'];
			$_SESSION['is_email_verify'] = $user['is_email_verify'];
			
			header("Location:myaddress.php");
			exit();

		} 
		elseif (($user) && ($user['password'] == $password_value) && ($user['locked'] == 1))
		{
			$pin = $user['supportpin'];
			$error['emailError'] = "Account is locked. Contact support for more information. $pin";
		}
		elseif (($user) && ($user['password'] == $password_value) && ($user['locked'] == 0) && ($user['authused'] == 1 && ($oneCode == $_POST['auth']))) 
		{
			//		session_start();
			session_regenerate_id (true); //prevent against session fixation attacks.
								
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['user_email_id'] = $user['email_id'];
			$_SESSION['user_session'] = $user['username'];
			$_SESSION['user_admin'] = $user['admin'];
			$_SESSION['user_supportpin'] = $user['supportpin'];
			$_SESSION['is_email_verify'] = $user['is_email_verify'];
			header("Location:myaddress.php");
			exit();
		}
		else
		{
				$error['emailError'] = "email_id, password is incorrect";
		}
	}
	else
	{
		$error['emailError'] = "email_id, password is incorrect";
	}
}
//var_dump($_SESSION);
?>
<!DOCTYPE html>
<html>
<!--<![endif]-->


	<head> 
		<meta charset="utf-8">
		<meta name="viewport"
			  content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

		<link rel="icon" type="image/png" href="favicon_32x32.png">

		<meta name="description" content="Bitfx - Initial Coin Offering - OpenLedger">
		<title>Enigma Wallet | CryptoCurrency for commodity, stock, index and forex market</title>
		<!-- Bootstrap core CSS -->
		<!--link href="css/bootstrap.min.css" rel="stylesheet"-->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="css/flipclock.css">
		<!-- Custom Google Web Font -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		
		<link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic'
			  rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
		<!-- Custom CSS-->
		<link href="css/general.css" rel="stylesheet">
		<!-- Owl-Carousel -->
		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/owl.theme.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
		<!-- Magnific Popup core CSS file -->
		<link rel="stylesheet" href="css/magnific-popup.css">
	</head>
	<body>
		<nav class="navbar-default " role="navigation">
			<div class="container navbar-container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-logo" href="#home">
						<img src="image/logo-04.png">
					</a>
				</div>
				<div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						
						
						<li class="menuItem"><a href="#" target="_blank">Explorer</a></li>
						<li class="menuItem"><a href="#" target="_blank">Block</a></li>
						<li class="menuItem"><a href="#contacts">Contacts Us</a></li>
						<li class="menuItem"><div class="user-login"><a href="./login.php" target="_blank">LogIn</a>&nbsp; | &nbsp;<a href="./signup.php" target="_blank">Register</a></div></li>
						
					</ul>
				</div>
			</div>
		</nav>
		<div class="login" style="background: url(./image/lock-1.jpg) !important;">
			<form  method="post" action="login.php">
				<div id="content">
					<div class="container-fluid">
						<div class="lock-container">
							<h1>Account Access</h1>
							<div class="panel panel-default text-center">
								<img src="image/guy-5.jpg" class="img-circle" style="margin: 20px 0 10px;      border-radius: 100%; vertical-align: middle; ">
								<div class="panel-body">
									<input id="txtEmailID" name="txtEmailID" class="form-control" style="border:2px solid #e08081;" type="text"
											value="<?php echo $email_id;?>" placeholder="enter email">
											<?php if(isset($error['emailError'])) { echo "<br/><span class=\"messageClass\">".$error['emailError']."</span>";  }?>
									<input id="txtpassword" name="txtpassword" placeholder="enter password" class="form-control" type="password" value="<?php echo $password;?>">
											<?php if(isset($error['passwordError'])) { echo "<br/><span class=\"messageClass\">".$error['passwordError']."</span>";  }?>	
									<input type="submit" class="btn btn-primary" id="btnlogin" name="btnlogin" value="Sign In"/>
											<span class="button Lockerblue ladda-button" id="btnLoading" style="display:none">
												<span style="position:relative;">
													<span class="loader"></span>
												</span>
												<span class="val1">Loading</span>
											</span>
									<a href="forget.php" class="forgot-password">Forgot password?</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
			<!-- Modernizr /-->
			<script src="js/jquery-1.10.2.js"></script>
			<script src="js/bootstrap.js"></script>
		
	</body>
	</body>
</html>