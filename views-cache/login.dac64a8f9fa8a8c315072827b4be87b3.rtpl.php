<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <img src="/res/site/images/logo.jpg">
                    </div>
                 <form action="/login" method="post"> 

                    <?php if( $error != '' ){ ?>

                        <div class="alert alert-danger">
                            <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                        </div>
                    <?php } ?>    
                        
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Login</h4>
                            <form method="POST">

                                <div class="form-group">
                                    <label for="login">E-Mail Address</label>

                                    <input id="text" type="login" class="form-control" name="login" value="">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password
                                        <a href="/forgot" class="float-right">
                                            Forgot Password?
                                        </a>
                                    </label>
                                    <input id="password" type="password" class="form-control" name="password" required data-eye>
                                </div>

                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>

                                <div class="form-group no-margin">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Login
                                    </button>
                                </div>
                                <div class="margin-top20 text-center">
                                    Don't have an account? <a href="/register">Create One</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>                     
                </div>
            </div>
        </div>
    </section>
 </div>   