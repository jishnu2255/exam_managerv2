<?php
include '../connection.php';
$r=$_GET['r'];
$id=$_GET['id'];
$up=mysqli_query($dbcon,"update exam_assign set dt='$r' where id='$id'");
if($up>0)
{
    echo"1";
}
?>