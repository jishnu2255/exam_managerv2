<?php
error_reporting(0);
include '../connection.php';
session_start();
if(isset($_SESSION['stf']))
{
    $uid=$_SESSION['stf'];
    $sel_data=mysqli_query($dbcon,"select * from staf_data where stfif='$uid'");
    $rdata=mysqli_fetch_row($sel_data);    
}
 else {
header("location:../index.php");    
}
if(isset($_POST['sub']))
{
    $stcount=mysqli_query($dbcon,"select * from student_data where active_st='1'");
    $rcount=mysqli_num_rows($stcount);
    $up=mysqli_query($dbcon,"update staf_data set ealo=0");
    $c=$_POST['cnt'];
    for($x=1;$x<=$c;$x++)
    {
    $a[$x]=$_POST["a$x"];      
    }    
    $ar1=  explode(",", $a[1]);
    $ar2=  explode(",", $a[2]);
    $i=0;
    $nxt_start=3;
    $p=0;
    $q=0;
    for($z=1;$z<=$rcount;$z++)
    {
        if($ar1[$p]=="")
        {
            $ar1=explode(",", $a[$nxt_start]);
            $nxt_start++;
            $p=0;
        }
        if($ar2[$q]=="")
        {
            $ar2=explode(",", $a[$nxt_start]);
            $nxt_start++;
            $q=0;
        }
        $new[$i]=$ar1[$p];
        $i++;
        $new[$i]=$ar2[$q];
        $i++;
        $p++;
        $q++;
    }     
    $selr=mysqli_query($dbcon,"select * from room_data order by rand()");    
    $z=0;     
    while($rr=  mysqli_fetch_row($selr))
    {
        $salotid=0;
        $rminm=$rr[2];
        $blk=$rr[1];
        $nc=$rr[3];//num of chair
        $nr=$rr[4]; //num of row
        $nr1=$nc/$nr;
        $bn=0;//Bench Number
        $bn1=$nr1;
        
        for($i=1;$i<=$nc;$i++)
        {
            if($new[$z]!="")
            {
            $bn++;
            $ins=mysqli_query($dbcon,"INSERT INTO `room_assign`(`eid` , `blknme`, `rumid`, `bnch`, `bnch_num`, `rolnum`,`dt` , `tim`) VALUES ('".$_GET['eid']."','$blk','$rminm','$i','$bn','$new[$z]','".$_GET['dt']."','".$_GET['ti']."')");
            $z++;                    
            }
            if($new[$z]!="")
            {
            $bn1=$bn+$nr1;
            $ins=mysqli_query($dbcon,"INSERT INTO `room_assign`(`eid` , `blknme`, `rumid`, `bnch`, `bnch_num`, `rolnum`,`dt` , `tim`) VALUES ('".$_GET['eid']."','$blk','$rminm','$i','$bn1','$new[$z]','".$_GET['dt']."','".$_GET['ti']."')");
            $z++;            
            }
            if($new[$z]=="")
            {
                $z++;
            }
            if($i==$nr1)
            {
               $bn=$bn1;
            }           
             
        }
    }
    
    if($z>0)
    {
        //staff allocation block        
        $selblk=mysqli_query($dbcon,"select distinct(blknme) from room_assign where eid='".$_GET['eid']."' and dt='".$_GET['dt']."' and tim='".$_GET['ti']."'");
        echo mysqli_error($dbcon);
        while($rblk=mysqli_fetch_row($selblk))
        {
            echo"a";
            $xamblkid=$rblk[0];
            $selrum=mysqli_query($dbcon,"select distinct(rumid) from room_assign where eid='".$_GET['eid']."' and blknme='$xamblkid' and dt='".$_GET['dt']."' and tim='".$_GET['ti']."'");
            while($rrum=mysqli_fetch_row($selrum))
            {
                $rumid=$rrum[0];
                $selr1=mysqli_query($dbcon,"select * from room_data where blk_nme='$rblk[0]' and rm_nbr='$rumid'");
                $rr1=mysqli_fetch_row($selr1);
                $totstud=$rr1[3]*2;//used to count number of staff need in the room
                $stfn="";
                if($totstud>25)
                {
                    $selstf=mysqli_query($dbcon,"select * from staf_data where ealo='0' and desig='3' order by rand() limit 2");
                    while($rstf=mysqli_fetch_row($selstf))
                    {
                        $up=mysqli_query($dbcon,"update staf_data set ealo=1 where stfif='$rstf[2]'");
                        $stfn.="$rstf[2],";
                    }
                }
                else{
                    $selstf=mysqli_query($dbcon,"select * from staf_data where ealo='0' and desig='3' order by rand() limit 1");
                    while($rstf=mysqli_fetch_row($selstf))
                    {
                        $up=mysqli_query($dbcon,"update staf_data set ealo=1 where stfif='$rstf[2]'");
                        $stfn.="$rstf[2],";
                    }
                }   
                $alocateroom=mysqli_query($dbcon,"INSERT INTO `staff_allocation`(`stid`, `eid`, `dt`, `tim`, `blk`, `room`) VALUES ('$stfn','".$_GET['eid']."','".$_GET['dt']."','".$_GET['ti']."','$xamblkid','$rumid')");
            }
        }
    }
        $ins1=mysqli_query($dbcon,"INSERT INTO `chair_conf`(`eid`, `dt`, `tim`) VALUES ('".$_GET['eid']."','".$_GET['dt']."','".$_GET['ti']."')");
        if($ins1>0)
        {
            header("location:salocation.php?eid=".$_GET['eid']."&z=$z");
        }
    
}
if(isset($_GET['deldt']))
{
    $eid=$_GET['eid'];
    $dt=$_GET['deldt'];
    $ti=$_GET['ti'];
    $del=mysqli_query($dbcon,"delete from room_assign where eid='$eid' and dt='$dt' and tim='$ti'");
    if($del>0)
    {
        $del1=mysqli_query($dbcon,"delete from chair_conf where eid='$eid' and dt='$dt' and tim='$ti'");
        $del2=mysqli_query($dbcon,"delete from staff_allocation where eid='$eid' and dt='$dt' and tim='$ti'");
        if($del2>0)
        {
            header("location:salocation.php?eid=$eid");
        }
    }
}
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
                                                            <img class="nav-user-photo" src="../admin/staff_pic/<?php echo $rdata[10] ?>" alt="Administrator" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $rdata[1] ?>
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
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-graduation-cap"></i>
							<span class="menu-text">
								Manage
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
                                                <!--        <li class="">
								<a href="syllabus.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Syllabus
								</a>

								<b class="arrow"></b>
							</li>
                                                   
							-->
                                                        <li class="">
								<a href="room.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Room
								</a>

								<b class="arrow"></b>
							</li>
                                                       
                                                </ul>
					</li> 
                                        <li class="">
						<a href="upsem.php">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text">Update Semester</span>
						</a>

						<b class="arrow"></b>
                                        </li>     
                                        <li class="">
						<a href="exam.php">
							<i class="menu-icon fa fa-file"></i>
							<span class="menu-text">ADD Examination </span>
						</a>

						<b class="arrow"></b>
                                        </li> 
                                        <li class="">
						<a href="assignstud.php">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text">Assign Students </span>
						</a>

						<b class="arrow"></b>
                                        </li>     
                                        <li class="active">
						<a href="salocation.php">
							<i class="menu-icon fa fa-empire"></i>
							<span class="menu-text">Seat Allocation </span>
						</a>

						<b class="arrow"></b>
                                        </li>                                                                    
					<li class="">
						<a href="utimetable.php">
							<i class="menu-icon fa fa-upload"></i>
							<span class="menu-text">Upload Time Table </span>
						</a>

						<b class="arrow"></b>
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
                                                
                                                <div style="padding: 5px; margin-left: 15px;"><b>Seat Allocation</b></div>
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<!-- /.ace-settings-container -->

						<!-- /section:settings.box -->
						
						<div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="col-lg-2"></div>
                                                        <div class="col-lg-8">
                                                           <?php
                                                        $sel1=mysqli_query($dbcon,"select * from exam_data where st=1 order by id desc");
                                                        if(mysqli_num_rows($sel1)>0)
                                                        {
                                                            ?>
                                                        <table class="table table-bordered table-condensed table-hover table-striped">
                                                            <tr>
                                                                <td>#</td>
                                                                <td>Exam Title</td>
                                                                <td></td>
                                                            </tr>
                                                            <?php
                                                            $i=0;
                                                            while($re=mysqli_fetch_row($sel1))
                                                            {
                                                                $i++;
                                                                ?>
                                                            <tr>
                                                                <td><?php echo $i ?></td>
                                                                <td><?php echo $re[1] ?></td>
                                                                <td><a href="salocation.php?eid=<?php echo $re[0] ?>"><span class="fa fa-arrow-circle-right" style="color: green" title="ASSIGN EXAMINATION"></span></a></td>
                                                            </tr>
                                                            <?php                                                                
                                                            }
                                                            ?>
                                                        </table>
                                                        <?php
                                                        }
                                                        ?>
                                                           
                                                        </div>
                                                        <div class="col-lg-4"></div>
                                                    </div><!-- /.col -->
						</div><!-- /.row -->
                                               <div class="row">
                                                   <div class="col-xs-12">
                                                       <form method="post">
                                                       <?php
                                                       if(isset($_GET['dt']))
                                                       {
                                                            $dt=$_GET['dt'];
                                                            $tim=$_GET['ti'];
                                                            $eid=$_GET['eid'];
                                                            $seldata1=mysqli_query($dbcon,"select * from exam_assign where eid='$eid' and dt='$dt' and tim='$tim'");
                                                            $i=0;
                                                            while($rdata1=mysqli_fetch_row($seldata1))
                                                            {
                                                                $i++;
                                                                $assid=$rdata1[0];
                                                                $strn="";
                                                                $selstud=mysqli_query($dbcon,"select * from exam_stud where eassign_id='$assid' order by rand()");
                                                                while($rstud=mysqli_fetch_row($selstud))
                                                                {
                                                                    $strn.="$rstud[2],";
                                                                }
                                                                ?>
                                                       <input type="text" name="a<?php echo $i ?>" value="<?php echo $strn ?>" />
                                                       <?php
                                                            }
                                                            ?>
                                                       <input type="text" name="cnt" value="<?php echo $i ?>" />
                                                       <div class="alert alert-success"><center>
                                                           Student List are Sorted Successfully!!, Please Click PROCEED button to Continue...
                                                           <input type="submit" name="sub" value="PROCEED" class="btn btn-sm btn-success" />
                                                           </center></div>
                                                       <?php
                                                            
                                                       }
                                                       else
                                                       {
                                                       if(isset($_GET['eid']))
                                                       {
                                                           $eid=$_GET['eid'];
                                                           $selxm=mysqli_query($dbcon,"select * from exam_data where id='$eid'");
                                                           $rxm=mysqli_fetch_row($selxm);
                                                           $i=0;
                                                           $seldt=mysqli_query($dbcon,"select distinct(dt) from exam_assign where eid='$eid'");
                                                           if(mysqli_num_rows($seldt)>0)
                                                           {
                                                               ?>
                                                       <table class="table table-bordered table-condensed table-hover table-striped">
                                                           <tr style="background-color: #006dcc; color: white;">
                                                               <td colspan="6">
                                                           <center>
                                                               <b>
                                                                   <?php echo strtoupper($rxm[1]) ?>
                                                               </b>
                                                           </center>
                                                               </td>
                                                           </tr>
                                                           <?php
                                                           while($rdt=mysqli_fetch_row($seldt))
                                                           {
                                                               ?>
                                                           <tr>
                                                               <td colspan="5"><b><?php echo $rdt[0] ?></b></td>
                                                           </tr>
                                                           <?php
                                                           $seltim=mysqli_query($dbcon,"select distinct(tim) from exam_assign where eid='$eid' and dt='$rdt[0]'");
                                                           while($rtime=mysqli_fetch_row($seltim)){
                                                               $i++;
                                                               ?>
                                                           <tr>
                                                               <td></td>
                                                               <td><?php echo $rtime[0] ?></td>
                                                               <td>
                                                                   <?php
                                                                   $seldata=mysqli_query($dbcon,"select * from exam_assign where eid='$eid' and dt='$rdt[0]' and tim='$rtime[0]'");
                                                                   while($rdata=mysqli_fetch_row($seldata))
                                                                   {
                                                                        $cid=$rdata[2];
                                                                        $did=$rdata[3];
                                                                        $sem=$rdata[5];
                                                                        $selcn=mysqli_query($dbcon,"select * from crs_info where crsid='$cid'");
                                                                        $rcn=mysqli_fetch_row($selcn);                                                                        
                                                                        $seldn=mysqli_query($dbcon,"select * from dep_info where depid='$did'");
                                                                        $rdn=mysqli_fetch_row($seldn);
                                                                        $chk5=mysqli_query($dbcon,"select * from student_data where crs='$cid' and dep='$did' and sem='$sem'");
                                                                        $rchk5=mysqli_fetch_row($chk5);
                                                                        $admnum=$rchk5[7];
                                                                        $chk6=mysqli_query($dbcon,"select * from room_assign where eid='".$_GET['eid']."' and dt='$rdt[0]' and tim='$rtime[0]' and rolnum='$admnum'");
                                                                        if(mysqli_num_rows($chk6)>0)
                                                                        {
                                                                            $blink="<span class='fa fa-circle pull-right;' style='color:green; float:right;'></span>";
                                                                        }
                                                                        else
                                                                        {
                                                                            $blink="<span class='fa fa-circle pull-right;' style='color:red; float:right;'></span>";
                                                                        }
                                                                        echo "$rcn[1]-$rdn[2]-Semester $sem $blink<br />";
                                                                   }
                                                                           ?>
                                                               </td>
                                                               <td>
                                                                   <?php
                                                                   $chk=mysqli_query($dbcon,"select * from chair_conf where eid='$eid' and dt='$rdt[0]' and tim='$rtime[0]'");
                                                                   if(mysqli_num_rows($chk)>0)
                                                                   {
                                                                       ?>
                                                                   <span class="fa fa-file-text" title="View Allocated Details" style="cursor: pointer; color: green;" data-toggle="modal" data-target="#myModal<?php echo $i ?>"></span>
                                                                   |
                                                                   <a target="_BLANK" href="print.php?eid=<?php echo $_GET['eid'] ?>&dt=<?php echo $rdt[0] ?>&ti=<?php echo $rtime[0] ?>" class="fa fa-print"></a>
                                                                   <a href="salocation.php?eid=<?php echo $_GET['eid'] ?>&deldt=<?php echo $rdt[0] ?>&ti=<?php echo $rtime[0] ?>"><span class="fa fa-trash" style="color: red; float: right;"></span></a>
                                                                   <div class="modal fade" id="myModal<?php echo $i ?>" role="dialog">
                                                                    <div class="modal-dialog">

                                                                      <!-- Modal content-->
                                                                      <div class="modal-content">
                                                                        <div class="modal-header">
                                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                          <h4 class="modal-title"><b><?php echo date("d-M-Y",strtotime($rdt[0])) ?> (<?php echo $rtime[0] ?>)</b></h4>
                                                                        </div>
                                                                          <div class="modal-body" style="overflow-y: scroll;">
                                                                            <p>
                                                                                <?php
                                                                                $selblk=mysqli_query($dbcon,"select distinct blknme from room_assign where eid='".$_GET['eid']."' and dt='$rdt[0]' and tim='$rtime[0]'");
                                                                                if(mysqli_num_rows($selblk)>0)
                                                                                {
                                                                                    ?>
                                                                            <table class="table table-bordered table-condensed table-hover table-striped">
                                                                                <?php
                                                                                while($rblk=mysqli_fetch_row($selblk))
                                                                                {
                                                                                    ?>
                                                                                <tr>
                                                                                    <td colspan="4" style="color: blue;">
                                                                                        <b><?php echo $rblk[0] ?></b>
                                                                                       
                                                                                    </td>
                                                                                </tr>
                                                                                <?php
                                                                                $selrm=mysqli_query($dbcon,"select distinct rumid from room_assign where eid='".$_GET['eid']."' and dt='$rdt[0]' and tim='$rtime[0]' and blknme='$rblk[0]'");
                                                                                while($rrm=mysqli_fetch_row($selrm))
                                                                                {
                                                                                    ?>
                                                                                <tr>
                                                                                    <td style="width: 5%"></td>
                                                                                    <td colspan="2" style="color: #cc0000">Room : <b><?php echo $rrm[0] ?></b>
                                                                                        <div style="float: right;">
                                                                                        <?php
                                                                                    $selst1=mysqli_query($dbcon,"select stid from staff_allocation where eid='".$_GET['eid']."' and dt='$rdt[0]' and tim='$rtime[0]' and blk='$rblk[0]' and room='$rrm[0]'");
                                                                                    $rst1=mysqli_fetch_row($selst1);
                                                                                    $stfid=  explode(",",$rst1[0]);
                                                                                    echo"Staff: <br />";
                                                                                    foreach($stfid as $v)
                                                                                    {
                                                                                        //echo $v;
                                                                                        $sel5=mysqli_query($dbcon,"select * from staf_data where stfif='$v'");
                                                                                        if(mysqli_num_rows($sel5)>0)
                                                                                        {
                                                                                            $r5=mysqli_fetch_row($sel5);
                                                                                            echo $r5[1];
                                                                                        }
                                                                                    }
                                                                                    
                                                                                    ?></div>
                                                                                    </td>
                                                                                </tr>
                                                                                <?php
                                                                                $selbnch=mysqli_query($dbcon,"select distinct bnch from room_assign where eid='".$_GET['eid']."' and dt='$rdt[0]' and tim='$rtime[0]' and blknme='$rblk[0]' and rumid='$rrm[0]'");
                                                                                while($rbnch=mysqli_fetch_row($selbnch))
                                                                                {
                                                                                    ?>
                                                                                <tr>
                                                                                    <td colspan="2" style="width: 10%;"></td>
                                                                                    <td>Bench- <?php echo $rbnch[0] ?> 
                                                                                        <div style="float: right; text-align: right;">
                                                                                    <?php
                                                                                    $seldata2=mysqli_query($dbcon,"select * from room_assign where eid='".$_GET['eid']."' and dt='$rdt[0]' and tim='$rtime[0]' and blknme='$rblk[0]' and rumid='$rrm[0]' and bnch='$rbnch[0]'");
                                                                                    while($rdata2=mysqli_fetch_row($seldata2))
                                                                                    {
                                                                                        $selstud=mysqli_query($dbcon,"select * from student_data where admnum='$rdata2[6]'");
                                                                                        $rstud=mysqli_fetch_row($selstud);
                                                                                        echo $rstud[6].",Reg no : ".$rdata2[6]." in ".$rdata2[5]." (<span class='fa fa-user' title='$rstud[6]'></span>)<br />";
                                                                                    }
                                                                                    ?>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <?php
                                                                                }
                                                                                }
                                                                                }
                                                                                ?>
                                                                            </table>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                        
                                                                      </div>

                                                                    </div>
                                                                  </div>
                                                                   <?php
                                                                   }
                                                                   else{
                                                                   ?>
                                                                   <a href="salocation.php?eid=<?php echo $eid ?>&dt=<?php echo $rdt[0] ?>&ti=<?php echo $rtime[0] ?>"><span class="fa fa-arrow-circle-o-right" title="Assign Chair" style="color: orangered;"></span></a>
                                                               <?php
                                                                   }
                                                                   ?>
                                                               </td>
                                                               
                                                           </tr>
                                                           <?php
                                                           }
                                                           }
                                                           ?>
                                                       </table>
                                                       <?php
                                                           }
                                                       }
                                                       }
                                                       ?>
                                                       </form>
                                                   </div> 
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
