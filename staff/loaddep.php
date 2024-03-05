<?php
include '../connection.php';
$q=$_GET['q'];
$sel_d=mysqli_query($dbcon,"select * from dep_info where crsid='$q'");
if(mysqli_num_rows($sel_d)>0)
{
    ?>
<select name="dep" id="dep" class="form-control">
<?php
    while($rd=mysqli_fetch_row($sel_d))
    {
        ?>
    <option value="<?php echo $rd[0] ?>"><?php echo $rd[2] ?></option>
    <?php
    }
    ?>
</select>
    <?php
}
else
{
    ?>
<select name="dep" class="form-control">
<option value="">Choose</option>
</select>
<?php
}
?>