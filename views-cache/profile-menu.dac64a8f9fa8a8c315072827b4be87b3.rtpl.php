<?php if(!class_exists('Rain\Tpl')){exit;}?><style type="text/css">
	.notification{
		background: #e67e22;
		border-radius: 50px;
		color: #000;
		display: inline-block;
		font-size: 15px;
		height: 20px;
		padding: 2px;
		position: absolute;
		right: -10px;
		text-align: center;
		width: 30px;
	}
	

</style>


<div class="col-md-4">
    <div class="profile-work">
        <p>EM BREVE NOVAS OPÇÕES</p>
        <!-- <a href="" class="list-group-item list-group-item-action disabled"></a><br/> -->
        <p>Dados Pessoais</p>
        <a href="/profile" class="list-group-item list-group-item-action">Editar Dados</a><br/>
        <a href="/profile/change-password" class="list-group-item list-group-item-action">Alterar Senha</a><br/>
        <a href="/profile/notice" class="list-group-item list-group-item-action">
        	Avisos
        	<?php $counter1=-1;  if( isset($notices) && ( is_array($notices) || $notices instanceof Traversable ) && sizeof($notices) ) foreach( $notices as $key1 => $value1 ){ $counter1++; ?>

	        	<?php if( $value1["active"] == 'sim'  ){ ?> 
	        		<span class="notification"><?php echo getNoticesNrQtd(); ?></span>
	        	<?php }else{ ?>

	        		<span></span>	
	        	<?php } ?>

        	<?php } ?>

    	</a><br/>
        <a href="/logout" class="list-group-item list-group-item-action">Sair</a><br/>
    </div>
</div>