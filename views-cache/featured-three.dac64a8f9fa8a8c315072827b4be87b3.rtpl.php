<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="h-1-3 oflow-hidden">

		<?php $counter1=-1;  if( isset($featuredThree) && ( is_array($featuredThree) || $featuredThree instanceof Traversable ) && sizeof($featuredThree) ) foreach( $featuredThree as $key1 => $value1 ){ $counter1++; ?>

		<div class="pr-5 pr-sm-0 pt-5 float-left float-sm-none pos-relative w-1-3 w-sm-100 h-100 h-sm-300x">
			<a class="pos-relative h-100 dplay-block" href="/posts/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			
				<div class="img-bg bg-4 bg-grad-layer-6">
					
					<img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

				</div>
				
				<div class="abs-blr color-white p-20 bg-sm-color-7">
					<h4 class="mb-10 mb-sm-5"><b><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b></h4>
					<ul class="list-li-mr-20">
						<li><?php echo formatDate($value1["dtregister"]); ?></li>
						<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>30,190</li>
						<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>30</li>
					</ul>
				</div><!--abs-blr -->
			</a><!-- pos-relative -->
		</div><!-- w-1-3 -->

		<?php } ?>
		
		
		
	</div><!-- h-2-3 -->