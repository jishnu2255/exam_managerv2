<?php
include './connection.php';
session_start();
if(isset($_POST['rslt']))
{
    $rslt=$_POST['rslt'];
    $dt=date('Y-m-d');
    $chkexam=mysqli_query($dbcon,"select * from staff_allocation where dt='$dt' and stid like '%$rslt%'");
    if(mysqli_num_rows($chkexam)>0)
    {
        
        $_SESSION['invg']=$rslt;
        header("location:invigilator.php?data=2");
    }
    else{
        header("location:invigilator.php?data=1");
    }
}
if(isset($_POST['sub1']))
{
    $uid=$_POST['uid1'];
    $pas=$_POST['pas'];
    $chk=mysqli_query($dbcon,"select * from user_log where uid='$uid' and pwd='$pas'");
    if(mysqli_num_rows($chk)>0)
    {
        $_SESSION['invg']=$uid;
        header("location:invigilator/");
    }
}
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title><?php echo $title ?></title>
	<!-- meta-tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Soft Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //meta-tags -->
	<link href="template/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="template/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome -->
	<link href="template/css/font-awesome.css" rel="stylesheet">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<script type="text/javascript" src="cam/llqrcode.js"></script>
<script type="text/javascript" src="cam/plusone.js"></script>
<script type="text/javascript" src="cam/webqr.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24451557-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body>
	<!-- header -->
	<div class="header-top">
		<div class="container">
			<div class="bottom_header_left">
				<p>
                                    <b><?php echo $hd ?></b>
				</p>
			</div>
			<div class="bottom_header_right">
				
				
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="header">
		<div class="content white">
			<nav class="navbar navbar-default">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
                                            <a class="navbar-brand" href="index.php">
                                                    <img src="logo/logo.png" style="height: 60px;" />
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                                            <nav class="link-effect-2" id="link-effect-2" >
                                                <ul class="nav navbar-nav" style="float: right;">                                                                
								<li>
                                                                    <a href="index.php" class="effect-3">Home</a>
								</li>
								<li class="active">
									<a href="invigilator.php" class="effect-3">Invigilator</a>
								</li>	
                                                               
                                                                
							</ul>
						</nav>
                                            
                                            
                                            
                                            
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>
	<!-- banner -->
	<div class="inner_page_agile">

	</div>
	<!--//banner --><br />
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                        <img src="template/images/log.jpg" class="img img-responsive" />
                    </div>
                    <div class="col-lg-6">
                        
                            <?php
                            if(isset($_GET['data']))
                            {
                                $data=$_GET['data'];
                                if($data=="1")
                                {
                                ?>
                        <center>
                        <font color='red'><h3>You Dont Have Active Exam today</h3></font>
                        <a href="invigilator.php" class="label label-danger"><span class="fa fa-backward"></span> BACK TO LOGIN</a>
                        </center>
                                <?php
                                }
                                if($data=="2")
                                {
                                    ?>
                        <form method="post">
                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                            <tr>
                                <td colspan="2"><center>LOGIN HERE</center></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" name="uid1" class="form-control" value="<?php echo $_SESSION['invg'] ?>" readonly="readonly" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="password" name="pas" class="form-control" placeholder="Password Here" /></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                            <center>
                                <input type="submit" name="sub1" value="PROCEED" />
                            </center>
                                </td>
                            </tr>
                        </table>
                        </form>
                        <?php                        
                                }
                            }
                            else
                            {
                                ?>
                            <form method="post" id="log">
                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                            <tr>
                                <td colspan="2"><center>
                                   <img src="cam/cam.png" onclick="setimg()"/>
                                   <div id="outdiv" style="width: 350px; height: 250px; border: 1px solid black;">
                               </div></center>

                           <canvas id="qr-canvas" width="100" height="10"></canvas>
                           <script type="text/javascript">load();</script>
                           <input type="text" name="rslt" required="required" readonly="readonly" id="result" class="form-control" onfocus="loadchk1()" />
                           </td>
                           </tr>
                        </table>
                                </form>
                        <script>
                        function loadchk1()
                        {
                            $("#log").submit();
                        }
                        </script>
                            <?php
                            }
                            ?>
                        
                    </div>
                </div>
            </div>
        </div>
	<!-- about -->
	
	<!-- //about -->
	<!-- services -->
	
	<!-- //services -->
	<!-- news -->
	
	<!-- modal -->
	
	<!-- //modal -->
	<!-- //news -->
	<!-- middle section -->
	
	<!-- //middle section -->
	<!-- testimonials -->
	
	<!-- //testimonials -->
	<!-- footer --><br />
	<div class="mkl_footer">
		<div class="sub-footer">
			
		</div>
		<div class="footer-copy-right">
			<div class="container">
				<div class="allah-copy">
					<p>© 2020 Notice Board. All rights reserved | Design by
						<a href="#">Trinity Technologies</a>
					</p>
				</div>
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--/footer -->

	<!-- js files -->
	<!-- js -->
	<script src="template/js/jquery-2.1.4.min.js"></script>
	<!-- bootstrap -->
	<script src="template/js/bootstrap.js"></script>
	<!-- stats numscroller-js-file -->
	<script src="template/js/numscroller-1.0.js"></script>
	<!-- //stats numscroller-js-file -->

	<!-- Flexslider-js for-testimonials -->
	<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 1,
				animationSpeed: 1000,
				autoPlay: false,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 1
					},
					tablet: {
						changePoint: 768,
						visibleItems: 1
					}
				}
			});

		});
	</script>
	<script src="template/js/jquery.flexisel.js"></script>
	<!-- //Flexslider-js for-testimonials -->
	<!-- smooth scrolling -->
	<script src="template/js/SmoothScroll.min.js"></script>
	<script src="template/js/move-top.js"></script>
	<script src="template/js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script>
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- smooth scrolling -->
	<!-- //js-files -->

</body>

</html>