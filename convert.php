<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/16/17
 * Time: 10:19 PM
 */
include(__DIR__.'/models/class.calculator.php');



?>
<script src="public/assets/js/jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function (e) {
        e.preventDefault;

    })
</script>
<script>

    function checkLimit() {
        var value = $('#dollars').val();
        var url = 'limits.php';
        $.ajax(
            {
                type: 'GET',
                url: url,
                dataType: 'json',
                success: function (data) {
                    if (typeof data['error'] == 'undefined'){
                        var min = parseFloat(data['min']);
                        var max = parseFloat(data['max']);
                        console.log("min ", min);
                        console.log("max ", max);
                        var amt = parseFloat(value);
                        if (amt < min ){
                            $('#shillings').text('amount less than allowed minimum of '+min+' dollars');
                        }
                        else if (amt > max) {
                            $('#shillings').text('amount more than allowed maximum of '+max+' dollars');
                        } else {
                            calculate();
                        }
                    }
                }
            }
        )
    }
    function calculate() {
        var url = 'calc.php';
        var value = $('#dollars').val();

        console.log('sending', value);
        $.ajax(
            {
                type: 'POST',
                url: url,
                data: {'value': value },
                dataType: 'json',
                success: function (data) {
                  $('#shillings').text(data['amount']);
                }
            }
        )
    }
</script>

<div class="container">
    <div class="col col-md-6 col-md-offset-3">
        <form class="form-group">
            <input type="text" onkeyup="checkLimit()" class="form-control" name="dollars" id="dollars" placeholder="Enter Amount in Dollars">
            <p style="font-size: 1.5em; ">You will get Ksh: <span id="shillings">0.0</span></p>
            <input type="submit" value="checkout" class="btn btn-primary" style="background-color:#0099e5;border-color:#0099e5;margin-top: 10px;">
        </form>
    </div>

</div>
