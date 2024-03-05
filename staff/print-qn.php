<?php
include '../connection.php';
if(isset($_GET['xamid']))
{
    $xid=$_GET['xamid'];
    $selx=mysqli_query($dbcon,"select * from xam_data where id='$xid'");
    $rx=mysqli_fetch_row($selx);
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <DIV style="float: right;">
            Date : <?php echo date('d-M-Y', strtotime($rx[6])) ?><br />Mark : <?php echo $rx[7] ?>
        </DIV><br />
    <center>
        <h2>CHRIST NAGAR COLLEGE</h2>
        <?php
        echo "<h3>$rx[5]</h3>";
        ?>
    </center>
    <?php
    $sel1=mysqli_query($dbcon,"select * from xam_qn where xamid='$xid'");
    while($r1=mysqli_fetch_row($sel1))
    {
        ?>
    <b>Section - <?php echo $r1[2] ?>, Total Question(s) <?php echo $r1[5] ?>, Answer <?php echo $r1[6] ?><span style="float: right;">
            (<?php 
            $mk=$r1[4]*$r1[6];
            echo "$r1[4] x $r1[6] = $mk"; ?>)</span></b><br />
    <div>
    <?php
        $chk=mysqli_query($dbcon,"select * from xam_ans where xamid='$xid' and xamqid='$r1[0]'");
        if(mysqli_num_rows($chk)>0)
        {
            $i=0;
            while($rc=mysqli_fetch_row($chk))
            {
                $i++;
                $qid=$rc[3];
                $selq=mysqli_query($dbcon,"select * from qn_bank where id='$qid'");
                $rq=mysqli_fetch_row($selq);
                echo"$i. $rq[1]";
            }
        }
        else{
            $subid=$rx[4];
            $mrk=$r1[4];
            $lmt=$r1[5];
            $selq2=mysqli_query($dbcon,"select * from qn_bank where subid='$subid' and mrk='$mrk' order by rand() limit $lmt");
            $i=0;
            while($rq2=mysqli_fetch_row($selq2))
            {
                $i++;
                echo "<span style='float:left;'>$i. </span>$rq2[1]";
            }            
        }
        ?>
    </div>
        <?php
    }
    ?>
    </body>
</html>
<script>
    window.print();
    </script>
    
