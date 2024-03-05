<?php
include '../connection.php';
$q=$_GET['q'];
$sel1=mysqli_query($dbcon,"select * from staf_data where stfif like '%$q%'");
if(mysqli_num_rows($sel1)>0)
{
    ?>
<table class="table table-bordered table-condensed">
    <tr>
        <td colspan="4"><center><b>STAFF DATA</b></center></td>
    </tr>
    <tr>
        <td>#</td>
        <td>Name</td>
        <td>Login ID</td>
        <td>Reset Password</td>
    </tr>
    <?php
    $i=0;
    while($r1=mysqli_fetch_row($sel1))
    {
        $i++;
        ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $r1[1] ?></td>
        <td><?php echo $r1[2] ?></td>
        <td><span id="st<?php echo $i ?>"><span class="fa fa-refresh" onclick="resetstaff('<?php echo $r1[2] ?>','<?php echo $i ?>')"></span></span></td>
    </tr>
    <?php
    }
    ?>
</table>
<?php
}

$sel1=mysqli_query($dbcon,"select * from student_data where admnum like '%$q%'");
if(mysqli_num_rows($sel1)>0)
{
    ?>
<table class="table table-bordered table-condensed">
    <tr>
        <td colspan="4"><center><b>STUDENT DATA</b></center></td>
    </tr>
    <tr>
        <td>#</td>
        <td>Name</td>
        <td>Login ID</td>
        <td>Reset Password</td>
    </tr>
    <?php
    $i=0;
    while($r1=mysqli_fetch_row($sel1))
    {
        $i++;
        ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $r1[6] ?></td>
        <td><?php echo $r1[7] ?></td>
        <td><span id="stud<?php echo $i ?>"><span class="fa fa-refresh" onclick="resetstud('<?php echo $r1[7] ?>','<?php echo $i ?>')"></span></span></td>
    </tr>
    <?php
    }
    ?>
</table>
<?php
}
?>