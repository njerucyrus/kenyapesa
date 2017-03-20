<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 19/03/2017
 * Time: 19:06
 */
require_once __DIR__ . '/../models/class.subscription.php';
?>

<!DOCTYPE html>
<html>
<head>
    <?php include "css.php";?>
</head>

<body>
<div class="navbar navbar-inverse">
    <?php include "navbar.php"; ?>
</div>

<!--->

<!--tapped pane-->

<ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Subsribers</a></li>
    <li><a data-toggle="pill" href="#menu1">Message</a></li>
    <li><a data-toggle="pill" href="#menu2">Settings</a></li>
</ul>

<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        
        <div class="container container-fluid">
            <div class="row">
                <div class="col col-md-8 col-md-offset-2" style="margin-top: 100px; margin-bottom: 100px;">
                    <?php
                    $subscription = Subscription::getSubscriberMailingList();
                    if(is_array($subscription)){

                    }
                    ?>
                    <div class="table-responsive"  style="margin-top: 10px;" >

                        <table class="table table-responsive">
                            <thead>
                            <tr style='font-size: 2.0em; text-align: center;' class="bg-primary">
                                <th>Name</th>
                                <th>Email</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $counter=0;
                            $stmt = Subscription::all();
                            if(!is_null($stmt)) {
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    echo "<tr style='font-size: 1.0em; '><td>".$row['name']."</td><td>".
                                        $row['email']." </td>
                              </tr>";
                                    $counter=$counter+1;
                                }
                                $total_subscription = $counter;
                            }
                            ?>
                            </tbody>
                            <?php echo 'Total number of  subscribers is '.$total_subscription?>
                        </table>
                    </div>


                </div>
            </div>
        </div>

    </div>
    <div id="menu1" class="tab-pane fade">
        <h3>Menu 1</h3>
        <p>Some content in menu 1.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
        <h3>Menu 2</h3>
        <p>Some content in menu 2.</p>
    </div>
</div>
<?php include "js.php";?>
</body>
</html>


