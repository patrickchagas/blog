<?php

use \Pcode\Page;
use \Pcode\Model\Category;
use \Pcode\Model\Post;
use \Pcode\Model\User;
use \Pcode\Model\Notice;

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

//tela do esqueceu a senha
$app->get('/forgot', function() {

	$page = new Page();

	$page->setTpl('forgot');

});

//Enviar o email digitado
$app->post('/forgot', function() {

	$user = User::getForgot($_POST["email"], false);

	header("Location: /forgot/sent");
	exit;

});

//Template de e-mail enviado
$app->get('/forgot/sent', function() {

	$page = new Page();

	$page->setTpl('forgot-sent');

});

//Mostar o nome e o codigo do usuário no template
$app->get('/forgot/reset', function() {

 	$user = User::validForgotDecrypt($_GET["code"]);

 	$page = new Page();

	$page->setTpl("forgot-reset", array(
		"name"=>$user["person"],
		"code"=>$_GET["code"]
	));
 });

 //Rota pra enviar a nova senha do usuário
$app->post('/forgot/reset', function(){

 	$forgot = User::validForgotDecrypt($_POST["code"]);
 	
 	//Metodo que vai falar pro banco de dados, que esse processo de recuperação já foi usado, pra ele não recuperar de novo mesmo que esteja ainda dentro dessa 1 hora
	User::setForgotUsed($forgot["idrecovery"]);

 	$user =  new User();

 	$user->get((int)$forgot["iduser"]);

 	//Criptografar a senha
	$password = password_hash($_POST["password"], PASSWORD_DEFAULT, [
		"cost"=>12
	]);

 	$user->setPassword($password);

 	$page = new Page();

 	//Mostrar que a senha foi alterada com sucesso
	$page->setTpl("forgot-reset-success");

});

//Template do perfil do usuário
$app->get('/profile', function() {

	User::verifyLogin(false);

	$user = User::getFromSession();

	$page = new Page();

	$page->setTpl('profile', array(
		'user'=>$user->getValues(),
		'profileMsg'=>User::getSuccess(),
		'profileError'=>User::getError()
	));

});

//Salvar a edição de um usuário feita no PERFIL
$app->post('/profile', function() {

	User::verifyLogin(false);

	//Para o usuário não mandar campo vazio ou indefinido
	if(!isset($_POST['person']) || $_POST['person'] === ''){

		User::setError("Preencha o seu nome.");

		header("Location: /profile");
		exit;

	}	

	if(!isset($_POST['email']) || $_POST['email'] === ''){

		User::setError("Preencha o seu e-mail.");

		header("Location: /profile");
		exit;
	}

	$user = User::getFromSession();

	//Se tiver outro usuário usando o mesmo login
	if($_POST['email'] !== $user->getemail()){ // se for diferente do atual email/login, isso quer dizer que o usuário mudou o email

		if(User::checkLoginExist($_POST['email']) === true){// se e-mail digitado já existe

			User::setError("Esse endereço de e-mail já está cadastrado");
			header("Location: /profile");
			exit;
		}
	}

	$_POST['iduser'] = $user->getiduser();
	$_POST['inadmin'] = $user->getinadmin();
	$_POST['despassword'] = $user->getdespassword();
	$_POST['login'] = $_POST['email'];

	$user->setData($_POST);

	$user->update();

	//
	$_SESSION[User::SESSION] = $user->getValues();

	User::setSuccess("Dados alterados com sucesso!");

	header("Location: /profile");
	exit;
});


//Alterar senha do usuário
$app->get('/profile/change-password', function() {

	User::verifyLogin(false);

	$page = new Page();

	$page->setTpl('profile-change-password');

});

//Avisos da parte administrativa para o usuários
$app->get('/profile/notice', function() {

	User::verifyLogin(false);

	$notices = new Notice();

	$notices = Notice::listAll();

	$page = new Page();

	$page->setTpl('profile-notice', array(
		'notices'=>$notices
	));

});





?>