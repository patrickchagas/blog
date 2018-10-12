<?php if(!class_exists('Rain\Tpl')){exit;}?>Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Visitantes
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/notices">Avisos</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
            
            <div class="box-header">
              <a href="/admin/notices/create" class="btn btn-success">Cadastrar Aviso</a>

              <div class="box-tools">
                <form action="/admin/visits">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>

            </div>

            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 150px">#Número do Visitante</th>
                    <th>IP do Visitante</th>
                    <th>Data da Visita</th>
                    <th>Hora da visita</th>
                    <th style="width: 20px">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                 <?php $counter1=-1;  if( isset($visits) && ( is_array($visits) || $visits instanceof Traversable ) && sizeof($visits) ) foreach( $visits as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    <td><?php echo htmlspecialchars( $value1["idvisits"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["ip"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo formatDate($value1["data"]); ?></td>
                    <td><?php echo htmlspecialchars( $value1["hora"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  </tr>
                 <?php } ?>

                </tbody>
              </table>
            </iv>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>

                <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>

              </ul>
            </div>
    
          </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper