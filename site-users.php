<?php

use \Pcode\Page;
use \Pcode\Model\User;

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
	$password = password_hash($_POST["despassword"], PASSWORD_DEFAULT, [
		"cost"=>12
	]);

 	$user->setPassword($password);

 	$page = new Page();

 	//Mostrar que a senha foi alterada com sucesso
	$page->setTpl("forgot-reset-success");

});




?>