<?php
include '../connection.php';
$c=$_GET['c'];
$d=$_GET['d'];
$s=$_GET['s'];
$e=$_GET['e'];

$chk=mysqli_query($dbcon,"select * from exam_assign where eid='$e' and crsid='$c' and depid='$d' and sem='$s'");
if(mysqli_num_rows($chk)>0)
{
    ?>
<table class="table table-bordered table-condensed table-hover table-striped">
    <tr>
        <td colspan="4"><center><b>ALREADY ASSIGNED</b></center></td>
    </tr>
    <?php
    $z=0;
    while($rc=mysqli_fetch_row($chk))
    {
        $z++;
        ?>
    <tr>
        <td><?php echo $z ?></td>
        <td><?php echo $rc[6] ?></td>
        <td><?php echo date("d-M-Y",strtotime($rc[7])) ?></td>
        <td><?php echo $rc[8] ?></td>
    </tr>
    <?php
    }
    ?>
</table>
<?php
}
else
{
$sel=mysqli_query($dbcon,"select * from syllabus_data where crsid='$c' and depid='$d' and sem='$s'");
if(mysqli_num_rows($sel)>0)
{
    ?>
<table class="table table-bordered table-condensed table-hover table-striped">
    <?php
    $i=0;
    while($r=mysqli_fetch_row($sel))
    {
        $i++;
        ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $r[4] ?>
            <input type="hidden" name="su<?php echo $i ?>" class="form-control" value="<?php echo $r[5] ?>" />
        </td>
        <td><input type="date" name="dt<?php echo $i ?>" class="form-control" /></td>
        <td><input type="time" name="ti<?php echo $i ?>" class="form-control" /></td>
    </tr>
    <?php
    }
    ?>
    <tr>
        <td colspan="5"><center>
            <input type="hidden" name="count" class="form-control" value="<?php echo $i ?>" />
            <input type="submit" name="assexam" value="ASSIGN EXAM" class="btn btn-sm btn-danger" />
    </center></td>
    </tr>
</table>
<?php
}
}
?>