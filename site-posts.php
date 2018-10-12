<?php

use \Pcode\Page;
use \Pcode\Model\Post;
use \Pcode\Model\Comment;

//Detalhes da postagem
$app->get('/posts/:desurl', function($desurl) {
	$post = new Post();

	$post->getFromURL($desurl);
	
	//Comentários
	$comment = new Comment();

	$comment = Comment::listCommentPost(); // listar todos os comentários


	$page = new Page();

	$page->setTpl("post-detail", array(
		'post'=>$post->getValues(),
		'categories'=>$post->getCategories(),
		'comment'=>$comment // mostrar conteudo dos comentários no template
	));

});



//Cadastrar um novo comentário
$app->post('/posts/:desurl', function($desurl) {

	$comment = new Comment();

	$comment->setData($_POST);

	$comment->save();

	header("Location: /posts/$desurl");
	exit;
		
});


?>