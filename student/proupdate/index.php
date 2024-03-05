<?php
include '../../connection.php';
session_start();
if(isset($_SESSION['stud']))
{
    $uid=$_SESSION['stud'];
    $sel_data=mysqli_query($dbcon,"select * from student_data where admnum='$uid'");
    $rdata=mysqli_fetch_row($sel_data);
    $cid=$rdata[1];
    $did=$rdata[2];
    $sem=$rdata[3];
    $ay=$rdata[4];
    $sel_crs=mysqli_query($dbcon,"select * from crs_info where crsid='$cid'");
    $rcrs=mysqli_fetch_row($sel_crs);
    $sel_dep=mysqli_query($dbcon,"select * from dep_info where depid='$did'");
    $rdep=mysqli_fetch_row($sel_dep);
}
 else {
header("location:../../index.php");    
}
if(isset($_POST['sub']))
{
    $nm=$_POST['nm'];
    $addr=$_POST['addr'];
    $adr1=$_POST['addr1'];
    $d=$_POST['d'];
    $m=$_POST['m'];
    $y=$_POST['y'];
    $dob="$y-$m-$d";
    $con=$_POST['con'];
    $fn=$_POST['fn'];
    $con1=$_POST['con1'];
    $gn=$_POST['gn'];
    $bg=$_POST['bg'];
    $up=$_FILES['up']['name'];
    $nfn=$uid."".substr($up, strrpos($up, "."));
    $sslc=$_POST['sslc'];
    $plsto=$_POST['plsto'];
    $up=mysqli_query($dbcon,"update student_data set addr='$addr',tmpaddr='$adr1',dob='$dob',con='$con',fatrnme='$fn',mob='$con1',bldgrp='$bg',pic='$nfn',st=1,gndr='$gn',sslcmrk='$sslc',plstomrk='$plsto' where admnum='$uid'");
    if($up>0)
    {
        if(move_uploaded_file($_FILES['up']['tmp_name'], getcwd()."\\../stud_pic\\$nfn"))
        {
            header("location:../studenthome.php");
        }
    }
}
?>
<style>
@import url(http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700);
@import url(http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700);

body {
    background: #fff;
	font-family: 'Roboto', sans-serif;
	color:#333;
	line-height: 22px;	
}
h1, h2, h3, h4, h5, h6 {
	font-family: 'Roboto Condensed', sans-serif;
	font-weight: 400;
	color:#111;
	margin-top:5px;
	margin-bottom:5px;
}
h1, h2, h3 {
	text-transform:uppercase;
}

input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 12px;
    cursor: pointer;
    opacity: 1;
    filter: alpha(opacity=1);    
}

.form-inline .form-group{
    margin-left: 0;
    margin-right: 0;
}
.control-label {
    color:#333333;
}
</style>
<link rel="stylesheet" href="../../admin_tmplate/assets/css/bootstrap.css" />
<link rel="stylesheet" href="../../admin_tmplate/assets/css/font-awesome.css" />
<link rel="stylesheet" href="../../admin_tmplate/assets/css/ace-fonts.css" />


