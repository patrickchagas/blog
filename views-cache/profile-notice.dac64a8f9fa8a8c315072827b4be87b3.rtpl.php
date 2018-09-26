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
                <?php $counter1=-1;  if( isset($notices) && ( is_array($notices) || $notices instanceof Traversable ) && sizeof($notices) ) foreach( $notices as $key1 => $value1 ){ $counter1++; ?>
                  <?php if( $value1["active"] == 'sim'  ){ ?>
                    <div class="alert alert-success" role="alert">
                      <h4 class="alert-heading"><?php echo textStyle($value1["notice"]); ?>!</h4>
                      <p><?php echo textStyle($value1["description"]); ?></p>
                    </div>
                  <?php } ?> 
                <?php } ?>                     

                </div>
            </div>
        </div>        
</div>
</div>