<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/17/17
 * Time: 5:38 PM
 */

require_once __DIR__.'/models/class.rate.php';
require_once __DIR__.'/models/class.limits.php';

?>

<div class="container container-fluid">
    <div class="row">
        <div class="col col-md-8 col-md-offset-2" style="margin-top: 100px; margin-bottom: 100px;">
            <?php
            $limit = Limit::getCurrentExchangeRate();
            if(is_array($limit)){
                echo "<h6 style='font-weight: bold; font-size: 1.5em;'> 1 USD = ".$limit['exchange_rate']."KSH</h6>";
            }
            ?>
            <div class="table-responsive" style="background-color: rgba(0,0,0,0.14)">
                <table class="table">
                    <thead>
                    <tr style='font-size: 2.0em;'>
                        <th>From</th>
                        <th>To</th>
                        <th>Fixed Charges</th>
                        <th>Rate Charges Fee</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $stmt = Rate::all();
                    if(is_object($stmt)) {
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                           echo "<tr style='font-size: 2.0em;'><td>".$row['min_value']." &#36;</td>".
                               "<td>".$row['max_value']." &#36;</td><td>".
                               $row['fixed_dollar']." &#36;</td><td>".
                               $row['percentage']." &#37;</td>
                              </tr>";

                        }

                    }
                    ?>
                    </tbody>

                </table>
            </div>
            <div style="margin-top: 10px;">
                <a href="convert.php" class="btn btn-primary" style="background-color: #0099e5; border-color: #0099e5;">Convert Now</a>
            </div>

        </div>
    </div>
</div>

