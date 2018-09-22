<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="float-left float-sm-none w-1-3 w-sm-100 h-100 h-sm-600x">
			
			<?php $counter1=-1;  if( isset($featuredTwo) && ( is_array($featuredTwo) || $featuredTwo instanceof Traversable ) && sizeof($featuredTwo) ) foreach( $featuredTwo as $key1 => $value1 ){ $counter1++; ?>		

			<div class="pl-5 pb-5 pl-sm-0 ptb-sm-5 pos-relative h-50">
				<a class="pos-relative h-100 dplay-block" href="<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				
					<div class="img-bg bg-2 bg-grad-layer-6">
							
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


</div><!-- float-left -->