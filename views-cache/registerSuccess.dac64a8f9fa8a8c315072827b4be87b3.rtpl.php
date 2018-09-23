<?php if(!class_exists('Rain\Tpl')){exit;}?>
<style type="text/css">
     .text-center{
        text-align: center;
        padding: 90px;
        color: red;
        font-size: 18px;
     }   

</style>

<div class="container">
	<div class="row text-center">
        <div class="col-sm-12 col-sm-offset-3">
            <br><br> <h2 style="color:#0fad00" class="alert alert-success">Success - Welcome</h2>
            <img src="{http://osmhotels.com//assets/check-true.jpg}">
            <h3>Hello, <?php echo getUserName(); ?> !</h3>
            <!-- <p style="font-size:20px;color:#5C5C5C;">Thank you for verifying your Mobile No.We have sent you an email "" with your details
            Please go to your above email now and login.</p>
            <a href="" class="btn btn-success">     Log in      </a><br><br> -->
        </div>
        
	</div>
</div>