<?php 
include_once('common.php');
page_protect();
if(!isset($_SESSION['user_id']))
{
	logout();
}
$error = array();
$transactionList = array();
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
		$transactionList = $client->getTransactionList($user_session);
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
		<!--Import materialize.css-->
		<link href="css/main.css" rel="stylesheet" type="text/css">
		<link href="css/mystyle.css" rel="stylesheet" type="text/css">
		<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
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
					<nav style="position:fixed!important;z-index:999;">
						<a href="#" data-activates="nav-mobile" class="button-collapse top-nav full waves-effect waves-light">
						<i class="material-icons">menu</i></a>
						<div class="nav-wrapper">
							<ul class="left">
								<li class="ms-logo-set">
									<a href="#" class="brand-logo">
										<img src="image/logofinal2.png" style="height:40px;">
									</a>
								</li>
							</ul>
							<ul class="right hide-on-med-and-down">
								<li class="b1"> <a href="#"><span style="font-size:15px"></span>
								<span id="lblliveusd" style="padding-left:2px;font-size:15px;"></span></a></li>
								<li id="topmenu">
								</li><li>
									<a id="logout" href="logout.php">
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
							<li id="ms1"><a href="index.php" class="collapsible-header"><!--<i class="zmdi zmdi-home zmdi-hc-fw iconhome"></i>-->Home</a></li>
							<li id="ms2" class="active"><a href="transactions.php" style="color: rgb(15, 150, 146);" class="collapsible-header"><!--<i class="zmdi zmdi-swap-vertical icontransaction" style="font-size:30px;"></i>-->Transactions</a></li>
							<li id="ms3"><a href="myaddress.php" class="collapsible-header"><!--<i class="fa fa-btc iconaddress" aria-hidden="true" style=""></i>-->My Addresses</a></li>
							<li id="ms4" style="position:relative;">
								<a href="securitycenter.php" class="collapsible-header">
									<!--<i>
										<img src="image/smalllock.png" id="SecurityCenterimg">
									</i>-->Security Center
									<span style="position: absolute; width: 20px;">
										<!--<i class="fa fa-circle fa-stack-2x signsbg" style="color: rgb(255, 171, 0);"></i>
										<i class="fa fa-stack-1x fa-inverse signs fa-exclamation"></i>-->
									</span>
								</a>
							</li>
							<li id="ms5"><a href="contactus.php" class="collapsible-header"><!--<i class="zmdi zmdi-help-outline iconFAQ" style=""></i>-->Contact Us</a></li>
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
			<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
			<style>

            /*.icontransaction{
        color:#ffab00;
        }*/
            #ui-datepicker-div{
                    font: 122%/1.5 Verdana, sans-serif;
            }
            .ui-datepicker-month{
                display:inline-block;
                    height: 2.5em;
            }
            .ui-datepicker-year{
                display:inline-block;
                    height: 2.5em;
            }
            .pendingwm {
                display:none;
                float:right;
                line-height:55px;
                font-size:14px;
                color:rgba(181, 181, 181, 0.34);
                font-weight:bold;
                font-style:italic;
            }

            .icontransaction {
                color: #0f9692;
            }

            .highlight {
                background-color: yellow;
            }

            /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
            pre {
                margin: 0;
            }

            .mobinfocontainer {
                display: none;
            }
            .downloadoption{
                    color: #0f9692;
        line-height: 65px;
        margin-top: 7px;
        font-size: 25px;
            }
            .tx1 {
                display: none;
            }

            .pval1 {
                margin: 0px !important;
                text-align: right;
                font-size: 13px !important;
                line-height: 17px !important;
            }

            .pval2 {
                padding: 0px !important;
                text-align: right !important;
                font-size: 13px !important;
                line-height: 17px !important;
            }

            .li2 {
                color: gray;
                background-color: #ececec;
            }

            .accordion {
                max-width: 100%;
                margin: 0 auto 100px;
                border-top: 1px solid #d9e5e8;
            }

                .accordion li {
                    border-bottom: 1px solid #d9e5e8;
                    position: relative;
                    padding: 10px 0;
                }

                    .accordion li p {
                        display: none;
                        padding: 5px 0px 0px;
                        color: #6b97a4;
                    }
    .ui-datepicker td span, .ui-datepicker td a {
        display: block;
        padding: .2em;
        text-align: center!important;
        text-decoration: none;
    }
                .accordion a {
                    width: 100%;
                    display: block;
                    cursor: pointer;
                    font-weight: 600;
                    line-height: 3;
                    font-size: 14px;
                    font-size: 0.875rem;
                    text-indent: 15px;
                    user-select: none;
                }

                    .accordion a:after {
                        width: 12px;
                        height: 12px;
                        border-right: 1px solid #4a6e78;
                        border-bottom: 1px solid #4a6e78;
                        position: absolute;
                        left: 10px;
                        content: " ";
                        top: 30px;
                        transform: rotate(-45deg);
                        -webkit-transition: all 0.2s ease-in-out;
                        -moz-transition: all 0.2s ease-in-out;
                        transition: all 0.2s ease-in-out;
                    }

                .accordion p {
                    font-size: 13px;
                    font-size: 0.8125rem;
                    line-height: 2;
                    padding: 10px;
                }

            a.active:after {
                transform: rotate(45deg);
                -webkit-transition: all 0.2s ease-in-out;
                -moz-transition: all 0.2s ease-in-out;
                transition: all 0.2s ease-in-out;
            }

            .txaddress {
                font-size: 20px;
                margin-top: 18px;
            }

            .bt1 {
                margin-top: 10px;
                width: 100%;
            }

            .panelupdate {
                width: 35%;
            }

            .accordion li:hover {
                background-color: rgb(228, 243, 243);
            }

            .topmg {
                margin-top: 15em;
            }

            #ace {
                padding-top: 20px !important;
            }

            .tabmenu {
                background-color: rgba(15, 150, 146, 0.11);
            }

            .srh1 {
                background-color: white !important;
                box-shadow: none !important;
                border: 1px solid #d9e5e8 !important;
                border-bottom: 1px solid #d9e5e8 !important;
                padding-right: 32px !important;
                font-size: 14px !important;
            }
            /*.srh1:focus:not([readonly]){
            box-shadow:none!important;
            border: 1px solid #d9e5e8!important;
            border-bottom: 1px solid #d9e5e8!important;
        }*/
            #Selectmenu {
                font-size: 13px !important;
                border: 1px solid #d6d6d6 !important;
                margin-bottom: 0px !important;
                padding: 0px 10px;
            }

            #Selectul {
                background: white;
                -webkit-box-shadow: 0px 1px 2px 0px rgba(158,158,158,1);
                -moz-box-shadow: 0px 1px 2px 0px rgba(158,158,158,1);
                box-shadow: 0px 1px 1px 0px rgba(158,158,158,1);
            }

                #Selectul li a span {
                    display: block;
                    cursor: pointer;
                    padding: 10px 10px;
                    font-size: 13px;
                    border-bottom: 1px solid #e3e3e3;
                }

            #mobbtn1 {
                display: none;
            }

            #statuscontainer {
                display: inline-block;
                vertical-align: middle;
                min-height: 55px;
            }

            .mn12 {
                width: 100px;
                border-radius: 20px;
                font-size: 11px;
                margin-top: 10px;
                margin-bottom: 10px;
                float: right;
                background: #0f9692 !important;
            }

            @media only screen and (min-width:767px) and (max-width: 1024px) {
                .txaddress {
                    font-size: 18px;
                    margin-top: 18px;
                }

                .mobinfocontainer {
                    display: block;
                }

                .bt1 {
                    margin-top: 10px;
                    width: 100%;
                }

                .cl2 {
                    width: 56%;
                }

                .cl3 {
                    width: 10%;
                }

                .cl4 {
                    width: 20%;
                }

                .cl1 {
                    margin-left: 30px;
                }

                .panelupdate {
                    width: 50%;
                }

                .tx2 {
                    display: none;
                }

                .tx1 {
                    display: block;
                    display: inline-block;
                    float: left;
                    padding-left: 20px;
                    padding-top: 3px;
                }

                .bt1 {
                    margin-top: 10px;
                    width: 40%;
                    float: left;
                }

                .bt2 {
                    margin-top: 15px;
                    width: 20%;
                    font-size: 13px !important;
                    float: right;
                }

                #mobbtn1 {
                    display: block;
                }

                #status {
                    padding-top: 16%;
                    padding-left: 20px;
                }

                .cl1 {
                    margin-left: 30px;
                }

                .panelupdate {
                    width: 90%;
                }

                #statuscontainer {
                    display: inline-block;
                    vertical-align: middle;
                    min-height: 55px;
                    float: left;
                }

                .mobinfo {
                    display: block;
                    float: left;
                }

                    .mobinfo i {
                        margin-top: 0px !important;
                    }

                .pcinfo {
                    display: none !important;
                }

                .m23 {
                    display: none;
                    min-height: 0px !important;
                }

                .m24 {
                    display: none;
                }

                .m25 {
                    padding: 0px !important;
                }

                .m27 {
                    min-height: 0px !important;
                }

                .m28 {
                    min-height: 0px !important;
                }
            }

            @media only screen and (min-width:701px) and (max-width: 768px) {
                .cl4 {
                    width: 20%;
                }

                .mobinfocontainer {
                    display: block;
                }

                .cl2 {
                    width: 55%;
                }

                .txaddress {
                    font-size: 18px;
                    margin-top: 18px;
                }

                .bt1 {
                    margin-top: 10px;
                    width: 100%;
                }

                .cl1 {
                    margin-left: 30px;
                }

                .panelupdate {
                    width: 50%;
                }

                .bt1 {
                    margin-top: 10px;
                    width: 40%;
                    float: left;
                }

                .bt2 {
                    margin-top: 15px;
                    width: 30%;
                    font-size: 13px !important;
                    float: right;
                }

                #mobbtn1 {
                    display: block;
                }

                #status {
                    padding-top: 16%;
                    padding-left: 20px;
                }

                .cl1 {
                    margin-left: 30px;
                }

                .panelupdate {
                    width: 90%;
                }

                #statuscontainer {
                    display: inline-block;
                    vertical-align: middle;
                    min-height: 55px;
                    float: left;
                }

                .mobinfo {
                    display: block;
                    float: left;
                }

                    .mobinfo i {
                        margin-top: 0px !important;
                    }

                .pcinfo {
                    display: none !important;
                }

                .m23 {
                    display: none;
                    min-height: 0px !important;
                }

                .m24 {
                    display: none;
                }

                .m25 {
                    padding: 0px !important;
                }

                .m27 {
                    min-height: 0px !important;
                }
            }

            @media only screen and (min-width:481px) and (max-width: 700px) {
                .cl4 {
                    width: 100%;
                }

                .mobinfocontainer {
                    display: block;
                }

                .cl2 {
                    width: 60%;
                }

                .txaddress {
                    font-size: 17px;
                    margin-top: 18px;
                }

                .bt1 {
                    margin-top: 10px;
                    width: 40%;
                    float: left;
                }

                .cl1 {
                    margin-left: 30px;
                }

                .cl2 {
                    width: 60%;
                }

                .panelupdate {
                    width: 90%;
                }

                .bt1 {
                    margin-top: 10px;
                    width: 40%;
                    float: left;
                }

                .bt2 {
                    margin-top: 15px;
                    width: 30%;
                    font-size: 13px !important;
                    float: right;
                }

                #mobbtn1 {
                    display: block;
                }

                #status {
                    padding-top: 16%;
                    padding-left: 20px;
                }

                .cl1 {
                    margin-left: 30px;
                }

                .panelupdate {
                    width: 90%;
                }

                #statuscontainer {
                    display: inline-block;
                    vertical-align: middle;
                    min-height: 55px;
                    float: left;
                }

                .mobinfo {
                    display: block;
                    float: left;
                }

                    .mobinfo i {
                        margin-top: 0px !important;
                    }

                .pcinfo {
                    display: none !important;
                }

                .m23 {
                    display: none;
                    min-height: 0px !important;
                }

                .m24 {
                    display: none;
                }

                .m25 {
                    padding: 0px !important;
                }

                .m27 {
                    min-height: 0px !important;
                }
            }

            @media only screen and (min-width:320px) and (max-width: 480px) {
                .cl4 {
                    width: 100%;
                }

                .mobinfocontainer {
                    display: block;
                }

                .cl2 {
                    width: 60%;
                }

                .txaddress {
                    font-size: 14px;
                    word-break: break-word;
                    margin-top: 18px;
                }

                .bt1 {
                    margin-top: 10px;
                    width: 40%;
                    float: left;
                }

                .bt2 {
                    margin-top: 15px;
                    width: 50%;
                    font-size: 13px !important;
                    float: right;
                }

                #mobbtn1 {
                    display: block;
                }

                #status {
                    padding-top: 16%;
                    padding-left: 20px;
                }

                .cl1 {
                    margin-left: 30px;
                }

                .panelupdate {
                    width: 90%;
                }

                #statuscontainer {
                    display: inline-block;
                    vertical-align: middle;
                    min-height: 55px;
                    float: left;
                }

                .mobinfo {
                    display: block;
                    float: left;
                }

                    .mobinfo i {
                        margin-top: 0px !important;
                    }

                .pcinfo {
                    display: none !important;
                }

                .m23 {
                    display: none;
                    min-height: 0px !important;
                }

                .m24 {
                    display: none;
                }

                .m25 {
                    padding: 0px !important;
                }

                .m27 {
                    min-height: 0px !important;
                }
            }
