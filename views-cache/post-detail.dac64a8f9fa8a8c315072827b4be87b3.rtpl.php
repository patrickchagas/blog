<?php if(!class_exists('Rain\Tpl')){exit;}?>
		
		
	
	
	<section class="ptb-0">
		<div class="mb-30 brdr-ash-1 opacty-5"></div>
		<div class="container">
			<a class="mt-10" href="/"><i class="mr-5 ion-ios-home"></i>Home<i class="mlr-10 ion-chevron-right"></i></a>
			<a class="mt-10" href="/">Blog Archive<i class="mlr-10 ion-chevron-right"></i></a>
			<a class="mt-10 color-ash" href="single-page.html">Single Blog</a>
		</div><!-- container -->
	</section>
	
	
	<section>
		<div class="container">
			<div class="row">
			
				<div class="col-md-12 col-lg-8">
					<img src="<?php echo htmlspecialchars( $post["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
					<h3 class="mt-30"><b><?php echo htmlspecialchars( $post["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b></h3>
					<ul class="list-li-mr-20 mtb-15">
						<li>by <a href="#"><b><?php echo htmlspecialchars( $post["publishedby"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </b></a> <?php echo formatDate($post["dtregister"]); ?></li>
						<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>30,190</li>
						<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>30</li>
					</ul>
					
					<p class="mtb-20"><?php echo textStyle($post["description"]); ?></p>
						

					<!-- <div class="quote-primary mtb-20">
						<h5>"This Is the first time that there's going to be a smart contract platform powered by the bitcoin network."</h5>
						<h5 class="mt-15"><b>Oliver Dale</b></h5>
					</div> quote-primary -->
						
					<div class="float-left-right text-center mt-40 mt-sm-20">
				
						<ul class="mb-30 list-li-mt-10 list-li-mr-5 list-a-plr-15 list-a-ptb-7 list-a-bg-grey list-a-br-2 list-a-hvr-primary ">

							<?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?>
								<li><a href="/categories/<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
							<?php } ?>
						</ul>
						<ul class="mb-30 list-a-bg-grey list-a-hw-radial-35 list-a-hvr-primary list-li-ml-5">
							<li class="mr-10 ml-0">Share</li>
							<li><a href="#"><i class="ion-social-facebook"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter"></i></a></li>
							<li><a href="#"><i class="ion-social-google"></i></a></li>
							<li><a href="#"><i class="ion-social-instagram"></i></a></li>
						</ul>
						
					</div><!-- float-left-right -->
				
					<div class="brdr-ash-1 opacty-5"></div>
					
					<h4 class="p-title mt-50"><b>YOU MAY ALSO LIKE</b></h4>
					<div class="row">
					
						<div class="col-sm-6">
							<img src="images/crypto-news-2-600x450.jpg" alt="">
							<h4 class="pt-20"><a href="#"><b>2017 Market Performance: <br/>Crypto vs.Stock</b></a></h4>
							<ul class="list-li-mr-20 pt-10 mb-30">
								<li class="color-lite-black">by <a href="#" class="color-black"><b>Olivia Capzallo,</b></a>
								Jan 25, 2018</li>
								<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>30,190</li>
								<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>47</li>
							</ul>
						</div><!-- col-sm-6 -->
						
						<div class="col-sm-6">
							<img src="images/crypto-news-1-600x450.jpg" alt="">
							<h4 class="pt-20"><a href="#"><b>2017 Market Performance: Crypto vs.Stock</b></a></h4>
							<ul class="list-li-mr-20 pt-10 mb-30">
								<li class="color-lite-black">by <a href="#" class="color-black"><b>Olivia Capzallo,</b></a>
								Jan 25, 2018</li>
								<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>30,190</li>
								<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>47</li>
							</ul>
						</div><!-- col-sm-6 -->
						
					</div><!-- row -->
						
					<?php require $this->checkTemplate("commentPost");?>	
					
				</div><!-- col-md-9 -->
				
				<div class="d-none d-md-block d-lg-none col-md-3"></div>
				<div class="col-md-6 col-lg-4">
					<div class="pl-20 pl-md-0">
						<ul class="list-block list-li-ptb-15 list-btm-border-white bg-primary text-center">
							<?php require $this->checkTemplate("categories-menu");?>
						</ul>
						
						<div class="mtb-50">
							<?php require $this->checkTemplate("popularPosts");?>
						</div><!-- mtb-50 -->
						
						<div class="mtb-50 pos-relative">
							<img src="images/banner-1-600x450.jpg" alt="">
							<div class="abs-tblr bg-layer-7 text-center color-white">
								<div class="dplay-tbl">
									<div class="dplay-tbl-cell">
										<h4><b>Available for mobile & desktop</b></h4>
										<a class="mt-15 color-primary link-brdr-btm-primary" href="#"><b>Download for free</b></a>
									</div><!-- dplay-tbl-cell -->
								</div><!-- dplay-tbl -->
							</div><!-- abs-tblr -->
						</div><!-- mtb-50 -->
						
						<?php require $this->checkTemplate("newsLetter");?>
						
					</div><!--  pl-20 -->
				</div><!-- col-md-3 -->
				
			</div><!-- row -->
			
		</div><!-- container -->
	</section>
