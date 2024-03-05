<?php
include '../connection.php';
$ay=$_GET['ay'];
$c=$_GET['c'];
$d=$_GET['d'];
$chk=mysqli_query($dbcon,"select distinct sem from student_data where crs='$c' and dep='$d' and ay='$ay'");
if(mysqli_num_rows($chk)>0)
{
    $rchk=mysqli_fetch_row($chk);
    echo $rchk[0];
}
?>