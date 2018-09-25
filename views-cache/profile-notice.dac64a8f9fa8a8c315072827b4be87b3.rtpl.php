<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Minha Conta</h2>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="profile-background">
<div class="container emp-profile">
        <div class="row">
            <?php require $this->checkTemplate("profile-menu");?>
            <div class="col-md-8">

                    <div class="alert alert-success" role="alert">
                      <h4 class="alert-heading">Well done!</h4>
                      <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                      <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                    </div>

                    <div class="alert alert-success" role="alert">
                      <strong>Well done!</strong> You successfully read this important alert message.
                    </div>

                    <div class="alert alert-info" role="alert">
                      <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                    </div>

                    <div class="alert alert-warning" role="alert">
                      <strong>Warning!</strong> Better check yourself, you're not looking too good.
                    </div>

                    <div class="alert alert-danger" role="alert">
                      <strong>Oh snap!</strong> Change a few things up and try submitting again.
                    </div>
                                     

                </div>
            </div>
        </div>        
</div>
</div>