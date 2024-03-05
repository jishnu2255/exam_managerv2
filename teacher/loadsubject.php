<table class="table table-bordered table-responsive table-hover">
<?php
include '../connection.php';
$c=$_GET['c'];
$d=$_GET['d'];
$s=$_GET['s'];
$sel_subj=mysqli_query($dbcon,"select * from syllabus_data where crsid='$c' and depid='$d' and sem='$s'");
if(mysqli_num_rows($sel_subj)>0)
{
    
    while($r_sub=mysqli_fetch_row($sel_subj))
    {
        ?>
    <tr>
        <td><?php echo $r_sub[4] ?></td>
        <td><?php echo $r_sub[5] ?></td>
        <td><a href="smaterial.php?c=<?php echo $c ?>&d=<?php echo $d ?>&s=<?php echo $s ?>&subid=<?php echo $r_sub[5] ?>" class="label label-danger pull-right" title="Upload Study Material"><span class="fa fa-upload"></span></a></td>
    </tr>
<?php       
    }
    ?>    
<?php
}
 else {
     echo"No Subject Found";
}
?>
</table>