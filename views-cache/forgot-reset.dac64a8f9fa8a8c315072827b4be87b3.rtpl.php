<?php if(!class_exists('Rain\Tpl')){exit;}?><style type="text/css">

    .forgot-big-title-area {
        background: url("/res/site/images/crossword.png") repeat scroll 0 0 #e67e22;
        width: 100%;
    }
    .forgot-bit-title h2 {
      font-family: raleway;
      font-size: 50px;
      font-weight: 200;
      margin: 0;
      padding: 50px 0;
      color: #fff
    }


    .forgot-product-area .zigzag-bottom {background-color: #f4f4fs4}

    .forgot-product-area {
      padding: 80px 0 130px;
    }

    #login-form-wrap, #coupon-collapse-wrap {
    background: none repeat scroll 0 0 #fff;
    margin-bottom: 30px;
    padding: 25px;
    }
    #login-form-wrap label {
        display: block;
        margin-bottom: 5px;
    }
    #login-form-wrap input[type="text"], #login-form-wrap input[type="password"] {
        margin-bottom: 10px;
        width: 250px;
    }
    #login-form-wrap input[type="submit"] {
        margin-bottom: 15px;
    }

    .form-row{
        padding: 20px 0px 0px 0px;
    }


</style>    


<div class="forgot-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="forgot-bit-title text-center">
                    <h2>Esqueceu a Senha?</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="forgot-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">                
            <div class="col-md-12">
                <form id="login-form-wrap" class="login" method="post" action="/forgot/reset">

                    <input type="hidden" name="code" value="<?php echo htmlspecialchars( $code, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <h2 class="title-forgot">Olá <?php echo htmlspecialchars( $name, ENT_COMPAT, 'UTF-8', FALSE ); ?>, digite uma nova senha:</h2>
                    <p class="form-row form-row-first">
                        <label for="password" class="subtitle-forgot">Nova senha <span class="required">*</span>
                        </label>
                        <input type="password" id="password" name="password" class="input-text" style="width:350px">
                    </p>

                    <div class="clear"></div>

                    <p class="form-row">
                        <input type="submit" value="Enviar" name="login" class="btn btn-primary">
                        
                    </p>

                    <div class="clear"></div>
                </form>                    
            </div>
        </div>
    </div>
</div>