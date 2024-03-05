<?php
include '../connection.php';
$q=$_GET['q'];
if($q=="2")
{
$chk=mysqli_query($dbcon,"select * from staf_data where desig='4'");
if(mysqli_num_rows($chk)>0)
{
    ?>
<font color="red">Cannot add more than 1 exam co-ordinator</font>
    <?php
}
else
{
    ?>
<font color="green">Proceed..</font>
    <?php
}
}
?>