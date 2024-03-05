<?php
include '../connection.php';
$r=$_GET['r'];
$s=$_GET['s'];
$up=mysqli_query($dbcon,"update student_data set regnum='$r' where admnum='$s'");
if($up>0)
{
  echo"<span class='lable label-success'>Register Number Updated</span>";  
}
?>