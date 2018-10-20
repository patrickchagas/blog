<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="pb-5 pr-5 pr-sm-0 float-left float-sm-none w-2-3 w-sm-100 h-100 h-sm-300x">

	<?php $counter1=-1;  if( isset($featured) && ( is_array($featured) || $featured instanceof Traversable ) && sizeof($featured) ) foreach( $featured as $key1 => $value1 ){ $counter1++; ?>	

		<a class="pos-relative h-100 dplay-block" href="/posts/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

		<div class="bg-1 bg-grad-layer-6">
		
			<img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">	


		</div>

		<div class="abs-blr color-white p-20 bg-sm-color-7">
			
			<h3 class="mb-15 mb-sm-5 font-sm-13"><b><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b></h3>
			<ul class="list-li-mr-20">
				<li>by <span class="color-primary"><b><?php echo htmlspecialchars( $value1["publishedby"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b></span>   <?php echo formatDate($value1["dtregister"]); ?></li>
				<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>30,190</li>
				<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>30</li>
			</ul>
		</div><!--abs-blr -->

	

		</a><!-- pos-relative -->
	<?php } ?>

</div><!-- w-1-3 -->