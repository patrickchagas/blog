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

//Quando for logar com sucesso
$app->get('/login/success', function() {

	User::verifyLogin(false);

	$page = new Page();

	$page->setTpl("loginSuccess");
});

//Quando um usuário for cadastrado com sucesso
$app->get('/register/success', function() {

	User::verifyLogin(false);

	$page = new Page();

	$page->setTpl("registerSuccess");

});


//Tela de Login
$app->get('/login', function() {

	$page = new Page();

	$page->setTpl('login', array(
		'error'=>User::getError()
	));

});

//Tela de cadastro
$app->get('/register', function() {

	$page = new Page();

	$page->setTpl('register', array(
		'errorRegister'=>User::getErrorRegister(),
		'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['name'=>'', 'email'=>'', 'phone'=>'']
	));

});


//Enviar os dados do formulário
$app->post('/login', function() {

	try{

		User::login($_POST['login'], $_POST['despassword']);

	}catch(Exception $e){

		User::setError($e->getMessage());

	}


	header("Location: /login/success");
	exit;

});

//Enviar os dados cadastrado
$app->post('/register', function() {

	//Não perder os dados digitados, caso dê algum erro de validação ou a página for atualizada
	$_SESSION['registerValues'] = $_POST;

	//Validação de dados
	if(!isset($_POST['name']) || $_POST['name'] == '') { //Se ele não for definido ou for vazio

		User::setErrorRegister("Preencha o seu nome.");

		header("Location: /register");
		exit;
	}

	if(!isset($_POST['email']) || $_POST['email'] == '') { //Se ele não for definido ou for vazio

		User::setErrorRegister("Preencha o seu e-mail.");

		header("Location: /register");
		exit;

	}

	if(!isset($_POST['despassword']) || $_POST['despassword'] == '') {//Se ele não for definido ou for vazio

		User::setErrorRegister("Preencha a sua senha.");

		header("Location: /register");
		exit;

	}

	if(!isset($_POST['aggree']) || $_POST['aggree'] == '') {//Se ele não for definido ou for vazio

	User::setErrorRegister("Aceite os termos de uso. leia aqui.");

	header("Location: /register");
	exit;

	} 

	if(User::checkLoginExist($_POST['email']) === true)
	{

		User::setErrorRegister("Este endereço de e-mail já está sendo usado por outro usuário.");

		header("Location: /register");
		exit;

	} 


	$user = new User();

	$user->setData([
		'inadmin'=>0,
		'login'=>$_POST['email'],
		'person'=>$_POST['name'],
		'email'=>$_POST['email'],
		'despassword'=>$_POST['despassword'],
		'phone'=>$_POST['phone']
	]);


	// var_dump($user);
	// exit;

	$user->save();

	User::login($_POST['email'], $_POST['despassword']);

	header("Location: /register/success");
	exit;

});

//deslogar do site

$app->get('/logout', function() {

	User::logout();

	header("Location: /login");
	exit;

});


?>