<div class="container">
	<div class="row">
            <h2 class="entry-title"><span>Register for First Time</span> </h2>
        <div class="alert alert-danger">
            Hi, <b><?php echo $rdata[6] ?></b>, Welcome to the Official Web portal. Please fill the below form to activate your account.
        </div>
        <hr>
    <div class="col-md-8">
      <section>      
        
            <form class="form-horizontal" method="post" name="signup" id="signup" enctype="multipart/form-data" >        
        <div class="form-group">
          <label class="control-label col-sm-3">Name<span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
              <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" class="form-control" name="nm" id="nm" placeholder="Enter your Email ID" value="<?php echo $rdata[6] ?>">
            </div>
            <small>  </small> </div>
        </div>       
        
        <div class="form-group">
          <label class="control-label col-sm-3">Address <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <textarea name="addr" class="form-control"></textarea>
            </div>  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Temporary Address <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <textarea name="addr1" class="form-control"></textarea>
            </div>  
          </div>
        </div>        
        <div class="form-group">
          <label class="control-label col-sm-3">Date of Birth <span class="text-danger">*</span></label>
          <div class="col-xs-8">
            <div class="form-inline">
              <div class="form-group">
                <select name="d" class="form-control">
                  <option value="">Date</option>
                  <option value="1" >1 </option><option value="2" >2 </option><option value="3" >3 </option><option value="4" >4 </option><option value="5" >5 </option><option value="6" >6 </option><option value="7" >7 </option><option value="8" >8 </option><option value="9" >9 </option><option value="10" >10 </option><option value="11" >11 </option><option value="12" >12 </option><option value="13" >13 </option><option value="14" >14 </option><option value="15" >15 </option><option value="16" >16 </option><option value="17" >17 </option><option value="18" >18 </option><option value="19" >19 </option><option value="20" >20 </option><option value="21" >21 </option><option value="22" >22 </option><option value="23" >23 </option><option value="24" >24 </option><option value="25" >25 </option><option value="26" >26 </option><option value="27" >27 </option><option value="28" >28 </option><option value="29" >29 </option><option value="30" >30 </option><option value="31" >31 </option>                </select>
              </div>
              <div class="form-group">
                <select name="m" class="form-control">
                  <option value="">Month</option>
                  <option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>                </select>
              </div>
              <div class="form-group" >
                <select name="y" class="form-control">
                  <option value="0">Year</option>
                  <?php
                  for($i=date('Y')-30;$i<=date('Y')-15;$i++)
                  {
                  ?>
                  <option value="<?php echo $i ?>" ><?php echo $i ?></option>
                  <?php
                  }
                  ?>                  
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Contact No. <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
          	<div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
            <input type="text" class="form-control" name="con" id="con" placeholder="Enter your Primary contact no." value="">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Father Name <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
          	<div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control" name="fn" id="fn" placeholder="Enter your Father Name" value="">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Contact No. <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
          	<div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
            <input type="text" class="form-control" name="con1" id="con1" placeholder="Enter your Secondary contact no." value="">
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-3">Gender <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
            <label>
            <input name="gn" type="radio" value="Male" checked>
            Male </label>
               
            <label>
            <input name="gn" type="radio" value="Female" >
            Female </label>
          </div>
        </div>
                <div class="form-group">
          <label class="control-label col-sm-3">Blood Group <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
          	<div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
            <select class="form-control" name="bg" id="bg">
                <option>O+ve</option>
                <option>O-ve</option>
            </select>
            </div>
          </div>
                </div>
        
        <div class="form-group">
          <label class="control-label col-sm-3">Profile Photo <br>
          <small>(optional)</small></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group"> <span class="input-group-addon" id="file_upload"><i class="glyphicon glyphicon-upload"></i></span>
              <input type="file" name="up" id="up" class="form-control upload" placeholder="" aria-describedby="file_upload">
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-3">SSLC Mark <br>
          </label>
          <div class="col-md-8 col-sm-9">
          	<div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
            <input type="text" class="form-control" name="sslc" id="sslc" placeholder="Enter your SSLC Mark" value="">
            </div>
          </div>
        </div>
        
         <div class="form-group">
          <label class="control-label col-sm-3">Plus Two Mark <br>
          </label>
          <div class="col-md-8 col-sm-9">
          	<div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
            <input type="text" class="form-control" name="plsto" id="plusto" placeholder="Enter your +2 Mark" value="">
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-xs-offset-3 col-md-8 col-sm-9"><span class="text-muted"><span class="label label-danger">Note:-</span> By clicking Sign Up, you agree to our <a href="#">Terms</a> and that you have read our <a href="#">Policy</a></span> </div>
        </div>
        <div class="form-group">
          <div class="col-xs-offset-3 col-xs-10">
            <input name="sub" type="submit" value="Sign Up" class="btn btn-primary">
          </div>
        </div>
      </form>
    </div>
</div>
</div>