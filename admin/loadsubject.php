<table class="table table-bordered table-responsive table-hover">
<?php
include '../connection.php';
$c=$_GET['c'];
$d=$_GET['d'];
$s=$_GET['s'];
$sid=$_GET['sid'];
$sel_subj=mysqli_query($dbcon,"select * from syllabus_data where crsid='$c' and depid='$d' and sem='$s'");
if(mysqli_num_rows($sel_subj)>0)
{
    
    while($r_sub=mysqli_fetch_row($sel_subj))
    {
        $subid=$r_sub[5];
        $chk=mysqli_query($dbcon,"select * from subjct_assign where subnme='$subid' and stf_id='$sid'");
        if(mysqli_num_rows($chk)>0)
        {
            
        }
        else
        {
        ?>
    <tr>
        <td>
            <input type="checkbox" name="su[]" value="<?php echo $r_sub[0] ?>:<?php echo $r_sub[5] ?>" /> <?php echo $r_sub[4] ?> 
        </td>
        <td>
        (<?php echo $r_sub[5] ?>)</span>
        </td>
    </tr>
<?php
        }
    }
    ?>
    <tr>
        <td colspan="2">
    <center>
        <input type="submit" name="sub1" value="ASSIGN SUBJECT" class="btn btn-sm btn-primary" /></center>
</td>
</tr>
<?php
}
 else {
     echo"No Subject Found";
}
?>
</table>