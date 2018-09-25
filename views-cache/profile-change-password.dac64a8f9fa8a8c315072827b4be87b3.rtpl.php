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
                         <form action="/profile/change-password" method="post">
                    <div class="form-group">
                    <label for="current_pass">Senha Atual</label>
                    <input type="password" class="form-control" id="current_pass" name="current_pass">
                    </div>
                    <hr>
                    <div class="form-group">
                    <label for="new_pass">Nova Senha</label>
                    <input type="password" class="form-control" id="new_pass" name="new_pass">
                    </div>
                    <div class="form-group">
                    <label for="new_pass_confirm">Confirme a Nova Senha</label>
                    <input type="password" class="form-control" id="new_pass_confirm" name="new_pass_confirm">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
                 

                </div>
            </div>
        </div>        
</div>
</div>