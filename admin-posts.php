<?php

use \Pcode\PageAdmin;
use \Pcode\Model\User;
use \Pcode\Model\Post;

//Lista de postagens
$app->get('/admin/posts', function () {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "" ;
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if($search != ''){

		$pagination = Post::getPageSearch($search, $page);

	} else {

		$pagination = Post::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++) { 
		array_push($pages, [
			'href'=>'/admin/posts?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);
	}
	
	$page = new PageAdmin();

	$page->setTpl('posts', array(
		'posts'=>$pagination['data'],
		'search'=>$search,
		'pages'=>$pages
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

//Alterar uma postagem
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

	//Salvar uma nova imagem apenas se ela existir
	// if ((int)$_FILES["file"]["size"] > 0) {
 //        $post->setPhoto($_FILES["file"]);
 //    }

	//Coloquei esse if para não dar erro, caso eu não mude a imagem da postagem
	if($_FILES["file"]["name"] !== "") $post->setPhoto($_FILES["file"]);

	header("Location: /admin/posts");
	exit;

});





?>