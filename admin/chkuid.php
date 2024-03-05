<?php
include '../connection.php';
$q=$_GET['q'];
$chk=mysqli_query($dbcon,"select * from user_log where uid='$q'");
if(mysqli_num_rows($chk)>0)
{
    ?>
<font color="red">User ID Already in use..</font>
    <?php
}
else
{
    ?>
<font color="green">User ID Available</font>
    <?php
}
?>