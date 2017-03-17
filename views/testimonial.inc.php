<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 16/03/2017
 * Time: 00:36
 */
require_once __DIR__.'/models/class.feedback.php';
require_once __DIR__.'/models/user.php';
?>

<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
<div class="video_overlay">
    <div class="container">
        <div class="row">
            <div class="main_testimonial sections text-center">
                <div class="col-md-12" data-wow-delay="0.2s">
                    <div class="main_teastimonial_slider text-center">

                        <?php
                        $stmt = UserFeedback::all();
                        if(is_object($stmt)) {
                            while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $user = User::getId($row['user_id']);
                                    $userData = $user->fetch(PDO::FETCH_ASSOC);

                                    $first_name = $userData['first_name'];
                                    $last_name = $userData['last_name'];


                                ?>

                                <div class="single_testimonial">
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <i class="fa fa-quote-left"></i>
                                            <p><?php echo $row['text'];?></p>
                                            <div class="single_test_author">
                                                <h4><?php echo $first_name . " ".$last_name; ?> </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        }
                       ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
