<?php
error_reporting(0);
include '../connection.php';
session_start();

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
        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="../admin_tmplate/assets/css/bootstrap.css" />
        <link rel="stylesheet" href="../admin_tmplate/assets/css/font-awesome.css" />
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6"><br />
                    <table class="table table-bordered table-responsive table-striped">
                        <tr>
                            <td>
                        <center>
                            <h3>
                                <?php echo $title ?>
                            </h3>
                            <b>IDENTITY CARD :: EXAM INVIGILATOR</b>
                        </center>
                            </td>                            
                        </tr>
                        <tr>
                            <td><center>
                                <iframe src="QR\qrcode.php?id=<?php echo $_GET['sid'] ?>" style="border:none; height: 100px; width: 100px;"></iframe>
                        </center>
                            </td>
                        </tr>
                        <tr>
                            <td><center><b>
                                Please Scan the QR Code to Login</b></center>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </body>
</html>
