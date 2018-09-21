<?php

use \Pcode\PageAdmin;
use \Pcode\Model\User;
use \Pcode\Model\Category;

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


?>