</style>

			<form action="sent.php" method="post">
				<main id="content" class="topmg transactiontop main2-content">
					<div id="page-content">
						<div class="row" style="margin-bottom:0px;">
							<div class="col l12 m12 s12 tabmenu">
								<div class="above-prod-table pctrns">
									<div class="col s7 left prod-title-div no-padding" id="ace">
										<a href="transactions.php"><span class="btn btn-default" style="background-color: transparent!important;color: gray;font-size: 14px;border: 0px solid #ececec;box-shadow:none!important;padding: 0px 10px;font-family:'Open Sans', sans-serif;" id="Type_All">All</span></a>
										<a href="sent.php"><span class="btn btn-default" style="background-color: transparent!important;color: #e08081;font-size: 14px;border: 0px solid #ececec;box-shadow:none!important;padding: 0px 10px;font-family:'Open Sans', sans-serif;font-weight:bold;text-decoration:underline" id="Type_Sent">Sent</span><a>
										<a href="recieved.php"><span class="btn btn-default" style="background-color: transparent!important;color: #86b45a;font-size: 14px;border: 0px solid #ececec;box-shadow:none!important;padding: 0px 10px;font-family:'Open Sans', sans-serif;" id="Type_Receive">Received</span></a>
										
									</div>
								<!--	<div class="col s1">
										<a href="#" style="float: right;" id="OpenDownloadModal"><i class="zmdi zmdi-download downloadoption"></i></a>
									</div>
									<div class="input-field col s4">
										<input class="validate srh1" placeholder="Search" style="position:relative;" id="search" type="text">
										<i class="fa fa-search active" aria-hidden="true" style="position:absolute;right: 25px;top: 13px;font-size: 16px;"></i>
									</div>
									-->
								</div>
								<div class="above-prod-table mobtrns">
									<div class="col m12 s12">
										<a class="btn-floating btn waves-effect waves-light margin-bottom-10 mn12">Menu</a>
									</div>
									<div class="col m12 s12 no18" style="display: none;">
										<div class="input-field">
											<ul id="Selectul" style="display: none;">
												<li>
													<a href="transactions.php"><span id="Type_All" style="display:block;">All</span></a>
													<a href="sent.php"><span id="Type_Sent" style="display:block;"><strong style="font-weight:boldder">Sent</strong></span></a>
													<a href="recieved.php"><span id="Type_Receive" style="display:block;">Received</span></a>
												</li>
											</ul>

										</div>
										<div class="input-field">
											<input class="validate srh1" placeholder="Search" style="position:relative;" id="searchsmall" type="text">
											<i class="fa fa-search active" aria-hidden="true" style="position:absolute;right: 15px;top: 13px;font-size: 16px;"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<table class="table2excel" data-tablename="Test Table 1">
								<thead>
									<tr>                      
										<td><strong>Date</strong></td>
										<td><strong>Address</strong></td>
										<td><strong>Type</strong></td>
										<td><strong>Amount</strong></td>
										<td><strong>confirmations</strong></td>
										<td colspan="3"><strong>tx</strong></td>
									</tr>
								</thead>
								<tbody>
<?php
								$bold_txxs = "";
							   if(count($transactionList)>0)
								{
								   foreach($transactionList as $transaction) 
								   {
										if($transaction['category']=="send")
										{
											$tx_type = '<b style="color: #FF0000;">Sent</b>'; 
											echo '<tr>
											   <td>'.date('n/j/Y h:i a',$transaction['time']).'</td>
											   <td>'.$transaction['address'].'</td>
											   <td>'.$tx_type.'</td>
											   <td>'.abs($transaction['amount']).'</td>
											   <td>'.$transaction['confirmations'].'</td>
											   <td colspan=\"3\"><a href="' . $blockchain_url,  $transaction['txid'] . '" target="_blank">Info</a></td>
											</tr>';
										}
								   }
								}
								else if((count($transactionList)== 0))
								{
									echo "<tr><td colspan=\"3\">There is no Transaction exists</td></tr>";
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