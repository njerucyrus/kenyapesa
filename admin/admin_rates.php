<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/17/17
 * Time: 10:41 PM
 */
require_once __DIR__.'/../models/class.rate.php';
require_once __DIR__.'/../models/class.limits.php';
?>
<!DOCTYPE html>
<html>
<head>
    <?php include('css.php')?>
</head>
<body>
<div class="navbar navbar-inverse">
    <?php include "navbar.php"; ?>
</div>
<div class="container container-fluid">
    <div class="row">
        <div class="col col-md-4">
            <form class="">
                <div class="form-group" role="form">
                    <label for="min_dollar">Minimum Dollar Limit </label>
                    <input type="number" class="form-control" id="min_dollar" disabled>
                </div>
                <div class="form-group">
                    <label for="max_dollar">Maximum Dollar Limit </label>
                    <input type="number" class="form-control" id="max_dollar" disabled>
                </div>

                <div class="form-group">
                    <label for="max_dollar">Dollar Exchange Rate </label>
                    <input type="number" class="form-control" id="max_dollar" disabled>
                </div>
                <div class="" style="margin-top: 10px;" >
                    <button id="btn_limits" type="button" class=" btn btn-primary">Edit</button>
                </div>

            </form>
        </div>

    <div class="col col-md-8">

        <div class="table-responsive" style="margin-top: 10px;">
            <table class="table">
                <thead>
                <tr class="bg-primary">
                    <td>From </td>
                    <td>To</td>
                    <td>Fixed Dollar Charges</td>
                    <td>Rate Charges(%)</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $rates = Rate::all();
                if(!is_null($rates)){
                    while ($rate = $rates->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td><?php echo $rate['min_value']?> $</td>
                            <td><?php echo $rate['max_value']?> $</td>
                            <td><?php echo $rate['fixed_dollar']?> $</td>
                            <td><?php echo $rate['percentage']?> %</td>
                            <td colspan="2"><a href="#" class="btn btn-xs btn-primary">Edit</a>
                            <a href="#" class="btn btn-xs btn-danger">Delete</a> </td>
                        </tr>


                <?php
                    }
                }

                ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
</div>

</body>



</html>
