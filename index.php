<?php
include './connection.php';
if(isset($_POST['sub']))
{
    $un=$_POST['un'];
    $pwd=$_POST['pwd'];
    $chk_log=mysqli_query($dbcon,"select * from user_log where uid='$un' and pwd='$pwd'");
    if(mysqli_num_rows($chk_log)>0)
    {
        $rlog=  mysqli_fetch_row($chk_log);
        session_start();
        if($rlog[3]=="admin")
        {
            $_SESSION['adm']=$un;
            header("location:admin/index.php");
        }       
        if($rlog[3]=="STAF")
        {
            $_SESSION['stf']=$un;
            if($pwd=="christ")
            {
                header("location:changepas.php");
            }
            else
            {
                header("location:staff/index.php");
            }
        }
        if($rlog[3]=="stud")
        {
            $_SESSION['stud']=$un;
            if($pwd=="student")
            {
                header("location:changepas2.php");
            }
            else
            {
            header("location:student/index.php");
            }
        }
        if($rlog[3]=="TSTAF")
        {
            $_SESSION['tchr']=$un;            
            if($pwd=="christ")
            {
                header("location:changepas1.php");
            }
            else
            {
            header("location:teacher/index.php");
            }
        }
        
    }
    else
    {
        header("location:index.php?error=1");
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
	<title><?php echo $hd ?></title>
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
</head>

<body style="background-color:#438eb9;">
	<!-- header -->
	<div class="header-top">
		<div class="container">
			<div class="bottom_header_left">
				<p>
                                   <h3><img src="logo/logo.png" style="height: 60px;" /></i> <b><?php echo $hd ?></b></h3>
				</p>
			</div>
			<div class="bottom_header_right">
				
				
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--<div class="header">
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
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                                            <nav class="link-effect-2" id="link-effect-2" >
                                                <ul class="nav navbar-nav" style="float: right;">                                                                
								<li class="active">
                                                                    <a href="index.php" class="effect-3">Home</a>
								</li>   -->
								<!--
                                                                <li>
									<a href="invigilator.php" class="effect-3">Invigilator</a>
								</li>	-->
                                                               
                                                                
							</ul>
						</nav>
                                            
                                            
                                            
                                            
					</div>
					<!--/.navbar-header-->
					
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
        <div class="container" style="background-color:#438eb9;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                        <img src="logo/7ecd37fa-c001-47cc-ad09-3d0318c83b95.jpg" class="img img-responsive" />
                    </div>
                    <div class="col-lg-6">
                        <form method="post">
                        <table style="width:100%; margin-top:50px;">
                            <tr>
                                <td colspan="2"><center><b>USER LOGIN</b><br /></br>
                                    <?php
                            if(isset($_GET['ch']))
                            {
                                echo"<font color='green'>Password changed successfully... continue login</font>";
                            }
                            ?>
                            
                            </center></td>
                            </tr>
                            <tr>
                                <td>User Name</td>
                                <td><input type="text" required="" name="un" class="form-control" /></td>
                            </tr>
						</br><tr>
                                <td></br></td>
                                <td></br></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password"required="" name="pwd" class="form-control" /></td>
                            </tr>
							<tr>
                                <td></br></td>
                                <td></br></td>
                            </tr>
                            <tr>
                                <td colspan="2"><center><input type="submit" name="sub" value="LOGIN HERE" class="btn btn-sm btn-success" /></center></td>
                            </tr> 
                        </table>
                            <?php
                            if(isset($_GET['error']))
                            {
                                echo"<font color='red'>Invalid User Credentials</font>";
                            }
                            ?>
                        </form>
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
					<p>© 2024 Notice Board. All rights reserved | Design by
						<a href="#">TJAVA Technologies</a>
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