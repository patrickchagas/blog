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
    <form>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="/res/site/images/padrao.jpeg" alt="" style="width: 175px;" />
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                            <h5>
                                <?php echo getUserName(); ?>

                            </h5>
                            <h6>
                                Web Developer
                            </h6>
                            <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </form>    
        <div class="row">

                <?php require $this->checkTemplate("profile-menu");?>


            <div class="col-md-8">
                    <?php if( $profileMsg != ''  ){ ?>

                    <div class="alert alert-success" role="alert">
                        <?php echo htmlspecialchars( $profileMsg, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                    </div>
                    <?php } ?>


                     <?php if( $profileError != ''  ){ ?>

                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars( $profileError, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                    </div>
                    <?php } ?>



                    <div>
                        <form action="/profile" method="post" class="profile-form">
                        <div class="row">

                            <div class="col-md-6">
                                <label class="profile-input">Nome</label>
                            </div>

                            <div class="col-md-6">
                                <input type="text" class="form-control profile-input" id="person" name="person" placeholder="Digite o nome aqui" value="<?php echo htmlspecialchars( $user["person"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="profile-input">E-mail</label>
                            </div>

                            <div class="col-md-6">
                                <input type="email" class="form-control profile-input" id="email" name="email" placeholder="Digite o e-mail aqui" value="<?php echo htmlspecialchars( $user["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="profile-input">Phone</label>
                            </div>

                            <div class="col-md-6">
                                <input type="tel" class="form-control profile-input" id="phone" name="phone" placeholder="Digite o telefone aqui" value="<?php echo htmlspecialchars( $user["phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>

                        
                    </form>        
                    </div>
                </div>
            </div>
        </div>        
</div>
</div>