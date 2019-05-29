<?php 
include_once('common.php');
$allowed = array(".", "-", "_");
$email_id = "";
$password = "";
$confirmpassword = "";
$spendingpassword = "";
$confirmspendingpassword = "";

$error = array();
if(isset($_POST['btnsignup']))
{
//	var_dump($_POST);
	$email_id = $_POST['txtEmailID'];
	$password = $_POST['signuppassword'];
	$confirmpassword = $_POST['confirmpassword'];
	$spendingpassword = $_POST['spendingpassword'];
	$confirmspendingpassword = $_POST['confirmspendingpassword'];

	if (empty($email_id))
	{
		$error['emailError'] = "Please Provide valid email id";
	}	
	if(empty($password))
	{
		$error['passwordError'] = "Please Provide valid Password";
	}
	if(empty($confirmpassword))
	{
		$error['confirmpasswordError'] = "Please Provide valid Password";
	}
	else if($confirmpassword != $password)
	{
		$error['confirmpasswordError'] = "Password and Confirm Password Must be same";
	}
	if(empty($spendingpassword))
	{
		$error['spendingpasswordError'] = "Please Provide valid Spending Password";
	}
	if(empty($confirmspendingpassword))
	{
		$error['confirmspendingpasswordError'] = "Please Provide valid Spending Password";
	}
	else if($confirmspendingpassword != $spendingpassword)
	{
		$error['confirmpasswordError'] = "Spending Password and Confirm Password Must be same";
	}
	
	if (!isEmail($email_id))
	{
		$error['emailError'] = "Please Provide valid email id";
	}
	
	$email_id = $mysqli->real_escape_string(strip_tags($email_id));
	$password_value = hash('sha256',addslashes(strip_tags($password)));
	$qstring = "select coalesce(id,0) as id
				from users WHERE encrypt_username = '" . hash('sha256',$email_id) . "'";
	
	$result	= $mysqli->query($qstring);
	$user = $result->fetch_assoc();
	//var_dump($user);
	if ($user['id']> 0)
	{
		$error['emailError'] = "User with email id $email_id already exist.";
	}

	if(empty($error))
	{
		$email_id = $mysqli->real_escape_string(strip_tags($email_id));
		$password_value = hash('sha256',addslashes(strip_tags($password)));
		$spendingpassword_value = hash('sha256',addslashes(strip_tags($spendingpassword)));
		
		$qstring = "insert into `users`( `date`, `ip`, `username`, 
		`encrypt_username`, `password`, `transcation_password`, 
		`email`) values (";
		$qstring .= "now(), ";
		$qstring .= "'".$_SERVER['REMOTE_ADDR']."', ";
		$qstring .= "'".$email_id."', ";
		$qstring .= "'".hash('sha256',$email_id)."', ";
		$qstring .= "'".$password_value."', ";
		$qstring .= "'".$spendingpassword_value."', ";
		$qstring .= "'".$email_id."') ";
	//	echo $qstring;
		$result2	= $mysqli->query($qstring);
		if ($result2)
		{
			//	$user2 = $result2->fetch_assoc();
			//var_dump($user);
			//	header("Location:login.php");
			$email_id = "";
			$password = "";
			$confirmpassword = "";
			$spendingpassword = "";
			$confirmspendingpassword = "";
			$error['emailError2'] = "Your Account has successfully register. Please Login to continue";
		}
	}
}		
?>
<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8">
		<meta name="viewport"
			  content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

		<link rel="icon" type="image/png" href="favicon_32x32.png">

		<meta name="description" content="Bitfx - Initial Coin Offering - OpenLedger">
		<title>BFX - CryptoCurrency for commodity, stock, index and forex market</title>
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
		<!--[if IE 9]>
		<script src="js/PIE_IE9.js"></script>
		<![endif]-->
		<!--[if lt IE 9]>
		<script src="js/PIE_IE678.js"></script>
		<![endif]-->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<![endif]-->
		<!-- JavaScript -->
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
						<li class="menuItem"><div class="user-login"><a href="./login.php" target="_blank">LogIn</a>&nbsp; | &nbsp;<a href="#" target="_blank">Register</a></div></li>
						
					</ul>
				</div>
			</div>
		</nav>
		<div class="login" style="background: url(./image/lock-1.jpg); !important">
			<form  method="post" action="signup.php">
				<div id="content">
					<div class="container-fluid">
						<div class="lock-container">
							<h1>Create Account</h1>
							<div class="panel panel-default text-center">
								<img src="image/guy-5.jpg" class="img-circle">
								<div class="panel-body">
									<input id="txtEmailID" name="txtEmailID" class="form-control" style="border:2px solid #e08081;" type="text"
											value="<?php echo $email_id;?>" placeholder="Enter Email">
											<?php if(isset($error['emailError'])) { echo "<br/><span class=\"messageClass\">".$error['emailError']."</span>";  }?>	
											<?php if(isset($error['emailError2'])) { echo "<br/><span class=\"messageClass2\">".$error['emailError2']."</span>";  }?>	
									<div class="row">
										<div class="col-md-6 col-sm-12">
											<input id="signuppassword" name="signuppassword" placeholder="Create Password" autocomplete="off" class="form-control" type="password" value="<?php echo $password;?>">
												<?php if(isset($error['passwordError'])) { echo "<br/><span class=\"messageClass\">".$error['passwordError']."</span>";  }?>	
												<span id="result" style="float:left"></span>
										</div>
										<div class="col-md-6 col-sm-12">
											<input id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" class="form-control" autocomplete="off" type="password" value="<?php echo $confirmpassword;?>">
												<?php if(isset($error['confirmpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['confirmpasswordError']."</span>";  }?>	
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-sm-12">
											<input id="spendingpassword" name="spendingpassword" placeholder="Create Spending Password" class="form-control" autocomplete="off" type="password" value="<?php echo $spendingpassword;?>">
												<?php if(isset($error['spendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['spendingpasswordError']."</span>";  }?>	
												<span id="spendingresult" style="float:left"></span>
										</div>
										<div class="col-md-6 col-sm-12">
											<input id="confirmspendingpassword" name="confirmspendingpassword" placeholder="Confirm Spending Password" class="form-control" autocomplete="off" type="password" value="<?php echo $confirmspendingpassword;?>">
												<?php if(isset($error['confirmspendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['confirmspendingpasswordError']."</span>";  }?>	
										</div>
									</div>
									<input id="agreement_accept" name="agreement" ng-model="fields.acceptedAgreement" 
											required="" class=" ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" type="checkbox">I agree with the <a href="#">Terms & conditions</a><br>
									<input type="submit" class="btn btn-primary" id="btnsignup" name="btnsignup" value="Sign Up"/>
											<span class="button Lockerblue ladda-button" id="btnLoading" style="display:none">
												<span style="position:relative;">
													<span class="loader"></span>
												</span>
												<span class="val1">Loading</span>
											</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
	<script type="text/javascript">

	    function validateEmail(emailField) {
	        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	        return expr.test(emailField);
	    }
		
		function checkStrength(password) 
		{
		    var strength = 0
		    if (password.length < 6) 
			{
		        $('#result').removeClass()
		        $('#result').addClass('short')
		        return 'Weak'
		    }
		    if (password.length > 7) strength += 1
		    // If password contains both lower and uppercase characters, increase strength value.
		    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
		    // If it has numbers and characters, increase strength value.
		    if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
		    // If it has one special character, increase strength value.
		    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
		    // If it has two special characters, increase strength value.
		    if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
		    // Calculated strength value, we can return messages
		    // If value is less than 2
		    if (strength < 2) 
			{
		        $('#result').removeClass()
		        $('#result').addClass('weak')
		        return 'Regular'
		    } 
			else if (strength == 2) 
			{
		        $('#result').removeClass()
		        $('#result').addClass('good')
		        return 'Normal'
		    } 
			else 
			{
		        $('#result').removeClass()
		        $('#result').addClass('strong')
		        return 'Strong'
		    }
		}
	</script>
		</div>
		<div style="background:#2f2f2f;height:15%; display:none" class="minefooter">
			<div class="footer">
				<div class="row-fluid" style="margin-bottom:0px;">
					<div class="col -md-12">
						<div class="social">
							<ul class="social-link tt-animate ltr">
								<li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>

							</ul>
							<p class="footerp">2017 <?php echo $coin_fullname;?> All RIGHTS RESERVED.</p>
							<p class="footerp">
								
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="js/jquery-1.js"></script>
		<script src="js/bootstrap.js"></script>
	</body>
</html>