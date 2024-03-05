<?php
include '../connection.php';
$id=$_GET['id'];
$up=mysqli_query($dbcon,"update user_log set pwd='student' where uid='$id'");
if($up>0)
{
    echo"Password Reset to <b>student</b>";
}
?>