<?php
session_start();
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/20/17
 * Time: 4:14 PM
 */
include_once __DIR__.'/../models/user.php';

$userObject = User::getById($_SESSION['username']);
$user = $userObject->fetch(PDO::FETCH_ASSOC);
$user_id = $user['id'];

?>
<script src="../public/assets/js/jquery-3.1.1.min.js"></script>
<script src="../public/assets/js/jquery.js"></script>
<script src="../public/assets/js/bootstrap.min.js"></script>


<div class="container container-fluid" style="margin-top: 50px;">
    <div class="row">

        <div class="col col-md-6 col-md-offset-3">

            <div class="alert alert-info">
                <p>Your transaction was completed successfully.
                    You will receive you Cash in you Mpesa Account in a moment.
                </p>
                <button  class="btn btn-primary">Review our services here</button>
            </div>

            <div class="alert alert-success" id="feedback" ></div>

            <form id="review_form">
                <div class="form-group">
                    <label for="review_form">Review Message</label>
                    <textarea class="form-control" id="review_msg">

                    </textarea>
                </div>
                <div>
                    <button id="btn_submit_review" onclick="submitReview()" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    var url = 'submit_review_endpoint.php';
    function submitReview() {
        var text = $('#review_msg').val();
        var data = {"user_id":"3", "review": "djdjdd" };
        console.log('data', data);
        $.ajax(
            {
                type: 'POST',
                url: url,
                data: data,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                }
            });
    }
</script>
