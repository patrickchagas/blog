<?php

use \Pcode\Page;
use \Pcode\Model\Category;
use \Pcode\Model\Post;
use \Pcode\Model\User;

//Página Inicial
$app->get('/', function() {

	$page = new Page();

	//Listar todas as postagens
	$posts = Post::listAll();

	$featured = Category::featured();

	$featuredTwo = Category::featuredTwo();

	$featuredThree = Category::featuredThree();

	// var_dump($categories);
	// exit;

	$page->setTpl("index", array(
		'posts'=>Post::checkList($posts),
		'featured'=>Category::checkList($featured),
		'featuredTwo'=>Category::checkList($featuredTwo),
		'featuredThree'=>Category::checkList($featuredThree)
	));

});

//Categorias do Site
$app->get('/categories/:idcategory', function($idcategory) {

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1; 

	$category = new Category();

	$category->get((int)$idcategory);

	$pagination = $category->getPostsPage($page);

	$pages = [];

		for ($i = 1; $i <= $pagination['pages']; $i++){

			array_push($pages, [
				'link'=>'/categories/'.$category->getidcategory()."?page=".$i,
				'page'=>$i
			]);
		}

	$page = new Page();

	$page->setTpl("category", array(
		'category'=>$category->getValues(),
		'posts'=>$pagination["data"],
		'pages'=>$pages
	));

});

//Detalhes da postagem
$app->get('/posts/:desurl', function($desurl) {

	$post = new Post();

	$post->getFromURL($desurl);

	$page = new Page();

	$page->setTpl("post-detail", array(
		'post'=>$post->getValues(),
		'categories'=>$post->getCategories()
	));

});


$app->get('/login/success', function() {

	User::verifyLogin(false);

	$page = new Page();

	$page->setTpl("loginSuccess");
});



//Tela de Login
$app->get('/login', function() {

	$page = new Page();

	$page->setTpl('login', array(
		'error'=>User::getError()
	));

});


//Enviar os dados do formulário
$app->post('/login', function() {

	try{

		User::login($_POST['login'], $_POST['password']);

	}catch(Exception $e){

		User::setError($e->getMessage());

	}

	header("Location: /login/success");
	exit;

});

//deslogar do site

$app->get('/logout', function() {

	User::logout();

	header("Location: /login");
	exit;

});


?>