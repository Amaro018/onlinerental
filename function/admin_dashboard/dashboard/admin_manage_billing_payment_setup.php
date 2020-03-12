<?php 

$str = "";

$str .= '
<div class="container mt-4">
<div class="card" style="border-radius: 1rem; overflow: hidden;">
    <div class="card-header text-white" style="background-color: rgba(9, 15, 126, 0.8)">Payment Setup</div>
          <div class="container-fluid bg-white pt-3" style="border-radius: 5px; overflow: hidden;">
             <div id="body_header" class="mb-3">
               <h3>Payment: &#8369; <span id="payment_used_text">0.00</span></h3>
               <hr/>
               <div class="row">
                <div class="col-sm-9">
                    <input type="number" placeholder="0.00" id="payment_used_input" class="form-control"/>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block btn-primary" onclick="save_payment_setup();">Save</button>
                </div>
               </div>
              </div>
          </div>
</div>
</div>
';

echo $str;