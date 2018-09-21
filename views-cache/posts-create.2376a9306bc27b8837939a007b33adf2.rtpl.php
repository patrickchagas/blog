<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Postagens
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/categories">Categorias</a></li>
    <li class="active"><a href="/admin/categories/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Nova Postagem</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/posts/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="title">Titulo da postagem</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Digite o titulo do post">
            </div>

            <div class="form-group">
              <label for="description">Descrição</label>
              <input type="text" class="form-control" id="description" name="description" placeholder="Digite a descrição do post">
            </div>

            <div class="form-group">
              <label for="desurl">Url</label>
              <input type="text" class="form-control" id="desurl" name="desurl" placeholder="Digite a descrição do post">
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="active" value="sim"> Exibir Postagem
              </label>
            </div>

           
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->