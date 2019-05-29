<?php 
include_once('common.php');
page_protect();
if(!isset($_SESSION['user_id']))
{
	logout();
}
$error = array();
$addressList = array();
$new_address = "";
$user_session = $_SESSION['user_session'];
$user_current_balance = 0;
if(isset($_GET['nad']))
{
	$new_address = $_GET['nad'];
}
$client = "";
if(_LIVE_)
{
	$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
	if(isset($client))
	{
		//echo "<pre> dd </br>";var_dump($_SESSION);echo "</br> ddd <pre>";
		$addressList = $client->getAddressList($user_session);
		$user_current_balance = $client->getBalance($user_session) - $fee;
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Wallets | <?php echo $coin_fullname;?>(<?php echo $coin_short;?>)</title>
		<meta name="description" content="<?php echo $coin_fullname;?>(<?php echo $coin_short;?>)">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="./img/favicon.png" rel="shortcut icon" type="image/x-icon">
		<link href="css/material-design-iconic-font.css" rel="stylesheet" type="text/css">
		<link href="css/icon.css" rel="stylesheet" type="text/css">
		<link href="css/font-awesome.css" rel="stylesheet" type="text/css">

		<link href="css/main.css" rel="stylesheet" type="text/css">
		<link href="css/mystyle.css" rel="stylesheet" type="text/css">

		<link href="css/jquery.css" rel="stylesheet" type="text/css">
		<link href="css/sitemaster.css" rel="stylesheet" type="text/css">
		
		<script type="text/javascript" async="" src="files/atrk.js"></script>
		<script src="js/cbgapi.loaded_0" async=""></script>
		<script src="js/llqrcode.js"></script>
		<script src="js/plusone.js" gapi_processed="true"></script>
		<script src="js/socket.js"></script>
		<script src="js/webqr.js"></script>    
	</head>
	<body>
		<div class="wrapper vertical-sidebar" id="full-page">
			<header id="header">
				<div class="navbar">
					<nav style="position:fixed!important;z-index:999; background-color: #00aeeb">
						<a href="#" data-activates="nav-mobile" class="button-collapse top-nav full waves-effect waves-light">
						<i class="material-icons">menu</i></a>
						<div class="nav-wrapper">
							<ul class="left">
								<li class="ms-logo-set">
									<a href="#" class="brand-logo">
										<img src="image/logofinal2.png" style="height:65px; width:100px;top:-2px;">
									</a>
								</li>
							</ul>
							<ul class="right hide-on-med-and-down">
								<li class="b1"> <a href="#"><span style="font-size:15px"></span>
								<span id="lblliveusd" style="padding-left:2px;font-size:15px;"></span></a></li>
								<li id="topmenu">
								</li><li>
									<a id="logout" href="logout.php">Logout
										<img src="image/sign-out.png" style="width: 30px; vertical-align: middle;">
									</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</header>
			<aside class="sidebar-left">
				<ul class="side-nav fixed clearfix left" id="nav-mobile" style="transform: translateX(0px);">
					<li>
						<ul class="vm1 collapsible" data-collapsible="accordion" style="margin-top: 30px;">
							<li id="ms1"><a href="index.php" class="collapsible-header">Home</a></li>
							<li id="ms2"><a href="transactions.php" class="collapsible-header">Transactions</a></li>
							<li id="ms3" class="active"><a style="color:#00aeeb;" href="myaddress.php" class="collapsible-header">My Addresses</a></li>
							<li id="ms4"><a href="securitycenter.php" class="collapsible-header">Security Center</a>
							</li>
							<li id="ms5">
								<a href="contactus.php" class="collapsible-header">Contact Us</a>
							</li>
<?php 
if($_SESSION['user_admin'] == 1)
{
?>
	<li id="ms6"><a href="admin_user.php" class="collapsible-header"><!--<i class="zmdi zmdi-help-outline iconFAQ" style=""></i>-->User list</a></li>
<?php

}
?>	
							
						</ul>
					</li>
				</ul>
			</aside>
			<main id="content" style="position:fixed;width:100%;z-index:990;">
				<div id="page-content">
					<div class="row section-header">
						<div class="col l12" id="topvalues">
							<div style="overflow:hidden;cursor:pointer;"><h5 id="lblbtcbalancesmall" class="topbtc"><?php echo $user_current_balance." " . $coin_short;?></h5></div>
							<div style="overflow:hidden;cursor:pointer;"><h6 id="lblusdbalancesmall" class="topusd"></h6></div>
							<div style="overflow:hidden;cursor:pointer;"><h5 id="lblusdbalance2small" class="topbtc" style="display: none;"></h5></div>
							<div style="overflow:hidden;cursor:pointer;"><h6 id="lblbtcbalance2small" class="topusd" style="display: none;"><?php echo $user_current_balance." " . $coin_short;?></h6></div>
						</div>
						<div class="col m6 l6" id="sidetopbuttons">
							<a href="send.php" id="btnsend" class="btn btn-default"><!--<i class="zmdi zmdi-long-arrow-up zmdi-hc-fw"></i>-->Send</a>
							<a href="recievecoin.php" id="btnreceived" class="btn btn-default"><!--<i class="zmdi zmdi-long-arrow-down zmdi-hc-fw"></i>-->Receive</a>

						</div>
						<div class="col m6 l6" id="sidetopvalues">
							<div style="overflow:hidden;cursor:pointer;"><h5 id="lblbtcbalance" class="topbtc"><?php echo $user_current_balance." " . $coin_short;?></h5></div>
							<div style="overflow:hidden;cursor:pointer;"><h6 id="lblusdbalance" class="topusd"></h6></div>
							<div style="overflow:hidden;cursor:pointer;"><h5 id="lblusdbalance2" class="topbtc" style="display: none;"></h5></div>
							<div style="overflow:hidden;cursor:pointer;"><h6 id="lblbtcbalance2" class="topusd" style="display: none;"><?php echo $user_current_balance." " . $coin_short;?></h6></div>
						</div>
					</div>
				</div>
			</main>
			<div>
				<form action="myaddress.php" method="post">
					<main id="content" class="topmg main2-content" style="margin-bottom:15em;">
						<div id="page-content">
							<div class="row content-container general">
								<div class="vrtbl-responsive">
									<table class="vrtbl vrtbl-striped" id="blocks">
										<thead>
											<tr>
												<th>Addresses</th>
												<th>Label</th>
												<th style="float:right;"><a href="genratenewaddress.php" class="btn btn-default" style="background-color:#004a7c;">Create New Address</a></th>
											</tr>
										</thead>
										<tbody>
<?php								
									if(!empty($new_address))
									{
										echo "<tr><td> New Address :- <strong>".$new_address."</strong></td>"
?>											<td colspan="2"><a href="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $new_address?>">
												<img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $new_address?>" 
												alt="QR Code" style="width:60px;height:60px;border:0;"></td><tr>
<?php								}
									if(count($addressList)>0)
									{
										foreach ($addressList as $address)
										{	
											echo "<tr><td>".$address."</td>";
?>
											<td colspan="2"><a href="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $address?>">
												<img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $address?>" 
												alt="QR Code" style="width:180px;height:180px;border:0;"></td><tr>
<?php
										}
									}
									else if((count($addressList)== 0) && empty($new_address))
									{
										echo "<tr><td colspan=\"3\">There is no Address exists</td></tr>";
									}
?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</main>
				</form>
			</div>
		</div>
		<link href="css/alertify.css" rel="stylesheet">
		<script src="js/clipboard.js" gapi_processed="true"></script>
		<script src="js/jquery-2.js" type="text/javascript"></script>
		<script src="js/materialize.js" type="text/javascript"></script>
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/mara_002.js" type="text/javascript"></script>
		<script src="js/mara.js" type="text/javascript"></script>
		<script src="js/amcharts.js" type="text/javascript"></script>
		<script src="js/serial.js" type="text/javascript"></script>
		<script src="js/light.js" type="text/javascript"></script>
		<script src="js/jquery_002.js" type="text/javascript"></script>
		<script src="js/highcharts.js" type="text/javascript"></script>
		<link href="css/keyboard.css" rel="stylesheet">
		<link href="css/jkeyboard.css" rel="stylesheet">
		<script src="js/jkeyboard.js"></script>
		<script src="js/jquery-qrcode-0.js"></script>
	</body>
</html>