<?php

use \Pcode\PageAdmin;
use \Pcode\Model\User;
use \Pcode\Model\Category;
use \Pcode\Model\Post;

//Rota pra acessar a pagina categorias
$app->get('/admin/categories', function() {

	//Verificar se o usuário está logado
	User::verifyLogin();

	//Listar todas categorias
	$categories = Category::listAll();

	$page = new PageAdmin();

	$page->setTpl('categories', array(
		"categories"=>$categories
	));

});

//Tela de cadastro de categorias
$app->get('/admin/categories/create', function() {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl('categories-create');

});

//Deletar um categoria
$app->get('/admin/categories/:idcategory/delete', function($idcategory) {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->delete();

	header("Location: /admin/categories");
	exit;
});


//Cadastrar Categoria
//Enviar o que foi digitado no formulário para o banco
$app->post('/admin/categories/create', function () {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$category = new Category();

	$category->setData($_POST);

	$category->save();

	header("Location: /admin/categories");
	exit;

});

//Salvar a edição da categoria no banco
$app->post('/admin/categories/:idcategory', function($idcategory) {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->setData($_POST);

	$category->save();

	header("Location: /admin/categories");
	exit;

});

//Template de edição de categoria
$app->get('/admin/categories/:idcategory', function($idcategory) {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$category = new Category();

	//Carregar uma categoria
	$category->get((int)$idcategory);

	$page = new PageAdmin();

	$page->setTpl("categories-update", array(
		"category"=>$category->getValues()
	));

});


//Tela de Postagens VS Categorias
$app->get('/admin/categories/:idcategory/posts', function($idcategory) {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$page = new PageAdmin();

	$page->setTpl("categories-posts", array(
		'category'=>$category->getValues(),
		'postsRelated'=>$category->getPosts(),
		'postsNotRelated'=>$category->getPosts(false)
	));
	
});

//Adicionar uma postagem em uma categoria
$app->get('/admin/categories/:idcategory/posts/:idpost/add', function($idcategory, $idpost) {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$post = new Post();

	$post->get((int)$idpost);

	$category->addPost($post);

	header("Location: /admin/categories/".$idcategory."/posts");
	exit;

});

//Remover uma postagem de uma categoria
$app->get('/admin/categories/:idcategory/posts/:idpost/remove', function($idcategory, $idpost) {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$post = new Post();

	$post->get((int)$idpost);

	$category->removePost($post);

	header("Location: /admin/categories/".$idcategory."/posts");
	exit;

});




?>