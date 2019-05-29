<?php
include_once('common.php');
page_protect();
if(isset($_SESSION['user_id']))
{
	header("Location:myaddress.php");
}
?>
<!DOCTYPE html>
<!-- saved from url=(0028)https://www.operacoinwallet.com/ -->
<html style="" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths ">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $coin_fullname;?>(<?php echo $coin_short;?>)</title>
	<meta name="description" content="<?php echo $coin_fullname;?>(<?php echo $coin_short;?>)">
		

    <link href="./img/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="./css/css" rel="stylesheet" type="text/css">
    <script type="text/javascript" async="" src="./js/atrk.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <link href="./css/sitestyle.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    
</head>

<body data-gr-c-s-loaded="true">
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="https://www.operacoinwallet.com/"><img src="./img/logofinal2.png" style="width:85%;">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">

                <ul class="nav navbar-nav navbar-right">
                   
                    <li><a href="index.php">Home</a></li>                   
					<li><a href="http://operacoinwallet.com:3001" target="_blank">Block Explorer</a></li>
					<li><a href="login.php">Sign In</a></li>
					<li><a href="signup.php">Sign Up</a></li>

                </ul>
            </div>

        </div>
    </div>

    <div style="" class="MyMainDiv">
        
        <div style="position: relative;z-index: 1;overflow: hidden;">
            <div class="container home_container">
                <div class="typeing_text">
                    <div class="col-md-6 col-xs-12">
                        <div class="video_chat_intro">
                            <h1>

                        <div class="element"></div> 
                        
                        <!--<div class="newheading">for your customers</div>-->
                    </h1>
                            <ul class="points">
                                <li>200% increase in sales</li>
                                <li>Cheapest way to get paid for online business</li>
                                <li>No downloads required</li>
                                <li><span>Most Secure OperaCoin Wallet</span>
                                </li>
                            </ul>
                            <!--<form class="register header_register" method="post">
                                <input type="email" id="topemailid" name="email" placeholder="Enter your email">

                                <span class="mybtn" id="topsignup">Start Free Trial</span>
                                <br>
                                <label class="error_label"></label>
                            </form>-->
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="map text-center">
                            <img src="./img/tagoveRoundImg.png" alt="live chat software" style="width:100%;">

                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <section class="toppoints">
            <div class="container">
                <div class="row">
                    <div class="header2">
                        <div>
                            <h2 style="font-weight:bold;font-size: 35px;">The most versatile and secure wallet for all your coins.</h2>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="text-center">
                            <img src="./img/multicurrency.png" style="width: 100px;">
                            <h3>Multi-currency</h3>
                            <p>Conveniently manage your operacoin, dogecoin, and litecoin in one place.</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="text-center">
                            <img src="./img/instanttransact.png" style="width: 100px;">
                            <h3>Transact instantly</h3>
                            <p>With our Green Addresses there's no wait to use your coins.</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="text-center">
                            <img src="./img/securewallet.png" style="width: 100px;">
                            <h3>Own your money</h3>
                            <p>You sign all of your transactions — no one else can transact for you.</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="text-center">
                            <img src="./img/rocket.png" style="width: 100px;">
                            <h3>Fast &amp; stable</h3>
                            <p>99.99%+ uptime and an average response time of only 80 ms.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div id="operacoin-accept-business" style="margin-top: 0px;">
            <div class="container default-p">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-5">
                        <div class="img-container">
                            <img src="./img/accepthere.png" alt="Operacoin Payment Processing">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-7">
                        <h2 class="section-title">Accept OperaCoin at your business</h2>
                        <ul class="keypoints-list">
                            <li>
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="sprite-icon icon-1"></div>
                                    </div>
                                    <div class="col-xs-10 keypoint-title">
                                        <p>Accept OperaCoins online and at brick and mortar stores</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="sprite-icon icon-2"></div>
                                    </div>
                                    <div class="col-xs-10 keypoint-title">
                                        <p>Avoid operacoin price risk, receive USD, EUR, GBP or your local currency to your bank account</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="sprite-icon icon-3"></div>
                                    </div>
                                    <div class="col-xs-10 keypoint-title">
                                        <p>Integrate easily through API</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div id="operacoin-mobile-wallet">
            <div class="container default-p">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-7">
                        <h2 class="section-title" style="color:#fff;margin-top: 170px;">Secure OperaCoin Wallet</h2>
                        <ul class="keypoints-list" style="color:#fff;">
                            <li>
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="sprite-icon icon-1"></div>
                                    </div>
                                    <div class="col-xs-10 keypoint-title">
                                        <p>Manage OperaCoins on the go</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="sprite-icon icon-2"></div>
                                    </div>
                                    <div class="col-xs-10 keypoint-title">
                                        <p>Easy and secure way to send, receive, buy and sell OperaCoins anytime, anywhere</p>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-5">
                        <div class="img-container center">
                            <img src="./img/landing-wallet.png" alt="Mobile Operacoin Wallet" class="apple">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div id="operacoin-debit-card">
            <div class="container default-p">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-5">
                        <div class="img-container center">
                            <img src="./img/card.png" alt="Operacoin Debit Card">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-7">
                        <h2 class="section-title">OperaCoin Debit Card</h2>
                        <ul class="keypoints-list">
                            <li>
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="sprite-icon icon-1"></div>
                                    </div>
                                    <div class="col-xs-10 keypoint-title">
                                        <p>Use it at 30+ million ATMs and 25+ million shops worldwide</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="sprite-icon icon-2"></div>
                                    </div>
                                    <div class="col-xs-10 keypoint-title">
                                        <p>Spend OperaCoins anywhere within a minute</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="sprite-icon icon-3"></div>
                                    </div>
                                    <div class="col-xs-10 keypoint-title">
                                        <p>High deposit and withdrawal limit</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="buttons-row colapse-content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a class="btn btn-primary big-font" role="button" id="GetCard" href="javascript:void(0)" style="color: #fff;">Coming Soon</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ComingSoon" role="dialog">
            <div class="modal-dialog" style="width: 500px; height: 530px;    margin-top: 5%;">
                <!-- Modal content-->
                <div class="modal-content" style="height: 100%; width: 100%; border-radius: 100%;    background: #084c4a;border: 20px solid #ffffff; border-style: double;">

                    <div class="modal-body">
                        <h1 class="comingsoontext">
                    Coming Soon!
                </h1>
                    </div>

                </div>

            </div>
        </div>

        <link href="./css/alertify.css" rel="stylesheet">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="./js/alertify.js" type="text/javascript"></script>

        <script type="text/javascript">
            function validateEmail(emailField) {
                var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                return expr.test(emailField);
            }
        </script>
        <script>
            $(document).on('click', '#defaultsignup', function() {

                var email = $('#defaultemailid').val();
                if (email == '' || email == undefined || email == null) {
                    $('#defaultemailid').attr('style', 'border:3px solid #dc1719;');
                    $('#defaultemailid').focus();
                    return;
                }

                if (!validateEmail(email)) {
                    alertify.error('Please Enter valid Email ID');
                    return;
                }

                var url = "/home/signup?Email=" + email;
                $(window).attr("location", url);
            })
        </script>
        <script>
            $(document).on('click', '#topsignup', function() {

                var email = $('#topemailid').val();
                if (email == '' || email == undefined || email == null) {
                    $('#topemailid').attr('style', 'border:3px solid #dc1719;');
                    $('#topemailid').focus();
                    return;
                }

                if (!validateEmail(email)) {
                    alertify.error('Please Enter valid Email ID');
                    return;
                }

                var url = "/home/signup?Email=" + email;
                $(window).attr("location", url);
            })
        </script>
        <script src="https://cdn.rawgit.com/mattboldt/typed.js/master/js/typed.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Typed.new('.element', {
                    strings: ["Worldwide payments", "Low processing fees", "Instant order approval", "Peer-to-Peer transactions"],
                    typeSpeed: 20,
                    shuffle: true,
                    loop: true,
                    backDelay: 3000,
                });
            });
        </script>
    </div>

    <div style="/*background: #d81a19;*/background:#2f2f2f;" class="minefooter">
        <div class="footer">
            <div class="row-fluid" style="margin-bottom:0px;">
                <div class="col -md-12">
                    <div class="social">
                        <ul class="social-link tt-animate ltr">
                            <li><a href="https://www.facebook.com/operacoinnetwork/" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="https://twitter.com/opera_coin" target="_blank"><i class="fa fa-twitter"></i></a>
                            </li>

                        </ul>
                        <p class="footerp">2017 OperaCoin Wallet All RIGHTS RESERVED.</p>
                        <p class="footerp">
                            21 CORNHILL BLDG.BELIZE CITY, BELIZE<strong>&nbsp;|&nbsp; Company No.: 152, 193 </strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/jquery-1.10.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

    <script>
        //function chksessionexpiredornt(chkhour, chkmin, chksec) {
        function chksessionexpiredornt(timerStart) {

            var timerStartnow = new Date();

            //var remaininghour  = timerStartnow.getHours() - chkhour ;
            //var remainingmin  =  timerStartnow.getMinutes() - chkmin ;
            //var remainingsec  =  timerStartnow.getSeconds() - chksec ;

            var diffMs = (timerStartnow - timerStart);
            var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000);


            //if (remainingmin >= 6)
            if (diffMins >= 6) {
                var url = "/Home/signin/";
                $(window).attr("location", url);
            }
        }
    </script>
    <script type="text/javascript">
        var timerStart = new Date();

        //timerStart.getHours();
        //timerStart.getMinutes();
        //timerStart.getSeconds();

        var url = window.location.toString();
        var ssd = setInterval(function() {
            // chksessionexpiredornt( timerStart.getHours(),  timerStart.getMinutes(),timerStart.getSeconds(),timerStart);
            if (url.indexOf('/Home/signin') > 0) {
                chksessionexpiredornt(timerStart);
            }
            if (url.indexOf('/Home/signup') > 0) {
                chksessionexpiredornt(timerStart);
            }
            if (url.indexOf('/Home/help') > 0) {
                chksessionexpiredornt(timerStart);
            }
            if (url.indexOf('/Home/recoverfund') > 0) {
                chksessionexpiredornt(timerStart);
            }
            if (url.indexOf('/Home/resetpassword') > 0) {
                chksessionexpiredornt(timerStart);
            }
            if (url.indexOf('/Home/disable2fa') > 0) {
                chksessionexpiredornt(timerStart);
            }

        }, 30000);
    </script>

    <script>
        $window = $(window);
        $window.scroll(function() {
            $scroll_position = $window.scrollTop();
            if ($scroll_position > 1035) { // if body is scrolled down by 890 pixels
                $('#secondary-nav').addClass('sticky');

                $('#operacoin-accept-business').css('margin-top', '110px');

                // to get rid of jerk
                header_height = $('.your-header').innerHeight();
                $('body').css('padding-top', header_height);
            } else {
                //$('body').css('padding-top', '0');
                //$('.your-header').removeClass('sticky');
                $('#secondary-nav').removeClass('sticky');
                $('#operacoin-accept-business').css('margin-top', '0px');
            }
        });
    </script>
    <script>
        $('a[href*="#"]:not([href="#"])').click(function() {

            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);

                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 170
                    }, 500);
                    return false;
                }
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".fw-cc1").css("display", "none");
            $(".fw-cct1").click(function() {
                $(".fw-cc1").slideToggle();
            });
            $(".fw-cc").css("display", "none");
            $(".fw-cct").click(function() {
                $(".fw-cc").slideToggle();
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#GetCard").click(function() {
                $('#ComingSoon').modal('show');
            });

            
        });
    </script>

</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span>

</html>