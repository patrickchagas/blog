<?php if(!class_exists('Rain\Tpl')){exit;}?><h4 class="p-title mt-20"><b>03 COMMENTS</b></h4>

<div class="sided-70 mb-40">
<?php $counter1=-1;  if( isset($comment) && ( is_array($comment) || $comment instanceof Traversable ) && sizeof($comment) ) foreach( $comment as $key1 => $value1 ){ $counter1++; ?>	
	<div class="s-left rounded">
		<img src="/res/site/images/profile-4.jpg" alt="">
	</div><!-- s-left -->

<div class="s-right ml-100 ml-xs-85">

	<h5><b><?php echo htmlspecialchars( $value1["nameuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, </b> <span class="font-8 color-ash"><?php echo formatDate($value1["dtregister"]); ?></span></h5>
	<p class="mtb-15"><?php echo htmlspecialchars( $value1["message"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
	<a class="btn-brdr-grey btn-b-sm plr-15 mr-10 mt-5" href="#"><b>LIKE</b></a>
	<a class="btn-brdr-grey btn-b-sm plr-15 mt-5" href="#"><b>REPLY</b></a>
<?php } ?>	
</div><!-- s-right -->

</div><!-- sided-70 -->

<h4 class="p-title mt-20"><b>LEAVE A COMMENT</b></h4>

<form class="form-block form-plr-15 form-h-45 form-mb-20 form-brdr-lite-white mb-md-50" action="#" method="post">



	<input type="text" placeholder="Your Name*:" value="<?php echo getUserName(); ?>">
	
	<input type="text" placeholder="Your Email*:">

	<input type="text" placeholder="Your Phone*:">


	<textarea class="ptb-10" placeholder="Your Comment"></textarea>

	<button class="btn-fill-primary plr-30" rows="4" cols="50" type="submit"><b>LEAVE A COMMENT</b></button>
</form>