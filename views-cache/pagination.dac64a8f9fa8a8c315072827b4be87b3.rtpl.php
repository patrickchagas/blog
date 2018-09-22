<?php if(!class_exists('Rain\Tpl')){exit;}?><style type="text/css">
	.pagination{
		padding: 20px;
	}	
	.page-link {
		background: #000;
	}

</style>

<nav aria-label="...">
  <ul class="pagination justify-content-center">
   	<?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
   	
	    <li class="page-item"><a class="page-link" href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
	 
    <?php } ?>
  </ul>
</nav>