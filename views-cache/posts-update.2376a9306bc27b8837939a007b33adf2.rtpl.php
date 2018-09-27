<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Postagens
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Postagem</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/posts/<?php echo htmlspecialchars( $post["idpost"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="title">Nome da Postagem</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Digite o Titulo da postagem" value="<?php echo htmlspecialchars( $post["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
              
            <div class="form-group">
              <label for="description">Descrição</label>
              <textarea  type="text" class="form-control" id="description" name="description" placeholder="Digite sobre a postagem" rows="12" value="<?php echo htmlspecialchars( $post["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $post["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
            </div>

            <div class="form-group">
              <label for="desurl">Url</label>
              <input type="text" class="form-control" id="desurl" name="desurl" placeholder="Digite o nome da postagem" value="<?php echo htmlspecialchars( $post["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="publishedby">Publicado por</label>
              <input type="text" class="form-control" id="publishedby" name="publishedby" placeholder="Digite o nome da postagem" value="<?php echo htmlspecialchars( $post["publishedby"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="select">Exibir Postagem</label>
                <select class="span6 disabled" id="active" name="active">
                     <option value="sim">Sim</option> 
                     <option value="nao">Nao</option>
                </select>  
            </div>

  
            <div class="form-group">
              <label for="file">Foto de Perfil</label>
              <input type="file" class="form-control" id="file" name="file" value="">
              <div class="box box-widget">
                <div class="box-body">
                  <img class="img-responsive" id="image-preview" src="<?php echo htmlspecialchars( $post["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo" width="550px">
                </div>
              </div>
            </div>

          </div>
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


<script>
document.querySelector('#file').addEventListener('change', function(){
  
  var file = new FileReader();

  file.onload = function() {
    
    document.querySelector('#image-preview').src = file.result;

  }

  file.readAsDataURL(this.files[0]);

});
</script>