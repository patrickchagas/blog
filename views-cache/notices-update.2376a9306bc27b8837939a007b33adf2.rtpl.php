<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Avisos
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Aviso</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/notices/<?php echo htmlspecialchars( $notice["idnotice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="notice">Titulo do aviso</label>
              <input type="text" class="form-control" id="notice" name="notice" placeholder="Digite o titulo do aviso" value="<?php echo htmlspecialchars( $notice["notice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          </div>

          <div class="box-body">
            <div class="form-group">
              <label for="description">Descrição</label>
              <textarea type="text" class="form-control" id="description" name="description" placeholder="Digite a descrição do aviso" value="<?php echo htmlspecialchars( $notice["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <?php echo htmlspecialchars( $notice["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </textarea>
            </div>
          </div>

          <div class="box-body">
           <div class="form-group">
              <label for="publishedby">Publicado por</label>
              <input type="text" class="form-control" id="publishedby" name="publishedby" placeholder="Digite o nome da postagem" value="<?php echo htmlspecialchars( $notice["publishedby"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
           </div>
         </div>

         <div class="box-body">
            <label for="select">Exibir Postagem</label>
               <select class="span6 disabled" id="active" name="active">
                 <option value="sim">Sim</option> 
                 <option value="nao">Não</option>
               </select>  
         </div>

          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->