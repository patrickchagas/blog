<?php

use \Pcode\PageAdmin;
use \Pcode\Model\User;
use \Pcode\Model\Post;

//Lista de postagens
$app->get('/admin/posts', function () {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$posts = Post::listAll();

	$page = new PageAdmin();

	$page->setTpl('posts', array(
		'posts'=>$posts
	));

});

//Tela do cadastro de Posts
$app->get('/admin/posts/create', function() {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl('posts-create');

});

//Deletar uma Postagem
$app->get('/admin/posts/:idpost/delete', function($idpost) {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$post = new Post();

	$post->get((int)$idpost);

	$post->delete();

	header("Location: /admin/posts");
	exit;

});

//Cadastrar Postagem
$app->post('/admin/posts/create', function() {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$post = new Post();

	$post->setData($_POST);

	$post->save();

	header("Location: /admin/posts");
	exit;
});

//Tela de edição de postagem
$app->get('/admin/posts/:idpost', function ($idpost) {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$post = new Post();

	$post->get((int)$idpost);

	$page = new PageAdmin();

	$page->setTpl('posts-update', array(
		"post"=>$post->getValues()
	));

});

//Salvar edição de postagem
$app->post('/admin/posts/:idpost', function($idpost) {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$post = new Post();

	$post->get((int)$idpost);

	$post->setData($_POST);

	$post->save();

	//Coloquei esse if para não dar erro, caso eu não mude a imagem da postagem
	if($_FILES["file"]["name"] !== "") $post->setPhoto($_FILES["file"]);

	header("Location: /admin/posts");
	exit;

});





?>