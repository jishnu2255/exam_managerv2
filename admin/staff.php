<?php
include '../connection.php';
session_start();
if(isset($_POST['sub5']))
{
    $cid=$_POST['crs'];
    $did=$_POST['dep'];
    header("location:staff.php?cid=$cid&did=$did");
}
if(isset($_POST['sub']))
{
    $sn=$_POST['sn'];
    $sid=$_POST['sid'];
    $pas=$_POST['pas'];
    $crs=$_GET['cid'];
    $dep=$_GET['did'];
    $desig="3";
    $adr=$_POST['adr'];
    $con=$_POST['con'];
    $em=$_POST['em'];
    $qua=$_POST['qua'];
    $up=$_FILES['up']['name'];
    $nfn=$sid."".substr($up,strrpos($up,"."));
    $dt=$_POST['dt'];
    $ins_stf=mysqli_query($dbcon,"INSERT INTO `staf_data`(`stfid`, `nme`, `stfif`, `crs`, `dep`, `desig`, `adr`, `con`, `em`, `qual`, `pic`, `dob`, `st`) VALUES ('','$sn','$sid','$crs','$dep','$desig','$adr','$con','$em','$qua','$nfn','$dt','1')");
    if($ins_stf>0)
    {
        if(move_uploaded_file($_FILES['up']['tmp_name'], getcwd()."\\staff_pic\\$nfn"))
        {
            $ins_log=mysqli_query($dbcon,"INSERT INTO `user_log`(`id`, `uid`, `pwd`, `typ`, `st`) VALUES ('','$sid','$pas','TSTAF','1')");
            header("location:staff.php?cid=".$crs."&dis=".$dep);
        }
    }
}
if(isset($_GET['delstid']))
{
    $sid=$_GET['sid'];
    $del=mysqli_query($dbcon,"delete from staf_data where stfif='$sid'");
    if($del>0)
    {
         header("location:sadv.php");
    }
}
/*
if(isset($_POST['sub']))
{
    $sn=$_POST['sn'];
    $uid=$_POST['uid'];
    $pas=$_POST['pas'];
    $con=$_POST['con'];
    $ins=mysqli_query($dbcon,"INSERT INTO `staff_data`(`nme`, `uid`, `con`) VALUES ('$sn','$uid','$con')");
    if($ins>0)
    {
        $ins1=mysqli_query($dbcon,"INSERT INTO `user_log`(`uid`, `pwd`, `typ`, `st`) VALUES ('$uid','$pas','cod','1')");
        if($ins1>0)
        {
            header("location:staff.php?suc=1");
        }
    }
}
if(isset($_POST['sub1']))
{
    $sn=$_POST['sn1'];
    $uid=$_POST['uid1'];
    $con=$_POST['con1'];
    $ins=mysqli_query($dbcon,"update staff_data set nme='$sn', con='$con' where uid='$uid'");
    if($ins>0)    {
        
        if($ins>0)
        {
            header("location:staff.php?suc=1");
        }
    }
}
if(isset($_GET['did']))
{
    $did=$_GET['did'];
    $del=mysqli_query($dbcon,"delete from staff_data where stid='$did'");
    if($del>0)
    {
        header("location:staff.php");
    }
}*/
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $title ?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../admin_tmplate/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="../admin_tmplate/assets/css/font-awesome.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="../admin_tmplate/assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../admin_tmplate/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../admin_tmplate/assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../admin_tmplate/assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../admin_tmplate/assets/js/ace-extra.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../admin_tmplate/assets/js/html5shiv.js"></script>
		<script src="../admin_tmplate/assets/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="#" class="navbar-brand">
						<small>
							<i class="fa fa-university"></i>
							<?php echo $hd ?>
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						
						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                                            <img class="nav-user-photo" src="../logo/logo.png" alt="Administrator" />
								<span class="user-info">
									<small>Welcome,</small>
									Administrator
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="settings.php">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>
								<li class="divider"></li>

								<li>
                                                                    <a href="../logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<!-- #section:basics/sidebar.layout.shortcuts -->
						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>

						<!-- /section:basics/sidebar.layout.shortcuts -->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="index.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
                                        <li class="">
						<a href="notice.php">
							<i class="menu-icon fa fa-file"></i>
							<span class="menu-text"> Notice Board </span>
						</a>

						<b class="arrow"></b>
					</li>
                                        <li class="">
						<a href="student.php">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Add Student </span>
						</a>

						<b class="arrow"></b>
					</li>
                                        <li class="active">
						<a href="staff.php">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> Add Staff </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Manage
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class=" ">
								<a href="department.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Department
								</a>

								<b class="arrow"></b>
							</li>   
                                                        <li class=" ">
								<a href="syllabus.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Syllabus
								</a>

								<b class="arrow"></b>
							</li>        
                                                        <li class="">
								<a href="sadv.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Manage Staff
								</a>

								<b class="arrow"></b>
							</li>
                                                        <li class="" style="display: none;">
								<a href="mpractice.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Malpractice
								</a>

								<b class="arrow"></b>
							</li>
                                                       
                                                </ul>
					</li>
                                        
                                                                                		
					
                                        <li class="">
                                            <a href="../logout.php">
							<i class="menu-icon fa fa-sign-out"></i>
							<span class="menu-text">Logout </span>
						</a>

						<b class="arrow"></b>
					</li>
                                    </ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<!-- /.breadcrumb -->
                                                
                                                <div style="padding: 5px; margin-left: 15px;"><b>MANAGE ROOM</b></div>
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<!-- /.ace-settings-container -->

						<!-- /section:settings.box -->
						
						<div class="row">
                                                    <div class="col-xs-12">
                                                        
                                                        <div class="col-lg-6">                                                            
                                                            <?php
                                                            if(isset($_GET['cid']))
                                                            {
                                                            ?>
                                                            <form method="post" enctype="multipart/form-data">
                                                                <script>
                                                                function loaddep(x)
                                                                {
                                                                    var xmlhttp = new XMLHttpRequest();
                                                                    xmlhttp.onreadystatechange = function() {
                                                                        if (this.readyState == 4 && this.status == 200) {
                                                                            document.getElementById("dep1").innerHTML = this.responseText;
                                                                        }
                                                                    };
                                                                    xmlhttp.open("GET", "loaddep.php?q=" + x, true);
                                                                    xmlhttp.send();
                                                                }
                                                                </script>
                                                            <table class="table table-bordered table-condensed table-responsive table-striped">
                                                                <tr>
                                                                    <td colspan="2"><center><b>ADD Exam Co-ordinators</b></center></td>
                                                                </tr>                                                                
                                                                
                                                                <tr>
                                                                    <td>Staff Name</td>
                                                                    <td><input type="text" name="sn" class="form-control" required="required" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Staff ID</td>
                                                                    <td><input type="text" name="sid" class="form-control" required="required" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Password</td>
                                                                    <td><input type="password" name="pas" class="form-control" required="required" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Address</td>
                                                                    <td><textarea name="adr" class="form-control"></textarea></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Contact Number</td>
                                                                    <td><input type="text" name="con" class="form-control" required="required" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Email</td>
                                                                    <td><input type="email" name="em" class="form-control" required="required" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Qualification</td>
                                                                    <td><input type="text" name="qua" class="form-control" required="required" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Image</td>
                                                                    <td><input type="file" name="up" class="form-control" required="required" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Date of Birth</td>
                                                                    <td><input type="date" name="dt" class="form-control" required="required" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2"><center><input type="submit" name="sub" value="ADD STAFF" class="btn btn-sm btn-danger" /></center></td>
                                                                </tr>
                                                            </table>
                                                            </form>
                                                           <?php
                                                            }
                                                            else{
                                                                ?>
                                                            <script>
                                                            function loaddep5(x)
                                                            {
                                                                var xmlhttp = new XMLHttpRequest();
                                                                xmlhttp.onreadystatechange = function() {
                                                                    if (this.readyState == 4 && this.status == 200) {
                                                                        document.getElementById("dep1").innerHTML = this.responseText;
                                                                    }
                                                                };
                                                                //alert();
                                                                xmlhttp.open("GET", "loaddep.php?q=" + x, true);
                                                                xmlhttp.send();
                                                            }
                                                            </script>
                                                            <form method="post">
                                                                <table class="table table-bordered table-condensed table-hover table-striped">
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <b><center>CHOOSE DEPARTMENT</center></b>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>                    
                                                                        <td colspan="2">
                                                                            <select name="crs" id="crs1" class="form-control" onchange="loaddep5(this.value)">
                                                                                      <option value="">Choose</option>
                                                                                      <?php
                                                                                      $sel_c=mysqli_query($dbcon,"select * from crs_info order by crs_nme asc");
                                                                                      if(mysqli_num_rows($sel_c)>0)
                                                                                      {
                                                                                          while($rc=mysqli_fetch_row($sel_c))
                                                                                          {
                                                                                              ?>
                                                                                      <option value="<?php echo $rc[0] ?>"><?php echo $rc[1] ?></option>
                                                                                      <?php
                                                                                          }
                                                                                      }
                                                                                      ?>
                                                                          </select></td>
                                                                  </tr>
                                                                  <tr>                   
                                                                      <td colspan="2">
                                                                          <div id="dep1">
                                                                              <select name="dep" class="form-control">

                                                                              </select>
                                                                          </div>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td colspan="2">
                                                                  <center>
                                                                      <input type="submit" name="sub5" value="PROCEED" class="btn btn-sm btn-success" />
                                                                  </center>
                                                                      </td>
                                                                  </tr>
                                                                </table>
                                                            </form>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <?php
                                                            if(isset($_GET['sid']))
                                                            {
                                                                
                                                    $sid=$_GET['sid'];
                                                    $sel_st=mysqli_query($dbcon,"select * from staf_data where stfif='$sid'");
                                                    $r_st=mysqli_fetch_row($sel_st);
                                                                                                                ?>
                                                                                                            <a href="staff.php"><span class="label label-danger pull-right">BACK</span></a>
                                                                <table class="table table-bordered table-condensed table-hover table-striped">
                                                                <tr>
                                                                    <td style="width: 50%"><center>
                                                                        <img src="staff_pic/<?php echo $r_st[10] ?>" class="img img-responsive img-thumbnail" />

                                                                        <a href="sadv.php?sid=<?php echo $_GET['sid'] ?>&delstid=1" class="label label-danger">Delete Staff</a>

                                                                </center>


                                                                </td>
                                                                <td>
                                                                    <b><?php echo $r_st[1] ?></b> (<?php echo $r_st[2] ?>)<br />
                                                                    <?php echo $r_st[6] ?><br />
                                                                    Call : <?php echo $r_st[7] ?><br />
                                                                    Mail : <?php echo $r_st[8] ?><hr /> 
                                                                    D.O.B: <?php echo $r_st[11] ?><br />
                                                                    Qualification <?php echo $r_st[9] ?>                 
                                                                </td>
                                                                </tr>
                                                            </table>
                                                            <?php
                                                            
                                                            }
                                                            else
                                                            {
                                                            ?>
                                                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                                <tr>
                        
                                                                    
                                                                    <td>#</td>
                                                                    <td>Staff Name</td>
                                                                    <td>Staff ID</td>
                                                                    <td>Department</td>
                                                                </tr>
                                                                <?php
                                                                $sel_sa=mysqli_query($dbcon,"select * from staf_data where desig='3' and st='1'");
                                                                if(mysqli_num_rows($sel_sa)>0)
                                                                {
                                                                    $i=0;
                                                                    while($rsa=mysqli_fetch_row($sel_sa))
                                                                    {
                                                                        $i++;
                                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $i ?></td>
                                                                    <td><?php echo $rsa[1] ?></td>
                                                                    <td><?php echo $rsa[2] ?></td>
                                                                    <td>
                                                                        <a href="staff.php?sid=<?php echo $rsa[2] ?>"><span class="fa fa-arrow-circle-right"></span></a> | 
                                                                        <a href="print-card.php?sid=<?php echo $rsa[2] ?>" class="fa fa-print" target="_BLANK"></a>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    ?>
                                                                <tr>
                                                                    <td colspan="5">No Data Found</td>
                                                                </tr>
                                                                <?php
                                                                }
                                                                ?>
                                                            </table>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>                                                    
                                                        
                                                        <div class="col-md-6">
                                                            <?php
                                                            $sel_r=mysqli_query($dbcon,"select * from staff_data");
                                                            if(mysqli_num_rows($sel_r)>0)
                                                            {
                                                                ?>
                                                            <table class="table table-bordered table-condensed table-hover table-striped">
                                                                <tr>
                                                                    <td colspan="6"><center><b>AVAILABLE STAFF DETAILS</b></center></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td>Staff Name</td>
                                                                    <td>User ID</td>
                                                                    <td>Contact Number</td>                                                                    
                                                                    <td></td>
                                                                </tr>
                                                                <?php
                                                                $i=0;
                                                                while($rr=mysqli_fetch_row($sel_r))
                                                                {
                                                                    $i++;
                                                                    ?>
                                                                <tr>
                                                                    <td><?php echo $i ?></td>
                                                                    <td><?php echo $rr[1] ?></td>
                                                                    <td><?php echo $rr[2] ?></td>
                                                                    <td><?php echo $rr[3] ?></td>                                                                    
                                                                    <td>
                                                                        <a href="staff.php?did=<?php echo $rr[0] ?>"><span class="fa fa-trash" style="color: red;"></span></a> | 
                                                                        <a href="staff.php?edit=<?php echo $rr[0] ?>"><span class="fa fa-edit" style="color: blue;"></span></a> |
                                                                        <a href="print-card.php?sid=<?php echo $rr[0] ?>" class="fa fa-print" target="_BLANK"></a>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                }
                                                                ?>
                                                            </table>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div><!-- /.col -->
						</div><!-- /.row -->
                                                
                                                        
                                                   
                                                </div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<?php echo $footr ?>
						</span>

						
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='../admin_tmplate/assets/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../admin_tmplate/assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="../admin_tmplate/assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="../admin_tmplate/assets/js/excanvas.js"></script>
		<![endif]-->
		<script src="../admin_tmplate/assets/js/jquery-ui.custom.js"></script>
		<script src="../admin_tmplate/assets/js/jquery.ui.touch-punch.js"></script>
		<script src="../admin_tmplate/assets/js/jquery.easypiechart.js"></script>
		<script src="../admin_tmplate/assets/js/jquery.sparkline.js"></script>
		<script src="../admin_tmplate/assets/js/flot/jquery.flot.js"></script>
		<script src="../admin_tmplate/assets/js/flot/jquery.flot.pie.js"></script>
		<script src="../admin_tmplate/assets/js/flot/jquery.flot.resize.js"></script>

		<!-- ace scripts -->
		<script src="../admin_tmplate/assets/js/ace/elements.scroller.js"></script>
		<script src="../admin_tmplate/assets/js/ace/elements.colorpicker.js"></script>
		<script src="../admin_tmplate/assets/js/ace/elements.fileinput.js"></script>
		<script src="../admin_tmplate/assets/js/ace/elements.typeahead.js"></script>
		<script src="../admin_tmplate/assets/js/ace/elements.wysiwyg.js"></script>
		<script src="../admin_tmplate/assets/js/ace/elements.spinner.js"></script>
		<script src="../admin_tmplate/assets/js/ace/elements.treeview.js"></script>
		<script src="../admin_tmplate/assets/js/ace/elements.wizard.js"></script>
		<script src="../admin_tmplate/assets/js/ace/elements.aside.js"></script>
		<script src="../admin_tmplate/assets/js/ace/ace.js"></script>
		<script src="../admin_tmplate/assets/js/ace/ace.ajax-content.js"></script>
		<script src="../admin_tmplate/assets/js/ace/ace.touch-drag.js"></script>
		<script src="../admin_tmplate/assets/js/ace/ace.sidebar.js"></script>
		<script src="../admin_tmplate/assets/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="../admin_tmplate/assets/js/ace/ace.submenu-hover.js"></script>
		<script src="../admin_tmplate/assets/js/ace/ace.widget-box.js"></script>
		<script src="../admin_tmplate/assets/js/ace/ace.settings.js"></script>
		<script src="../admin_tmplate/assets/js/ace/ace.settings-rtl.js"></script>
		<script src="../admin_tmplate/assets/js/ace/ace.settings-skin.js"></script>
		<script src="../admin_tmplate/assets/js/ace/ace.widget-on-reload.js"></script>
		<script src="../admin_tmplate/assets/js/ace/ace.searchbox-autocomplete.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
		</script>

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="../admin_tmplate/assets/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="../admin_tmplate/docs/assets/js/themes/sunburst.css" />

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="../admin_tmplate/assets/js/ace/elements.onpage-help.js"></script>
		<script src="../admin_tmplate/assets/js/ace/ace.onpage-help.js"></script>
		<script src="../admin_tmplate/docs/assets/js/rainbow.js"></script>
		<script src="../admin_tmplate/docs/assets/js/language/generic.js"></script>
		<script src="../admin_tmplate/docs/assets/js/language/html.js"></script>
		<script src="../admin_tmplate/docs/assets/js/language/css.js"></script>
		<script src="../admin_tmplate/docs/assets/js/language/javascript.js"></script>
	</body>
</html>
