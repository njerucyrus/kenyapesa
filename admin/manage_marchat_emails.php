<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/22/17
 * Time: 4:14 PM
 */
require_once __DIR__.'/../models/class.merchant.php';
?>
<!DOCTYPE html>
<html>
<head>
    <?php include __DIR__.'/navbar.php'?>
</head>
<body>
<div class="navbar navbar-inverse">
    <?php include 'navbar.php' ?>
</div>

<div class="container container-fluid">
    <div class="row">
        <div class="col col-md-10 col-md-offset-1">
            <div class="table table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Merchant Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>



                </table>
            </div>
        </div>

    </div>
</div>




</body>
</html>

